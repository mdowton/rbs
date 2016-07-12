<?php
class BraftonVideoLoader extends BraftonFeedLoader {

    public $PrivateKey;
    public $PublicKey;
    public $Domain;
    public $VideoURL;
    public $PhotoURL;
    public $VideoClient;
    public $Client;
    public $PhotoClient;
    public $VideoClientOutputs;
    public $FeedNum;
    public $ArticlePhotos;
    public $ArticleList;
    public $ArticleCount;
    public $ClientCategory;
    public $Sitemap;

    public function __construct(){
        require_once 'libs/RCClientLibrary/AdferoArticlesVideoExtensions/AdferoVideoClient.php';
        require_once 'libs/RCClientLibrary/AdferoArticles/AdferoClient.php';
        require_once 'libs/RCClientLibrary/AdferoPhotos/AdferoPhotoClient.php';

        parent::__construct();
        //set the url and api key for use during the entire run.
        $this->PrivateKey = $this->options['braftonVideoPrivateKey'];
        $this->PublicKey = $this->options['braftonVideoPublicKey'];
        $this->FeedNum = $this->options['braftonVideoFeed'];
        $this->buildVideoURL();
        $this->Sitemap = array();

    }
    //Builds the urls needed for video import
    private function buildVideoURL(){
        $this->VideoURL = 'http://livevideo.'.$this->options['braftonApiDomain'].'/v2/';
        $this->PhotoURL = 'http://'.str_replace('api', 'pictures',$this->options['braftonApiDomain']).'/v2/';

    }

    //Gets a list of categories for this video feed and adds them if they don't already exsist
    public function ImportCategories(){
        $this->errors->set_section('Importing Video categories');
        $this->errors->debug_trace(array('message' => 'Importing Video Categories', 'file' => __FILE__, 'line' => __LINE__));
        $catArray = array();
        $cNum = $this->ClientCategory->ListCategoriesForFeed($this->feedId, 0,100, '','')->totalCount;
        $custom_cat = explode(',',$this->options['braftonCustomVideoCategories']);
        for($i=0;$i<$cNum;$i++){
            $catId = $this->ClientCategory->ListCategoriesForFeed($this->feedId,0,100,'','')->items[$i]->id;
            $catNew = $this->ClientCategory->Get($catId);
            $catArray[] = $catNew->name;
        }
        foreach($catArray as $c){
            wp_create_category($c);
        }
        foreach($custom_cat as $c){
            wp_create_category($c);
        }
        

    }
    //Assigns the categories listed for the post to the post including any custom categories.
    private function assignCategories($brafton_id){
        $loop = $this->errors->get_section();
        $this->errors->set_section('Assigning Categories to '.$brafton_id);

        $catArray = array();
        $cNum = $this->ClientCategory->ListForArticle($brafton_id, 0, 100)->totalCount;
        $custom_cat = explode(',',$this->options['braftonCustomVideoCategories']);
        for($i=0;$i<$cNum;$i++){
            $catId = $this->ClientCategory->ListForArticle($brafton_id,0,100)->items[$i]->id;
            $catNew = $this->ClientCategory->Get($catId);
            $slugObj = get_category_by_slug(esc_sql($catNew->name));
            $catArray[] = $slugObj->term_id;
        }
        foreach($custom_cat as $cat){
            if($cat == '' || $cat == null){ continue; }
            $slugObj = get_category_by_slug(esc_sql($cat));
            $catArray[] = $slugObj->term_id;

        }
        $this->errors->set_section($loop);
        return $catArray;

    }
    public function getPostDate($pdate){

        $post_date = strtotime($pdate);
        $post_date_gmt = gmdate('Y-m-d H:i:s', $post_date);
        $post_date = date('Y-m-d H:i:s', $post_date);
        $date_array = array($post_date_gmt, $post_date);
        return $date_array;

    }
    
    function generate_source_tag($src, $resolution){
        $ext = pathinfo($src, PATHINFO_EXTENSION); 

        return sprintf('<source src="%s" type="video/%s" data-resolution="%s" />', $src, $ext, $resolution );
    }
    
    public function generateEmbed($list, $splash, $brafton_id){
        $loop = $this->errors->get_section();
        $this->errors->set_section('Build embeed code for '.$brafton_id);
        $video =  "<div id='singlePostVideo'>";
        $atlantis = false;
        //define video types
        $atlatisjs = sprintf( "<video id='video-%s' class=\"ajs-default-skin atlantis-js\" controls preload=\"auto\" width='512' height='288' poster='%s' >", $brafton_id, $splash['preSplash'] ); 
        $videojs = sprintf( "<video id='video-%s' class='video-js vjs-default-skin' controls preload='auto' width='512' height='288' poster='%s' data-setup src='' >", $brafton_id, $splash['preSplash']); 
        switch($this->options['braftonVideoPlayer']){
            case 'atlantisjs':
            $video .= $atlatisjs;
            $atlantis = true;
            break;
            default:
            $video .= $videojs;
            break;
        }
        foreach($list as $listItem){
            $output = $this->VideoClientOutputs->Get($listItem->id);
            $type = $output->type;
            $path = $output->path;
            $resolution = $output->height;
            $source = $this->generate_source_tag($path, $resolution);
            $video .= $source;
        }
        //build cta
        if($atlantis){
            $this->errors->debug_trace(array('message' => 'Using AtlantisJS video player', 'file' => __FILE__, 'line' => __LINE__));
            $ctas = '';
            $pause_text = $this->options['braftonVideoCTA']['pausedText'];
            $pause_link = $this->options['braftonVideoCTA']['pausedLink'];
            $end_title = $this->options['braftonVideoCTA']['endingTitle'];
            $end_sub = $this->options['braftonVideoCTA']['endingSubtitle'];
            $end_link = $this->options['braftonVideoCTA']['endingButtonLink'];
            $end_text = $this->options['braftonVideoCTA']['endingButtonText'];
            $end_image = $this->options['braftonVideoCTA']['endingButtonImage'];
            $end_pos1 = $this->options['braftonVideoCTA']['endingButtonPositionOne'];
            $end_val1 = $this->options['braftonVideoCTA']['endingButtonPositionOneValue'];
            $end_pos2 = $this->options['braftonVideoCTA']['endingButtonPositionTwo'];
            $end_val2 = $this->options['braftonVideoCTA']['endingButtonPositionTwoValue'];
            $pause_Asset = $this->options['braftonVideoCTA']['pauseAssetGatewayId'];
            $end_Asset = $this->options['braftonVideoCTA']['endingAssetGatewayId'];
            $cta_array = array($pause_text, $pause_link, $end_title, $end_sub, $end_link, $end_text);
            $end_button_image = '';
            $end_background = '';
            $pause_gateway = '';
            $end_gateway = '';
            if($pause_Asset != '' && $pause_Asset != 0){
                $pause_gateway =<<<EOT
                    assetGateway: {
                        id: "$pause_Asset"
                    },
EOT;
            }
            if($end_Asset != '' && $end_Asset != 0){
                $end_gateway =<<<EOT
                    assetGateway: {
                        id: "$end_Asset"
                    },
EOT;
            }
            if($this->options['braftonVideoCTA']['endingButtonImage'] != ''){
                $end_button_image =<<<EOT
                    ,image: "$end_image",
                    position: [
                        {pos: "$end_pos1", val: "{$end_val1}px"},
                        {pos: "$end_pos2", val: "{$end_val2}px"}
                        ]
EOT;
            }
            if($this->options['braftonVideoCTA']['endingBackground'] != ''){
                $end_background = 'background: "'.$this->options['braftonVideoCTA']['endingBackground'].'",';
            }
            if($pause_text != ''){
                $ctas =<<<EOT
                    ,
                    pauseCallToAction: {
                        $pause_gateway
                        link: "$pause_link",
                        text: "$pause_text"
                    },
                    endOfVideoOptions:{
                        $end_background
                        $end_gateway
                        callToAction: {
                            title: "$end_title",
                            subtitle: "$end_sub",
                            button: {
                                link: "$end_link",
                                text: "$end_text"
                                $end_button_image
                            }
                        }
                    }
EOT;
            }
            $video .=<<<EOC
                <script type="text/javascript">
                    var atlantisVideo = AtlantisJS.Init({
                        videos:[{
                            id: "video-$brafton_id"$ctas
                        }]
                    });
            </script>
EOC;
        }
        $video .= "</div>";
        $this->errors->set_section($loop);
        return $video;

    }
    public function getVideoFeed(){
        $this->errors->set_section('get video feed');
        $this->errors->debug_trace(array('message' => 'Getting VideoClient', 'file' => __FILE__, 'line' => __LINE__));
        $this->VideoClient = new AdferoVideoClient($this->VideoURL, $this->PublicKey, $this->PrivateKey);
        $this->errors->debug_trace(array('message' => 'Getting Client', 'file' => __FILE__, 'line' => __LINE__));
        $this->Client = new AdferoClient($this->VideoURL, $this->PublicKey, $this->PrivateKey);
        $this->errors->debug_trace(array('message' => 'Getting PhotoClient', 'file' => __FILE__, 'line' => __LINE__));
        $this->PhotoClient = new AdferoPhotoClient($this->PhotoURL);

        $this->VideoClientOutputs = $this->VideoClient->videoOutputs();

        $this->ArticlePhotos = $this->Client->ArticlePhotos();

        $feeds = $this->Client->Feeds();
        $feedList = $feeds->ListFeeds(0,10);
        if($feedList->totalCount == 0){
            trigger_error('No Feeds were returned. Check your Public and Private keys.');
            $this->fail = true;
            return;
        }
        $this->feedId = $feedList->items[$this->FeedNum]->id;

        $articles = $this->Client->Articles();
        $this->ArticleList = $articles->ListForFeed($feedList->items[$this->FeedNum]->id, 'live', 0, 100);
        $this->ArticleCount = count($this->ArticleList->items);
        if($this->ArticleList->totalCount == 0){
            $this->errors->debug_trace(array('message' => 'There are currently no LIVE Videos in your feed', 'file'=>__FILE__, 'line' => __LINE__));
            $this->fail = true;
            return;
        }
        //$categories var from old importer
        $this->ClientCategory = $this->Client->Categories();

    }

    static function manualImportVideos() {
        $import = new BraftonVideoLoader();
        $msg = $import->ImportVideos();
        echo $msg;
    }

    //Actual workhorse of the import video class
    public function ImportVideos(){
        //Gets the Video Feed
        $this->getvideoFeed();
        if($this->fail){
            return;
        }
        //Gets the Categories
        $this->ImportCategories();
        //runs the actual loop
        return $this->runLoop();
        
    }
    public function runLoop(){
        $this->errors->set_section('Video Master loop');
        //Define local vars for the loop
        global $level, $post, $wp_rewrite;
        $scale_axis = 'y';
        $scale = 500;
        $counter = 0;
        $listImported = array();
        foreach($this->ArticleList->items as $article){
            $brafton_id = $article->id;
            if( !($post_id = $this->brafton_post_exists($brafton_id)) || $this->override ){//Begin individual video article import
                if($counter == $this->options['braftonVideoLimit']){ continue; }
                $this->errors->set_section('Individual video loop run '.$counter);
                //Get the current article info in the loop
                $thisArticle = $this->Client->Articles()->Get($brafton_id);
                //Get the splash images for the video embed code
                $postSplash = array(
                    'preSplash'     => $thisArticle->fields['preSplash'],
                    'postSplash'    => $thisArticle->fields['postSplash']
                );
                //Need to find out if the video articles have a byline or not
                //$post_author = $this->checkAuthor($this->options['braftonArticleDynamic'], $thisArticle->fields['byLine']);
                //Get all the article info for inserting or updating the post
                $post_author = $this->options['braftonArticleAuthorDefault'];
                $post_content = $thisArticle->fields['content'];
                $post_title = $thisArticle->fields['title'];
                $post_excerpt = $thisArticle->fields['extract'];
                $post_excerpt = $post_excerpt == null? ' ': $post_excerpt;
                $post_status = $this->options['braftonPostStatus'];

                $post_date_array = $this->getPostDate($thisArticle->fields['date']);
                $post_date = $post_date_array[1];
                $post_date_gmt = $post_date_array[0];

                $compacted_article = compact('post_author', 'post_date', 'post_content', 'post_title', 'post_status', 'post_excerpt');
                $compacted_article['post_category'] = $this->assignCategories($brafton_id);
                
                if($post_id){//If the post existed but we are overriding values
                    $this->errors->set_section('Updating video with id: '.$post_id);
                    $compacted_article['ID'] = $post_id;
                    $post_id = wp_update_post($compacted_article, true);
                }
                else{//if the post doesn't exists we add it to the database
                    $this->errors->set_section('Inserting new video');
                    $post_id = wp_insert_post($compacted_article, true);
                }
                if(is_object($post_id) && get_class($post_id) == 'WP_Error'){
                    $wp_error_msg = implode(', ',$post_id->error_data);
                    trigger_error($wp_error_msg);
                    continue;
                }
                else{
                    /*
                    $sitemapaddition = array(
                        "url" => get_permalink($post_id),
                        "location" => $mp4,
                        "title" => $post_title,
                        "thumbnail" => $presplash,
                        "description" =>$post_content,
                        "publication" =>$post_date,
                    );
                    $sitemap[]=$sitemapaddition;
                    */
                }
                //Generate the video embed code
                $videoList = $this->VideoClientOutputs->ListForArticle($brafton_id,0,10);
                $list = $videoList->items;
                $embed_code = $this->generateEmbed($list, $postSplash, $brafton_id);
                //get the photo
                $thisPhoto = $this->ArticlePhotos->ListForArticle($brafton_id,0,100);
                if(isset($thisPhoto->items[0]->id)){
                    $this->errors->debug_trace(array('message' => 'Video has image', 'file' => __FILE__, 'line' => __LINE__));
                    $photoId = $this->ArticlePhotos->Get($thisPhoto->items[0]->id)->sourcePhotoId;
                    $photoURL = $this->PhotoClient->Photos()->GetScaleLocationUrl($photoId, $scale_axis, $scale)->locationUri;
                    $post_image = strtok($photoURL, '?');
                    $post_image_caption = $this->ArticlePhotos->Get($thisPhoto->items[0]->id)->fields['caption'];
                    $image_alt = '';

                    $image_id = $thisPhoto->items[0]->id;
                    $temp_name = $this->image_download($post_image, $post_id, $image_id, $image_alt, $post_image_caption);
                    update_post_meta($post_id, 'pic_id', $image_id);
                }
                $meta_array = array(
                    'brafton_id'        => $brafton_id,
                    'brafton_video'     => $embed_code
                );
                if(is_plugin_active('wordpress-seo/wp-seo.php')){
                    $meta_array = array_merge($meta_array, array(
                        '_yoast_wpseo_title'    => $post_title,
                        '_yoast_wpseo_metadesc' => $post_excerpt,
                        '_yoast_wpseo_metakeywords' => ''
                    ));
                }
                if(function_exists('aioseop_get_version')){
                    $meta_array = array_merge($meta_array, array(
                        '_aioseop_description'  => $post_excerpt,
                        '_aioseop_keywords'     => ''
                    ));
                }
                $this->add_needed_meta($post_id, $meta_array);

                $listImported['titles'][] = array(
                    'title' => $post_title,
                    'link'  => "post.php?post={$post_id}&action=edit"
                );

                // Hook for custom plugins passing in WP $post_id and XML $article
                do_action('brafton_video_after_save_hook', $post_id, $article);

                ++$counter;
                ++$this->errors->level;
            }//End the individual video article import
        }
        $listImported['counter'] = $counter;
        $returnMessage = '';
        $returnMessage .= '<div id="imported-list" style="position:absolute;top:50px;width:50%;left:25%;z-index:9999;background-color:#CCC;padding:25px;box-sizing:border-box;line-height:24px;font-size:18px;border-radius:7px;border:2px outset #000000;">';
        $returnMessage .= '<h3>'.$listImported['counter'].' Videos Imported</h3>';
        if($listImported['counter']){
            foreach($listImported['titles'] as $item => $title){
                $returnMessage .= '<a href="'.$title['link'].'"> VIEW </a> '.$title['title'].'<br/>';
            }
        }
        $returnMessage .= '<a class="close-imported" id="close-imported" style="position:absolute;top:0px;right:0px;padding:10px 15px;cursor:pointer;font-size:18px;">CLOSE</a>';
        $returnMessage .= '</div>';
        return $returnMessage;
        
    }
}
?>
