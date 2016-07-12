<?php
// test feed brafton high 528a432c-2f60-4dc8-80fe-4cebc1fe25ca
if(isset($_POST['submit'])){
    switch ($_POST['submit']){
        case 'Download Error Log':
        $e_log = BraftonOptions::getErrors();
        exit();
        break;
        case 'Save Settings':
        $save = BraftonOptions::saveAllOptions();
        break;
        case 'Upload Archive':
        add_action('init', array('BraftonArticleLoader', 'manualImportArchive'));
        break;
        case 'Save Errors':
        $er = BraftonErrorReport::errorPage();
        break;
        case 'Import Articles':
        add_action('init', array('BraftonArticleLoader', 'manualImportArticles'));
        break;
        case 'Import Videos':
        add_action('init', array('BraftonVideoLoader', 'manualImportVideos'));
        break;
        case 'Get Categories':
        add_action('init', array('BraftonArticleLoader', 'manualImportCategories'));
        break;
        }
}
add_action( 'wp_ajax_health_check', 'health_check');
function health_check(){
    $ch = curl_init();
    $client = site_url();
    $url = 'http://updater.brafton.com/wp-remote/remote.php?clientUrl='.$client.'&function=health_check';
    //$url = 'http://localtest.updater.com/wp-remote/remote.php?clientUrl='.$client.'&function=health_check';
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $response = curl_exec($ch);
    echo $response;
    wp_die();
}

/*
 *********************************************************************************************************************
 *
 * Admin Page Utility Functions
 *
 *********************************************************************************************************************
 */

//function for displaying instructions for each section.  gets passed the information from the add_settings_section() fucntion defined in the set_brafton_settings() function
function getOptions(){
    $option = new BraftonOptions();
    return $option->getAll();
}

//option utility functions
function checkRadioVal($val, $check, $return=NULL){
    if($val == $check){
        if($return == NULL){
            echo 'checked';
        }
        else{
            echo $return;
        }
    }
}

function tooltip($tip){ ?>
    <img src="<?php echo plugin_dir_url( __FILE__ ); ?>img/tt.png" class="brafton_tt" title="<?php echo $tip; ?>">
<?php }

function switchCase($brand){
    switch ($brand){
        case 'api.brafton.com':
        return 'Brafton';
        break;
        case 'api.contentlead.com':
        return 'ContentLEAD';
        break;
        case 'api.castleford.com.au':
        return 'Castleford';
        break;
    }
}
/*
function for displaying errors that relate to the importer only
*/
function braftonWarnings(){
    $options = getOptions();
    //check if importer settings are valid if they are not throw error // this function should be re-written
    if(isset($saved)){
        echo '<div class="updated">
				<p>Options Saved Successfully</p>
				</div>';
    }
    //check if curl is enabled throw warning if it is not
    if(!function_exists('curl_init')){
        echo '<div class="error">
				<p>Curl not enabled.</p>
				</div>';
    }
    if(!ini_get('allow_url_fopen')){
        echo '<div class="error">
                <p>allow_url_fopen may not be enabled.  Your videos will not import</p>
                </div>';
    }
    if(!class_exists('DOMDocument')){
        echo '<div class="error">
                <p>DOMDocument not found.  Your content will not import</p>
                </div>';
    }
    if(!current_theme_supports( 'post-thumbnails' )) {
        echo '<div class="updated">
                <p>Thumbnails not enabled for this Theme.</p>
                </div>';
    }
    //If importer was run manually and had errors throws a warning
    if(isset($_GET['b_error'])){
            echo '<div class="error">
				<p>The Importer Failed to Run</p>
				</div>';
    }
    //get the last importer run time for Articles
    $status = 'updated';
    $last_run_time = wp_next_scheduled('braftonSetUpCron');
    $last_run_time_video = wp_next_scheduled('braftonSetUpCronVideo');

    $last_run = 'N/A';
    $last_run_video = 'N/A';
    if($last_run_time){
        $last_run = date('F d Y h:i:s', $last_run_time);
    }
    if($last_run_time_video){
        $last_run_video = date('F d Y h:i:s', $last_run_time_video);
    }
    $time = time();
    $current_time = date('F d Y h:i:s', $time);
    if(($last_run_time) && $last_run_time < $time){
        echo "<div class='error'>
				<p>The Article Importer Failed to Run at its scheduled time.  Contact tech@brafton.com</p>
				</div>";
        if(!isset($_GET['b_error'])){
            $failed_error = new BraftonErrorReport(BraftonOptions::getSingleOption('braftonApiKey'),BraftonOptions::getSingleOption('braftonApiDomain'), BraftonOptions::getSingleOption('braftonDebugger') );
            trigger_error('Article Importer has failed to run.  The cron was scheduled but did not trigger at the appropriate time');
        }

    }
    if(($last_run_time_video) && $last_run_time_video < $time){
        echo "<div class='error'>
				<p>The Video Importer Failed to Run at its scheduled time.  Contact tech@brafton.com</p>
				</div>";
        if(!isset($_GET['b_error'])){
            $failed_error = new BraftonErrorReport(BraftonOptions::getSingleOption('braftonApiKey'),BraftonOptions::getSingleOption('braftonApiDomain'), BraftonOptions::getSingleOption('braftonDebugger') );
            trigger_error('Video Importer has failed to run.  The cron was scheduled but did not trigger at the appropriate time');
        }
    }
    $master = "<div class='$status'>
                <p>Current Time: $current_time</p>";
    
    if (!$options['braftonStatus'])
	{
        $master .= "</div>";
        
        if($options['braftonRemoteOperation']){
            echo '<div class="notice notice-info message is-dismissable">
                    <p>Remote Import enabled.</p>
                    </div>';
        }else{
            echo '<div class="error">
                    <p>Importer not enabled.</p>
                    </div>';
        }
	}else{
        $master .= "<p>Next Article Run: $last_run</p>
                <p>Next Video Run: $last_run_video</p>
				</div>";
    }
    echo $master;
}
/*
function for displaying the sections information
*/
function print_section_info($args){
    $inst = BRAFTON_ROOT.'ImporterInstructions.pdf';
    switch ($args['id']){
        case 'general':
            echo '<p>This section controls the general settings for your importer.  Features for this plugin may depend on your settings in this section.  If you need help with your settings you may contact your CMS or visit <a href="http://www.brafton.com/support" target="_blank">Our Support Page</a> for assistance.</p><p>You may also view our pdf <a target="_blank" href="'.$inst.'">Instructions</a>';
        break;
        case 'error':
            echo '<p>Provides Error Log support.  Errors resulting in failure to deliver content are directly reported and turn on debug mode capturing all errors for troubleshooting purposes.  Debug Mode has a build in &quot;Tracker&quot; which logs the progress of the importer during operation.</p>';
        break;
        case 'article':
            echo '<p>This section is for setting your article specific settings.  All settings on this page are independant of your video settings.';
        break;
        case 'video':
            echo '<p>This section is for setting your video specific settings.  All settings on this page are independant of your article settings.';
        break;
        case 'marpro':
            echo '<p>This section is for settings related to our Arch Product, which handles lead capture and Call To Action features.</p>';
        break;
        case 'archive':
            echo '<p>This is for uploading an archive provided to you by your CMS</p>';
        break;
        case 'control':
            echo '<p>You can manually run the importer at any point by selecting which importer you would like to run.  If you are receiving both Vidoes, and Articles you will have to run the importer for each one seperately.  The importer does run each hour automatically provided it is turned on.</p>';
        break;
        case 'atlantis':
            echo '<p>This is for Styling the Atlantis Video Player.  You may use the selection options below or choose to write your own CSS below.</p>';
        break;
        case 'article_style':
            echo '<p>This section can manually adjust the styles for Premium content should they conflict or be overridden by your sites stylesheets.</p>';
        break;
    }
}
/*
 ************************************************************************************************
 *
 * Error Tab Functions Section
 *
 ************************************************************************************************
 */
function ErrorSettingsSetup(){
    //Error Logs Tab
        register_setting(
            'brafton_error_options', // Option group
            'brafton_error' );
        //sets a section name for the options
        add_settings_section(
            'error', // ID
            'Error Log', // Title
            'print_section_info', // Callback
            'brafton_error' // Page
        );
        //each one of these adds a field with the options
        add_settings_field(
            'braftonDebugger', // ID
            'Debug Mode', // Title
            'braftonDebugger' , // Callback
            'brafton_error', // Page
            'error' // Section
        );
        add_settings_field(
            'braftonClearLog', // ID
            'Clear Error Log', // Title
            'braftonClearLog' , // Callback
            'brafton_error', // Page
            'error' // Section
        );
        add_settings_field(
            'braftonDisplayLog', // ID
            'Brafton Log <span id="show_hide">(Show Log)</span>', // Title 
            'braftonDisplayLog' , // Callback
            'brafton_error', // Page
            'error' // Section
        );
}

//Displays the Option for Turning on the Debugger
function braftonDebugger(){
    $options = getOptions();
    $tip = 'Turns on Debugging Mode which will capture all errors and initiate Debug Trace which tracks the progress of the importer.';
    tooltip($tip); ?>
    <input type="radio" name="braftonDebugger" value="1" <?php checkRadioVal($options['braftonDebugger'], 1); ?>> ON
    <input type="radio" name="braftonDebugger" value="0" <?php checkRadioVal($options['braftonDebugger'], 0); ?>> OFF
<?php
}

//Displays the option for Clearing the error Log from the database
function braftonClearLog(){
    $options = getOptions();
    tooltip('Only set to Clear Log if errors have been corrected.  This log provides a record of errors thrown while the importer is running.');
    ?>
    <input type="radio" name="braftonClearLog" value="1" <?php checkRadioVal($options['braftonClearLog'], 1); ?>> Clear Log
    <input type="radio" name="braftonClearLog" value="0" <?php checkRadioVal($options['braftonClearLog'], 0); ?>> Leave Log Intact
<?php
}

//Displays any errors currently in the Database from the braftonErrors Option
function braftonDisplayLog(){
    $tip = 'Displays the actual errors for the importer';
    tooltip($tip); ?>
    <div class="b_e_display">
        <pre>
        
        <?php $errors = get_option('brafton_e_log');
    $length = mb_strlen(json_encode($errors));
        if(!$errors){ echo 'Everythin is fine. You have no errors'; }
        //convert obj to array
        $errors = $errors;
        if(is_array($errors)){
            $errors = array_reverse($errors);
        }
        for($i=0;$i<count($errors);++$i){
            echo $errors[$i]['client_sys_time'].':<br/>----'.$errors[$i]['error'].'<br>';
        }
        echo 'Total: ' . count($errors);
        ?> 
        </pre>
    </div>
<?php 
    submit_button('Download Error Log');

}
/********************************************************************************************
 *
 * General Settings Tab Functions Section
 *
 ********************************************************************************************
 */

//Set Up the General Settings Section
function GeneralSettingsSetup(){
//General Settings Tab
        register_setting(
            'brafton_general_options',
            'brafton_options' );
        add_settings_section(
            'general', // ID
            'General Importer Settings', // Title
            'print_section_info', // Callback
            'brafton_general' // Page
        );
        //each one of these adds a field with the options
        add_settings_field(
            'braftonImporterOnOff', // ID
            'Automatic Import', // Title 
            'braftonStatus' , // Callback
            'brafton_general', // Page
            'general' // Section
        );
        add_settings_field(
            'braftonApiDomain', // ID
            'API Domain', // Title
            'braftonApiDomain' , // Callback
            'brafton_general', // Page
            'general' // Section
        );
        if(!is_multisite()){
            add_settings_field(
                'braftonImporterUser', // ID
                'Importer User', // Title
                'braftonImporterUser' , // Callback
                'brafton_general', // Page
                'general' // Section
            );
        }
        add_settings_field(
            'braftonImportJquery',
            'Import JQuery Script',
            'braftonImportJquery',
            'brafton_general',
            'general'
        );
        add_settings_field(
            'braftonRestyle',
            'Add Premium Styles',
            'braftonRestyle',
            'brafton_general',
            'general'
        );
        add_settings_field(
            'braftonDefaultPostStatus',
            'Default Post Status',
            'braftonDefaultPostStatus',
            'brafton_general',
            'general'
        );
        add_settings_field(
            'braftonCategories',
            'Categories',
            'braftonCategories',
            'brafton_general',
            'general'
        );
        add_settings_field(
            'braftonTags',
            'Tag Options',
            'braftonTags',
            'brafton_general',
            'general'
        );
        add_settings_field(
            'braftonCustomTags',
            'Custom Tags',
            'braftonCustomTags',
            'brafton_general',
            'general'
        );
        add_settings_field(
            'braftonSetDate',
            'Publish Date',
            'braftonSetDate',
            'brafton_general',
            'general'
        );
        add_settings_field(
            'braftonOpenGraphStatus',
            'Add OG Tags',
            'braftonOpenGraphStatus',
            'brafton_general',
            'general'
        );
        add_settings_field(
            'braftonUpdateContent',
            'Update Existing Content',
            'braftonUpdateContent',
            'brafton_general',
            'general'
        );
        add_settings_field(
            'braftonRemoteOperation',
            '<span style="">Remote Import</span><span style="display:block;color:red;" id="checkFlasher"></span>',
            'braftonRemoteOperation',
            'brafton_general',
            'general'
        );
}
function braftonRemoteOperation(){
    $options = getOptions();
    tooltip('Some systems can experience a problem with Wordpress Cron.  If your Importer does not trigger automatically you can request &quot;Remote Operation&quot; which causes a request to Brafton servers to trigger an importer run. NOTE: This option should only be used if Automatic Importing does not work.');
    ?>
    <input type="radio" name="braftonRemoteOperation" value="1" <?php checkRadioVal($options['braftonRemoteOperation'], 1); ?>> ON
    <input type="radio" name="braftonRemoteOperation" value="0" <?php checkRadioVal($options['braftonRemoteOperation'], 0); ?>> OFF <input type="hidden" name="braftonRemoteTime" value="<?php echo $options['braftonRemoteTime']; ?>">
    <?php $src='';$disp=''; if($options['braftonRemoteOperation']){ $src = '../wp-includes/images/uploader-icons-2x.png'; $disp = 'position:absolute;left-188px;';} ?><span id="remoteCheck" style="display:inline-block;position:absolute;top:10px;padding:5px;width:40px;height:40px;overflow:hidden"><img style="<?php echo $disp; ?>" src="<?php echo $src; ?>"></span>
<?php

}
//Option enables setting up override styles
//TODO : Will be moving to s seperate section to inself for style
function braftonRestyle(){
    $options = getOptions();
    tooltip('Premium content embeeded styles can be customized the premium style Tab if they are not appearing as you would like. NOTE: You must have JQuery on your site for this to work.  If you currently do not have JQuery you can add it with the option above.');
    ?>
    <input type="radio" name="braftonRestyle" value="1" <?php checkRadioVal($options['braftonRestyle'], 1); ?>> Add Style Correction
    <input type="radio" name="braftonRestyle" value="0" <?php checkRadioVal($options['braftonRestyle'], 0); ?>> No Style Correction
<?php
}

//Importing a copy of JQuery for use if not currently using a copy.  JQuery is required for video playback using AtlantisJS as well as Marpro and syle overrides
function braftonImportJquery(){
    $options = getOptions();
    $tip = 'Some sites already have jquery, set this to off if additional jquery script included with atlantisjs is causing issues.';
    tooltip($tip); ?>
    <input type="radio" name="braftonImportJquery" value="on" <?php	checkRadioval($options['braftonImportJquery'], 'on'); ?> /> On
    <input type="radio" name="braftonImportJquery" value="off" <?php checkRadioval($options['braftonImportJquery'], 'off'); ?>/> Off
<?php
}

//Displays the option for enabling open graph tags for single article pages
function braftonOpenGraphStatus(){
    $options = getOptions();
    tooltip('Adds og: tags to the single.php pages.  These tags are used for social media sites.  Check if you have another SEO plugin currently generating these tags before turning them on. Support for Twitter Cards and Google+ in addition to Facebook.  Note: Twitter requires approval for sharing twitter cards. ');
    ?>
    <input type="radio" name="braftonOpenGraphStatus" value="1" <?php checkRadioVal($options['braftonOpenGraphStatus'], 1); ?>> Add Tags
    <input type="radio" name="braftonOpenGraphStatus" value="0" <?php checkRadioVal($options['braftonOpenGraphStatus'], 0); ?>> No Tags
<?php
}

//Display the option for Brafton Categories
function braftonCategories(){
    $options = getOptions();
    $tip = 'This option is for using categories set by the article when importer.  *RECOMENDATION: Set to Brafton Categories';
    tooltip($tip); ?>
<input type="radio" name="braftonCategories" value="categories" <?php checkRadioval($options['braftonCategories'], 'categories'); ?> /> Brafton Categories
<input type="radio" name="braftonCategories" value="none_cat" <?php checkRadioval($options['braftonCategories'], 'none_cat');
?> /> None
<?php
}

//Displays the option for support for Tags
function braftonTags(){
    $options = getOptions();
    $tip = 'Tags are rarely used and hold no true SEO Value, however we provide you with options if you choose to use them. The Option you select must be included in your XML Feed.';
    tooltip($tip); ?>
<input type="radio" name="braftonTags" value="tags" <?php checkRadioval($options['braftonTags'], 'tags'); ?> />Tags as tags<br />
<input type="radio" name="braftonTags" value="keywords" <?php checkRadioval($options['braftonTags'], 'keywords');?> />Keywords as tags<br />
<input type="radio" name="braftonTags" value="cats" <?php checkRadioval($options['braftonTags'], 'cats');?> />Categories as tags<br />
<input type="radio" name="braftonTags" value="none_tags" <?php checkRadioval($options['braftonTags'], 'none_tags');?> /> None
<?php
}

//Displays the option for Custom Tags
function braftonCustomTags(){
    $options = getOptions();
    $tip = 'Each tag seperated by a comma. I.E. (first,second,third)';
    tooltip($tip); ?>
<input type="text" name="braftonCustomTags" value="<?php
		echo $options['braftonCustomTags']; ?>"/>
<?php
}

//Displays the option for setting the date for an article when imported
function braftonSetDate(){
    $options = getOptions();
    $tip = 'Specify which date from your XML Feed to use as the publish date upon import';
    tooltip($tip); ?>
<input type="radio" name="braftonPublishDate" value="published" <?php checkRadioval($options['braftonPublishDate'], 'published'); ?> /> Published
<input type="radio" name="braftonPublishDate" value="modified" <?php checkRadioval($options['braftonPublishDate'], 'modified'); ?>/> Last Modified
<input type="radio" name="braftonPublishDate" value="created" <?php checkRadioval($options['braftonPublishDate'], 'created'); ?>/> Created
<?php
}

//Displays the option for Default Post Status upon import
function braftonDefaultPostStatus(){
    $options = getOptions();
    $tip = 'Sets the default Post status for articles and video imported.  Draft affords the ability to approve an article before it is made live on the blog';
    tooltip($tip); ?>
    <input type="radio" name="braftonPostStatus" value="publish" <?php checkRadioval($options['braftonPostStatus'], 'publish'); ?> /> Published
    <input type="radio" name="braftonPostStatus" value="draft" <?php checkRadioval($options['braftonPostStatus'], 'draft'); ?>/> Draft
    <input type="radio" name="braftonPostStatus" value="private" <?php checkRadioval($options['braftonPostStatus'], 'private'); ?>/> Private
<?php
}

//Displays the option for setting the importer user.  This option used to allow HTMl Tags needed for Premium content including but not limited to script, input, style ect.
function braftonImporterUser(){
    $options = getOptions();
    $args = array(
        'role'      => 'administrator'
    );
    $admins = get_users($args);
    $tip = 'Designate a User for the Importer. *NOTE: This is different than the Author';
    tooltip($tip); ?>
    <select name="braftonImporterUser">
        <option value="">Select Importer User</option><?php
    foreach($admins as $u){ ?>
        <option value="<?php echo $u->user_login; ?>" <?php checkRadioval($options['braftonImporterUser'], $u->user_login, 'selected'); ?>><?php echo $u->user_login; ?></option><?php
    }
        ?></select>

<?php
}

//Displays the option Turning the Importer itself OFF/ON.
function braftonStatus(){
    $options = getOptions();
    $tip = 'Turns the Automatic Importer ON/OFF.  Automatic Import utilizes the Wordpress Cron. Articles trigger hourly while videos trigger every 12 hours.';
    tooltip($tip); ?>
    <input type="radio" name="braftonStatus" value="1" <?php checkRadioval($options['braftonStatus'], 1); ?>> ON
    <input type="radio" name="braftonStatus" value="0" <?php checkRadioval($options['braftonStatus'], 0); ?>> OFF
<?php
}

//Displays the Options for setting the API Domain
function braftonApiDomain(){
    $options = getOptions();
    $tip = 'Set the domain your XML Feed originates from.  This information can be obtained from your CMS.';
    tooltip($tip); ?>
    	<select name='braftonApiDomain'>
            <option value="api.brafton.com" <?php checkRadioval($options['braftonApiDomain'], 'api.brafton.com', 'selected'); ?>>Brafton</option>
            <option value="api.contentlead.com" <?php checkRadioval($options['braftonApiDomain'], 'api.contentlead.com', 'selected'); ?>>ContentLEAD</option>
            <option value="api.castleford.com.au" <?php checkRadioval($options['braftonApiDomain'], 'api.castleford.com.au', 'selected'); ?>>Castleford</option>

        </select>
<?php
}

/********************************************************************************************
 *
 * Article settings Tab functions Section
 *
 ********************************************************************************************
 */

function ArticleSettingsSetup(){
//Articles Tab
    $options = getOptions();
    $brand = switchCase($options['braftonApiDomain']);
        register_setting(
            'brafton_article_options', // Option group
            'brafton_article' );
        //sets a section name for the options
        add_settings_section(
            'article', // ID
            'Article Importer Settings', // Title
            'print_section_info', // Callback
            'brafton_article' // Page
        );
        add_settings_field(
            'braftonArticleStatus',
            'Article Importer Status',
            'braftonArticleStatus',
            'brafton_article',
            'article'
        );
        add_settings_field(
            'braftonApiKey', // ID
            'API Key', // Title
            'braftonApiKey' , // Callback
            'brafton_article', // Page
            'article' // Section
        );
        add_settings_field(
            'braftonArticleDynamic',
            'Dynamic Author',
            'braftonArticleDynamic',
            'brafton_article',
            'article'
        );
        add_settings_field(
            'braftonArticleAuthorDefault',
            'Default Author',
            'braftonArticleAuthorDefault',
            'brafton_article',
            'article'
        );
        add_settings_field(
            'braftonCustomArticleCategories',
            'Custom Article Categories',
            'braftonCustomArticleCategories',
            'brafton_article',
            'article'
        );
        add_settings_field(
            'braftonArticlePostType',
            $brand.' Post Type',
            'braftonArticlePostType',
            'brafton_article',
            'article'
        );
        add_settings_field(
            'braftonArticleExistingPostType',
            'Set as Pre-existing Custom Post Type',
            'braftonArticleExistingPostType',
            'brafton_article',
            'article'
        );
        add_settings_field(
            'braftonArticleExistingCategory',
            'Choose Pre-existing Custom Category',
            'braftonArticleExistingCategory',
            'brafton_article',
            'article'
        );
        add_settings_field(
            'braftonArticleExistingTag',
            'Choose Pre-existing Custom Tag',
            'braftonArticleExistingTag',
            'brafton_article',
            'article'
        );
        add_settings_field(
            'braftonArticleLimit',
            '# Articles to Import',
            'braftonArticleLimit',
            'brafton_article',
            'article'
        );
}

//Displays the Option for setting the API Key for use with the Artile Importer
function braftonApiKey(){
    $options = getOptions();
    $tip = 'Enter Your API Key for your XML Feed.  This information can be obtained from your CMS. (Example: 2de93ffd-280f-4d4b-9ace-be55db9ad4b7)';
    tooltip($tip); ?>
    <input type="text" name="braftonApiKey" id="brafton_api_key" value="<?php echo $options['braftonApiKey']; ?>" />

<?php
}
function braftonArticleLimit(){
    $options = getOptions();
    $tip = 'The higher the number here the longer the importer will take to run.  Default is 15';
    tooltip($tip); ?>
    <input type="number" name="braftonArticleLimit" value="<?php echo $options['braftonArticleLimit']; ?>" />
<?php 
}
//Displays the option for allowing overriding of previously imported articles.
function braftonUpdateContent(){
    $options = getOptions();
    $tip = 'Setting this to ON will override edits made to posts within the last 30 days or using an archive file.  NOTE: This option will completely update the article including downloading the image files associated with them.  Leaving this option ON can overload your system with image files.';
    tooltip($tip); ?>
<input type="radio" name="braftonUpdateContent" value="1" <?php checkRadioval($options['braftonUpdateContent'], 1); ?> /> On
<input type="radio" name="braftonUpdateContent" value="0" <?php checkRadioval($options['braftonUpdateContent'], 0); ?>/> Off
<?php
}

//Displays the options for Using Dynamic Authors
function braftonArticleDynamic(){
    $options = getOptions();
    $tip = "Sets Author to 'byLine' From the feed. If the Author does not exsist they will be added.
Default auhor is returned if no author is set int he field or if new author cannot be created.";
    tooltip($tip); ?>
<input type="radio" name="braftonArticleDynamic" value="y" <?php checkRadioval($options['braftonArticleDynamic'], 'y'); ?> />Enable
<input type="radio" name="braftonArticleDynamic" value="n" <?php checkRadioval($options['braftonArticleDynamic'], 'n'); ?> />Disable<br />
<?php
}

//Displays the options for selecting the default author of imported content from a list of users.
function braftonArticleAuthorDefault(){
    $options = getOptions();
    $tip = 'Set the Default Author for Articles upon Import';
    tooltip($tip);
    wp_dropdown_users(array(
			'name' => 'braftonArticleAuthorDefault',
			'hide_if_only_one_author' => true,
			'selected' => $options['braftonArticleAuthorDefault']
		));
}

//Displays the Options for turning the Article Importer OFF/ON
function braftonArticleStatus(){
    $options = getOptions();
    $tip = 'Turns the Article Importer ON/OFF.';
    tooltip($tip); ?>
    <input type="radio" name="braftonArticleStatus" value="1" <?php checkRadioval($options['braftonArticleStatus'], 1); ?>> ON
    <input type="radio" name="braftonArticleStatus" value="0" <?php checkRadioval($options['braftonArticleStatus'], 0); ?>> OFF
<?php
}

//Displays the option for using custom article categories
function braftonCustomArticleCategories(){
    $options = getOptions();
    $tip = 'Each category seperated by a comma. I.E. (first,second,third)';
    tooltip($tip); ?>
<input type="text" name="braftonCustomArticleCategories" value="<?php
        echo $options['braftonCustomArticleCategories'];
?>"/>
<?php
}

//Displays the Options for turning on custom post types for brafton content_ur
function braftonArticlePostType(){
    $options = getOptions();
    $tip = 'Turn this option on to set custom post type for '.switchCase($options['braftonApiDomain']).' Content.  If Using Custom Post type set a url slug to appear before in the url. Default is: content-blog';
    tooltip($tip); ?>
    <input type="radio" name="braftonArticlePostType" value="1" <?php checkRadioval($options['braftonArticlePostType'], 1); ?>> ON
    <input type="radio" name="braftonArticlePostType" value="0" <?php checkRadioval($options['braftonArticlePostType'], 0); ?>> OFF URL Slug <input type="text" name="braftonCustomSlug" value="<?php echo $options['braftonCustomSlug']; ?>" style="width:150px;">
<?php
}

function braftonArticleExistingPostType(){
    $options = getOptions();
    $tip = "Select an option from the dropdown menu to make ".switchCase($options['braftonApiDomain'])." articles load into a custom pre-existing post type. Default option is 'None' which will leave ".switchCase($options['braftonApiDomain'])." articles loading into default 'Post' post type.";
    tooltip($tip);
    $array = array('posts','post', 'page', 'attachment', 'revision', 'nav_menu_item');
    $post_types = get_post_types(); ?>

    <select name="braftonArticleExistingPostType" id="braftonArticleExistingPostType" <?php checkRadioval($options["braftonArticlePostType"], 1, 'disabled'); ?>>
        <option value='0' <?php checkRadioval($options["braftonArticleExistingPostType"], 0, 'selected'); ?>>None</option>
        <?php foreach($post_types as $post_type) {
        if(array_search($post_type, $array)){
            continue;
        } ?>
        <option value="<?php echo $post_type; ?>" <?php checkRadioval(strval($options["braftonArticleExistingPostType"]), $post_type, 'selected'); ?>><?php echo $post_type; ?></option>
<?php
        }
    ?></select><?php
}


function braftonArticleExistingCategory(){
    $options = getOptions();
    $tip = "To associate a pre-existing custom category type, enter the machine name of the category. Leave blank for default.";
    tooltip($tip);
    $hidden = ($options['braftonArticleExistingPostType'])? 'inline-block': 'none'; ?>
    <input type="text" name="braftonArticleExistingCategory" value="<?php echo $options['braftonArticleExistingCategory']; ?>" style="width:200px;display:<?php echo $hidden; ?>;">
<?php
}

function braftonArticleExistingTag(){
    $options = getOptions();
    $tip = "To associate a pre-existing custom tag type, enter the machine name of the tag. Leave blank for default.";
    tooltip($tip);
    $hidden = ($options['braftonArticleExistingPostType'])? 'inline-block': 'none'; ?>
    <input type="text" name="braftonArticleExistingTag" value="<?php echo $options['braftonArticleExistingTag']; ?>" style="width:200px;display:<?php echo $hidden; ?>;">
<?php
}

/*
 *****************************************************************************************************
 *
 * Archive Settings Tab function Section
 *
 *****************************************************************************************************
 */
function ArchiveSettingSetup(){
    //Archives Tab
        register_setting(
            'brafton_archive_options', // Option group
            'brafton_archive' );
        //sets a section name for the options
        add_settings_section(
            'archive', // ID
            'Upload an Article Archive', // Title
            'print_section_info', // Callback
            'brafton_archive' // Page
        );
        add_settings_field(
            'braftonArchiveImporterStatus',
            'Archive Importer Status',
            'braftonArchiveImporterStatus',
            'brafton_archive',
            'archive'
        );
        add_settings_field(
            'braftonArchiveUpload',
            'Upload an XML File',
            'braftonArchiveUpload',
            'brafton_archive',
            'archive'
        );
}
//Displays the options for uploading an archive file in place of retrieving a remote feed url
function braftonArchiveUpload(){
    $tip = 'Select an XML file to upload';
    tooltip($tip); ?>
<input type="file" id="braftonUpload" name="archive" size="40" disabled>
<?php
}
//Display sthe option for turning on the archive importer.  Must be tuned ON to be able to upload an archive file.
function braftonArchiveImporterStatus(){
    $options = getOptions();
    $tip = 'Turns the ARchive Importer ON/OFF.  If this option is turned OFF selecting a file will result in nothing being imported.  You must turn this option ON AND upload a file.';
    tooltip($tip); ?>
    <input type="radio" class="archiveStatus" name="braftonArchiveImporterStatus" value="1" <?php checkRadioval($options['braftonArchiveImporterStatus'], 1); ?>> ON
    <input type="radio" class="archiveStatus" name="braftonArchiveImporterStatus" value="0" <?php checkRadioval($options['braftonArchiveImporterStatus'], 0); ?>> OFF
<?php
}

/*
 **********************************************************************************************
 *
 * Video Settings Tab function Section
 *
 **********************************************************************************************
 */

function VideoSettingsSetup(){
    //Videos Tab
        register_setting(
            'brafton_video_options', // Option group
            'brafton_video' );
        //sets a section name for the options
        add_settings_section(
            'video', // ID
            'Video Importer Settings', // Title
            'print_section_info', // Callback
            'brafton_video' // Page
        );
        add_settings_field(
            'braftonVideoStatus',
            'Video Importer Status',
            'braftonVideoStatus',
            'brafton_video',
            'video'
        );
        add_settings_field(
            'braftonVideoPublicKey',
            'Public Key',
            'braftonVideoPublicKey',
            'brafton_video',
            'video'
        );
        add_settings_field(
            'braftonVideoPrivateKey',
            'Private Key',
            'braftonVideoPrivateKey',
            'brafton_video',
            'video'
        );
        add_settings_field(
            'braftonVideoFeed',
            'Feed Number',
            'braftonVideoFeed',
            'brafton_video',
            'video'
        );
        add_settings_field(
            'braftonCustomVideoCategories',
            'Custom Video Categories',
            'braftonCustomVideoCategories',
            'brafton_video',
            'video'
        );
        add_settings_field(
            'braftonVideoHeaderScript',
            'Include Player on Pages',
            'braftonVideoHeaderScript',
            'brafton_video',
            'video'
        );
        add_settings_field(
            'braftonVideoPlayer',
            'Video Player',
            'braftonVideoPlayer',
            'brafton_video',
            'video'
        );
        add_settings_field(
            'braftonVideoOutput',
            'Video Position',
            'braftonVideoOutput',
            'brafton_video',
            'video'
        );
        add_settings_field(
            'braftonVideoLimit',
            '# Videos to Import',
            'braftonVideoLimit',
            'brafton_video',
            'video'
        );
        add_settings_field(
            'braftonVideoCTAs',
            "AtlantisJS CTA's<br/><span id='show_hide_cta'>(Show Settings)</span>",
            'braftonVideoCTAs',
            'brafton_video',
            'video'
        );
}
function braftonVideoLimit(){
    $options = getOptions();
    $tip = 'The higher the number here the longer the importer will take to run.  Default is 5';
    tooltip($tip); ?>
    <input type="number" name="braftonVideoLimit" value="<?php echo $options['braftonVideoLimit']; ?>" />
<?php 

}
//Displays the options to turn the Video Importer OFF/ON
function braftonVideoStatus(){
    $options = getOptions();
    $tip = 'Turns the Video Importer ON/OFF.';
    tooltip($tip); ?>
    <input type="radio" name="braftonVideoStatus" value="1" <?php checkRadioval($options['braftonVideoStatus'], 1); ?>> ON
    <input type="radio" name="braftonVideoStatus" value="0" <?php checkRadioval($options['braftonVideoStatus'], 0); ?>> OFF
<?php
}

//Displays the option for entering Public Key for Video Feed
function braftonVideoPublicKey(){
    $options = getOptions();
    $tip = 'Enter your Public Key provided to you from your CMS';
    tooltip($tip); ?>
<input type="text" name="braftonVideoPublicKey" id="brafton_video_public" value="<?php
		echo $options['braftonVideoPublicKey']; ?>" />
<?php
}

//displays the option for entering Private key for video feed
function braftonVideoPrivateKey(){
    $options = getOptions();
    $tip = 'Enter your Prive Key provided to you from your CMS';
    tooltip($tip); ?>
<input type="text" name="braftonVideoPrivateKey" id="brafton_video_secret" value="<?php
		echo $options['braftonVideoPrivateKey']; ?>" />
<?php
}

//displays the option for enterign the Feed Number {ID}
function braftonVideoFeed(){
    $options = getOptions();
    $tip = 'Enter your Feed Number. *NOTE: This is usually 0';
    tooltip($tip); ?>
<input type="text" name="braftonVideoFeed" value="<?php
		echo $options['braftonVideoFeed']; ?>" />
<?php
}

//Displays the option for using custom video categories
function braftonCustomVideoCategories(){
    $options = getOptions();
    $tip = 'Each category seperated by a comma. I.E. (first,second,third)';
    tooltip($tip); ?>
<input type="text" name="braftonCustomVideoCategories" value="<?php
        echo $options['braftonCustomVideoCategories'];
?>"/>
<?php
}

//displays the option for selecting where to get the javascript used for playing videos
function braftonVideoHeaderScript(){
    $options = getOptions();
    $tip = "Enable or disable the addition of the video scripts to the head of your page.  NOTE: This is required for your videos to play.";
    tooltip($tip);
    ?>
    <input type="radio" id="embed_type" name="braftonVideoHeaderScript" value="0" <?php checkRadioval($options['braftonVideoHeaderScript'], 0); ?> /> OFF
    <input type="radio" id="atlantis" name="braftonVideoHeaderScript" value="1" <?php checkRadioval($options['braftonVideoHeaderScript'], 1); ?>/> ON
<?php
}
function braftonVideoPlayer(){
    $options = getOptions();
    $tip = "Select the type of Video Player to use.  Video JS is a barebones html5 Player. Atlantis JS is a HTMl5 Video player that uses Jquery and provides support for Call To Action events.";
    tooltip($tip);
    ?>
    <input type="radio" id="embed_type" name="braftonVideoPlayer" value="videojs" <?php checkRadioval($options['braftonVideoPlayer'], 'videojs'); ?> /> Video JS
    <input type="radio" id="atlantis" name="braftonVideoPlayer" value="atlantisjs" <?php checkRadioval($options['braftonVideoPlayer'], 'atlantisjs'); ?>/> Atlantis JS <?php echo $options['braftonVideoPlayer']; ?>
<?php
    
}
function braftonVideoOutput(){
    $options = getOptions();
    $tip = 'Output your videos before or after your article text copy.  It is recommended to modify your template file to output your video in place of the image.';
    tooltip($tip); ?>
<input type="radio" name="braftonVideoOutput" value="0" <?php checkRadioval(strval($options['braftonVideoOutput']), '0'); ?> /> OFF
<input type="radio" name="braftonVideoOutput" value="before" <?php	checkRadioval(strval($options['braftonVideoOutput']), 'before'); ?>/> Before Copy
<input type="radio" name="braftonVideoOutput" value="after" <?php	checkRadioval(strval($options['braftonVideoOutput']), 'after'); ?>/> After Copy
<?php
}

function braftonVideoCTAs(){
    $options = getOptions();
    $tip = "If using Atlantis JS for video playback you can set specific CTA's for when the Video is paused and finished";
    tooltip($tip); ?>
    <div class="b_v_cta">
        <label>Paused CTA Text</label><br/><input type="text" name="braftonVideoCTA[pausedText]" value="<?php echo $options['braftonVideoCTA']['pausedText']; ?>"><br>
        <label>Paused CTA Link</label><br/><input type="text" name="braftonVideoCTA[pausedLink]" value="<?php echo $options['braftonVideoCTA']['pausedLink']; ?>"><br>
        <label>Pause Asset Gateway ID</label><br/><input type="text" name="braftonVideoCTA[pauseAssetGatewayId]" value="<?php echo $options['braftonVideoCTA']['pauseAssetGatewayId']; ?>" /><br>
        <label>Ending CTA Title</label><br/><input type="text" name="braftonVideoCTA[endingTitle]" value="<?php echo $options['braftonVideoCTA']['endingTitle']; ?>"><br>
        <label>Ending CTA Subtitle</label><br/><input type="text" name="braftonVideoCTA[endingSubtitle]" value="<?php echo $options['braftonVideoCTA']['endingSubtitle']; ?>"><br>
        <label>Ending CTA Button Image</label><br/><input type="text" name="braftonVideoCTA[endingButtonImage]" value="<?php echo $options['braftonVideoCTA']['endingButtonImage']; ?>"><input type="button" class="upload_image_button" value="Add Image" data-target="brafton-end-button-preview"><br/>
        <label>Button Position Require 2 coordinates</label><br/>
        <select name="braftonVideoCTA[endingButtonPositionOne]" style="width:90px" class="braftonPositionInput">
            <option value="0"></option>
            <option value="top" <?php checkRadioVal($options['braftonVideoCTA']['endingButtonPositionOne'], 'top', 'selected'); ?>>Top</option>
            <option value="right" <?php checkRadioVal($options['braftonVideoCTA']['endingButtonPositionOne'], 'right', 'selected'); ?> >Right</option>
            <option value="bottom" <?php checkRadioVal($options['braftonVideoCTA']['endingButtonPositionOne'], 'bottom', 'selected'); ?> >Bottom</option>
            <option value="left" <?php checkRadioVal($options['braftonVideoCTA']['endingButtonPositionOne'], 'left', 'selected'); ?> >Left</option>
        </select>
        <input type="number" name="braftonVideoCTA[endingButtonPositionOneValue]" value="<?php echo $options['braftonVideoCTA']['endingButtonPositionOneValue']; ?>" style="width:90px" class="braftonPositionInput"><br/>
        <select name="braftonVideoCTA[endingButtonPositionTwo]" style="width:90px" class="braftonPositionInput">
            <option value="0"></option>
            <option value="top" <?php checkRadioVal($options['braftonVideoCTA']['endingButtonPositionTwo'], 'top', 'selected'); ?>>Top</option>
            <option value="right" <?php checkRadioVal($options['braftonVideoCTA']['endingButtonPositionTwo'], 'right', 'selected'); ?> >Right</option>
            <option value="bottom" <?php checkRadioVal($options['braftonVideoCTA']['endingButtonPositionTwo'], 'bottom', 'selected'); ?> >Bottom</option>
            <option value="left" <?php checkRadioVal($options['braftonVideoCTA']['endingButtonPositionTwo'], 'left', 'selected'); ?> >Left</option>
        </select>
        <input type="number" name="braftonVideoCTA[endingButtonPositionTwoValue]" value="<?php echo $options['braftonVideoCTA']['endingButtonPositionTwoValue']; ?>" style="width:90px" class="braftonPositionInput"><br/>
        <label>Ending CTA Button Text</label><br/><input type="text" name="braftonVideoCTA[endingButtonText]" value="<?php echo $options['braftonVideoCTA']['endingButtonText']; ?>"><br>
        <label>Ending CTA Button Link</label><br/><input type="text" name="braftonVideoCTA[endingButtonLink]" value="<?php echo $options['braftonVideoCTA']['endingButtonLink']; ?>"><br>
        <label>Ending Asset Gateway ID</label><br/><input type="text" name="braftonVideoCTA[endingAssetGatewayId]" value="<?php echo $options['braftonVideoCTA']['endingAssetGatewayId']; ?>" /><br>
        <label>Ending Background Image</label><br/><input type="text" name="braftonVideoCTA[endingBackground]" value="<?php echo $options['braftonVideoCTA']['endingBackground']; ?>"><input type="button" class="upload_image_button" value="Add Image" data-target="brafton-end-background-preview"><br/>
        <div id="v_cta_preview">
            <img src="<?php echo $options['braftonVideoCTA']['endingBackground']; ?>" id="brafton-end-background-preview"><h2 id="brafton-end-title-preview"><?php echo $options['braftonVideoCTA']['endingTitle']; ?></h2><p id="brafton-end-subtitle-preview"><?php echo $options['braftonVideoCTA']['endingSubtitle']; ?></p>
            <?php if($options['braftonVideoCTA']['endingButtonImage'] != ''){ ?>
            <img style="" src="<?php echo $options['braftonVideoCTA']['endingButtonImage']; ?>" id="brafton-end-button-preview"><?php } else{ ?>
                <a class="ajs-call-to-action-button" href="#"><?php echo $options['braftonVideoCTA']['endingButtonText']; ?></a>
            <?php } ?>
        </div>
    </div>
<?php
}

/*
 ************************************************************************************************
 *
 * Marpro Setting Section // Temp renamed to Pumpkin // Final product name ARCH
 *
 ************************************************************************************************
 */
function MarproSettingsSetup(){
    //Marpro Tab
        register_setting(
            'brafton_marpro_options', // Option group
            'brafton_marpro' );
        //sets a section name for the options
        add_settings_section(
            'marpro', // ID
            'Arch Settings', // Title
            'print_section_info', // Callback
            'brafton_marpro' // Page
        );
        add_settings_field(
            'braftonMarproStatus',
            'Arch Status',
            'braftonMarproStatus',
            'brafton_marpro',
            'marpro'
        );
        add_settings_field(
            'braftonMarproId',
            'Arch Id',
            'braftonMarproId',
            'brafton_marpro',
            'marpro'
        );
}
//function for the marpro section
function braftonMarproStatus(){
    $options = getOptions();
    $tip = 'Turning on Arch will add our custom script to the footer allowing for connection to your Asset Gateway for your marketing resources';
    tooltip($tip); ?>
    <input type="radio" name="braftonMarproStatus" value="on" <?php	checkRadioval($options['braftonMarproStatus'], 'on'); ?> /> On
    <input type="radio" name="braftonMarproStatus" value="off" <?php checkRadioval($options['braftonMarproStatus'], 'off'); ?>/> Off
<?php
}
//function for setting the marpro id
function braftonMarproId(){
    $options = getOptions();
    $tip = 'If using our Arch Product you will need your Id.  You can obtain this information from your CMS';
    tooltip($tip); ?>
<input type="text" name="braftonMarproId" value="<?php
		echo $options['braftonMarproId']; ?>"/>
<?php
}

/*
 **************************************************************************************************
 *
 * Manual Import Section
 *
 **************************************************************************************************
 */
function ManualSettingsSetup(){
    //EManual Control Tab
        register_setting(
            'brafton_control_options', // Option group
            'brafton_control' );
        //sets a section name for the options
        add_settings_section(
            'control', // ID
            'Manual Control', // Title
            'print_section_info', // Callback
            'brafton_control' // Page
        );
        add_settings_section(
            'braftonManualImport',
            'Select an Import Option',
            'braftonManualImport',
            'brafton_control',
            'control'
        );
}

//Manual Import Settings
function braftonManualImport(){?>
    <div class="manual_buttons"><?php submit_button('Import Articles'); ?></div>
    <div class="manual_buttons"><?php submit_button('Import Videos'); ?></div>
    <div class="manual_buttons"><?php submit_button('Get Categories'); ?></div>
    <?php
}
function PremiumStylesAtlantisVideoSetup(){
    register_setting(
        'brafton_atlantis_style_options',
        'brafton_atlantis'
    );
    add_settings_section(
        'atlantis',
        'Atlantis Video Player',
        'print_section_info',
        'brafton_atlantis'
    );
    add_settings_field(
        'braftonEnableCustomCSS',
        'Enable Custom CSS Below',
        'braftonEnableCustomCSS',
        'brafton_atlantis',
        'atlantis'
    );
    add_settings_field(
        'braftonCustomCSS',
        'Custom CSS rules',
        'braftonCustomCSS',
        'brafton_atlantis',
        'atlantis'
    );
    add_settings_field(
        'braftonPauseColor',
        'Pause Text Color',
        'braftonPauseColor',
        'brafton_atlantis',
        'atlantis'
    );
    add_settings_field(
        'braftonEndBackgroundcolor',
        'Ending Background Color',
        'braftonEndBackgroundcolor',
        'brafton_atlantis',
        'atlantis'
    );
    add_settings_field(
        'braftonEndTitleColor',
        'Ending Title Color',
        'braftonEndTitleColor',
        'brafton_atlantis',
        'atlantis'
    );
    add_settings_field(
        'braftonEndTitleBackground',
        'Ending Title Background Color',
        'braftonEndTitleBackground',
        'brafton_atlantis',
        'atlantis'
    );
    add_settings_field(
        'braftonEndTitleAlign',
        'Ending Title Alignment',
        'braftonEndTitleAlign',
        'brafton_atlantis',
        'atlantis'
    );
    add_settings_field(
        'braftonEndSubTitleColor',
        'Ending SubTitle Color',
        'braftonEndSubTitleColor',
        'brafton_atlantis',
        'atlantis'
    );
    add_settings_field(
        'braftonEndSubTitleBackground',
        'Ending SubTitle Background Color',
        'braftonEndSubTitleBackground',
        'brafton_atlantis',
        'atlantis'
    );
    add_settings_field(
        'braftonEndSubTitleAlign',
        'Ending SubTitle Alignment',
        'braftonEndSubTitleAlign',
        'brafton_atlantis',
        'atlantis'
    );
    add_settings_field(
        'braftonEndButtonBackgroundColor',
        'Ending Button Color',
        'braftonEndButtonBackgroundColor',
        'brafton_atlantis',
        'atlantis'
    );
    add_settings_field(
        'braftonEndButtonTextColor',
        'Ending Text Button Color',
        'braftonEndButtonTextColor',
        'brafton_atlantis',
        'atlantis'
    );
    add_settings_field(
        'braftonEndButtonBackgroundColorHover',
        'Ending Button Color Hover',
        'braftonEndButtonBackgroundColorHover',
        'brafton_atlantis',
        'atlantis'
    );
    add_settings_field(
        'braftonEndButtonTextColorHover',
        'Ending Text Button Color Hover',
        'braftonEndButtonTextColorHover',
        'brafton_atlantis',
        'atlantis'
    );
}
function braftonEnableCustomCSS(){
    $options = getOptions();
    $tip = 'When this is on the CSS entered below will be used instead of the options choosen above';
    tooltip($tip); ?>
    <input type="radio" name="braftonEnableCustomCSS" value="1" <?php checkRadioval($options['braftonEnableCustomCSS'], 1); ?> /> Custom CSS Sheet Below
    <input type="radio" name="braftonEnableCustomCSS" value="0" <?php checkRadioval($options['braftonEnableCustomCSS'], 0); ?>/> None
    <input type="radio" name="braftonEnableCustomCSS" value="2" <?php checkRadioval($options['braftonEnableCustomCSS'], 2); ?>/> Use Selections Below
<?php
}
function braftonEndTitleBackground(){
    $options = getOptions();
    $tip = "Choose the color for the End of Video Title Background.  You may enter a hex code or use the color picker. Enter &ldquo;transparent &ldquo; for no background color";
    tooltip($tip); ?>
    <input type="text" name="braftonEndTitleBackground" style="width:150px" value="<?php echo $options['braftonEndTitleBackground']; ?>" > <input type="color" class="braftonColorChoose" title="ColorPicker" value="<?php echo $options['braftonEndTitleBackground']; ?>">
<?php
}
function braftonCustomCSS(){
    $options = getOptions();
    $tip = "Use CSS to style the Video Player.  Any CSS here will override any presets as well as any options selected above";
    tooltip($tip); ?>
    <textarea name="braftonCustomCSS" class="braftonCustomCSS" style="width:100%;height:500px;display:none"><?php echo $options['braftonCustomCSS']; ?></textarea>
<?php
}
function braftonEndButtonTextColorHover(){
    $options = getOptions();
    $tip = "Choose the color for the End of Video button Text on Hover.  You may enter a hex code or use the color picker.";
    tooltip($tip); ?>
    <input type="text" name="braftonEndButtonTextColorHover" style="width:150px" value="<?php echo $options['braftonEndButtonTextColorHover']; ?>" > <input type="color" class="braftonColorChoose" title="ColorPicker" value="<?php echo $options['braftonEndButtonTextColorHover']; ?>">
<?php
}
function braftonEndButtonBackgroundColorHover(){
    $options = getOptions();
    $tip = "Choose the color for the End of Video button Background on Hover.  You may enter a hex code or use the color picker. Enter &ldquo;transparent &ldquo; for no background color";
    tooltip($tip); ?>
    <input type="text" name="braftonEndButtonBackgroundColorHover" style="width:150px" value="<?php echo $options['braftonEndButtonBackgroundColorHover']; ?>" > <input type="color" class="braftonColorChoose" title="ColorPicker" value="<?php echo $options['braftonEndButtonBackgroundColorHover']; ?>">
<?php
}
function braftonEndButtonTextColor(){
    $options = getOptions();
    $tip = "Choose the color for the End of Video button Text.  You may enter a hex code or use the color picker.";
    tooltip($tip); ?>
    <input type="text" name="braftonEndButtonTextColor" style="width:150px" value="<?php echo $options['braftonEndButtonTextColor']; ?>" > <input type="color" class="braftonColorChoose" title="ColorPicker" value="<?php echo $options['braftonEndButtonTextColor']; ?>">
<?php
}
function braftonEndButtonBackgroundColor(){
    $options = getOptions();
    $tip = "Choose the color for the End of Video button Background.  You may enter a hex code or use the color picker. Enter &ldquo;transparent &ldquo; for no background color";
    tooltip($tip); ?>
    <input type="text" name="braftonEndButtonBackgroundColor" style="width:150px" value="<?php echo $options['braftonEndButtonBackgroundColor']; ?>" > <input type="color" class="braftonColorChoose" title="ColorPicker" value="<?php echo $options['braftonEndButtonBackgroundColor']; ?>">
<?php
}
function braftonEndSubTitleAlign(){
     $options = getOptions();
    $tip = "Choose the Title Text Alignment";
    tooltip($tip); ?>
        <select name="braftonEndSubTitleAlign" style="width:90px" class="braftonEndTitleAlign">
            <option value="0"></option>
            <option value="left" <?php checkRadioVal($options['braftonEndSubTitleAlign'], 'left', 'selected'); ?>>Left</option>
            <option value="center" <?php checkRadioVal($options['braftonEndSubTitleAlign'], 'center', 'selected'); ?> >Center</option>
            <option value="right" <?php checkRadioVal($options['braftonEndSubTitleAlign'], 'right', 'selected'); ?> >Right</option>
        </select>
<?php
}
function braftonEndSubTitleBackground(){
    $options = getOptions();
    $tip = "Choose the color for the End of Video Subtitle Background.  You may enter a hex code or use the color picker. Enter &ldquo;transparent &ldquo; for no background color";
    tooltip($tip); ?>
    <input type="text" name="braftonEndSubTitleBackground" style="width:150px" value="<?php echo $options['braftonEndSubTitleBackground']; ?>" > <input type="color" class="braftonColorChoose" title="ColorPicker" value="<?php echo $options['braftonEndSubTitleBackground']; ?>">
<?php
}
function braftonEndSubTitleColor(){
    $options = getOptions();
    $tip = "Choose the color for the End of Video Subtitle Text.  You may enter a hex code or use the color picker.";
    tooltip($tip); ?>
    <input type="text" name="braftonEndSubTitleColor" style="width:150px" value="<?php echo $options['braftonEndSubTitleColor']; ?>" > <input type="color" class="braftonColorChoose" title="ColorPicker" value="<?php echo $options['braftonEndSubTitleColor']; ?>">
<?php
}
function braftonEndTitleAlign(){
    $options = getOptions();
    $tip = "Choose the Title Text Alignment";
    tooltip($tip); ?>
        <select name="braftonEndTitleAlign" style="width:90px" class="braftonEndTitleAlign">
            <option value="0"></option>
            <option value="left" <?php checkRadioVal($options['braftonEndTitleAlign'], 'left', 'selected'); ?>>Left</option>
            <option value="center" <?php checkRadioVal($options['braftonEndTitleAlign'], 'center', 'selected'); ?> >Center</option>
            <option value="right" <?php checkRadioVal($options['braftonEndTitleAlign'], 'right', 'selected'); ?> >Right</option>
        </select>
<?php
}
function braftonEndTitleColor(){
    $options = getOptions();
    $tip = "Choose the color for the End of Video Title Text.  You may enter a hex code or use the color picker.";
    tooltip($tip); ?>
    <input type="text" name="braftonEndTitleColor" style="width:150px" value="<?php echo $options['braftonEndTitleColor']; ?>" > <input type="color" class="braftonColorChoose" title="ColorPicker" value="<?php echo $options['braftonEndTitleColor']; ?>">
<?php
}
function braftonEndBackgroundcolor(){
     $options = getOptions();
    $tip = "Choose the color for the End of Video Background.  You may enter a hex code or use the color picker. Enter &ldquo;transparent &ldquo; for no background color";
    tooltip($tip); ?>
    <input type="text" name="braftonEndBackgroundcolor" style="width:150px" value="<?php echo $options['braftonEndBackgroundcolor']; ?>" > <input type="color" class="braftonColorChoose" title="ColorPicker" value="<?php echo $options['braftonEndBackgroundcolor']; ?>">
<?php
}
function braftonPauseColor(){
    $options = getOptions();
    $tip = "Choose the color for the Pause CTA.  You may enter a hex code or use the color picker. Enter &ldquo;transparent &ldquo; for no background color";
    tooltip($tip); ?>
    <input type="text" name="braftonPauseColor" style="width:150px" value="<?php echo $options['braftonPauseColor']; ?>" > <input type="color" class="braftonColorChoose" title="ColorPicker" value="<?php echo $options['braftonPauseColor']; ?>">
<?php
}
function PremiumStylesArticleSetup(){
    register_setting(
        'brafton_article_style_options',
        'brafton_article_style'
    );
    add_settings_section(
        'article_style',
        'Premium Content Styles',
        'print_section_info',
        'brafton_article_style'
    );
    add_settings_field(
        'braftonPullQuotes',
        'Enable PullQuote Styles',
        'braftonPullQuotes',
        'brafton_article_style',
        'article_style'
    );
    add_settings_field(
        'braftonPullQuoteWidth',
        'Width of PullQuotes',
        'braftonPullQuoteWidth',
        'brafton_article_style',
        'article_style'
    );
    add_settings_field(
        'braftonPullQuoteFloat',
        'Pull Quote Float',
        'braftonPullQuoteFloat',
        'brafton_article_style',
        'article_style'
    );
    add_settings_field(
        'braftonPullQuoteMargin',
        'Pull Quote Margins',
        'braftonPullQuoteMargin',
        'brafton_article_style',
        'article_style'
    );
    add_settings_field(
        'braftonInlineImages',
        'Enable InlineImage Styles',
        'braftonInlineImages',
        'brafton_article_style',
        'article_style'
    );
    add_settings_field(
        'braftonInlineImageWidth',
        'Width of InlineImages',
        'braftonInlineImageWidth',
        'brafton_article_style',
        'article_style'
    );
    add_settings_field(
        'braftonInlineImageFloat',
        'Inline Images Float',
        'braftonInlineImageFloat',
        'brafton_article_style',
        'article_style'
    );
    add_settings_field(
        'braftonInlineImageMargin',
        'Inline Image Margins',
        'braftonInlineImageMargin',
        'brafton_article_style',
        'article_style'
    );
}
function braftonInlineImageMargin(){
    $options = getOptions();
    $tip = "Changes the margin of the Inline Images seperating it from the surronding content in pixels.  NOTE: this number should remain low.";
    tooltip($tip); ?>
        <input type="number" name="braftonInlineImageMargin" value="<?php echo $options['braftonInlineImageMargin']; ?>" />
<?php
}
function braftonInlineImageFloat(){
    $options = getOptions();
    $tip = "Float the pullquote to either side";
    tooltip($tip); ?>
    <select name="braftonInlineImageFloat" style="width:90px" class="braftonInlineImageFloat">
            <option value="0"></option>
            <option value="left" <?php checkRadioVal($options['braftonInlineImageFloat'], 'left', 'selected'); ?>>Left</option>
            <option value="right" <?php checkRadioVal($options['braftonInlineImageFloat'], 'right', 'selected'); ?> >Right</option>
            <option value="none" <?php checkRadioVal($options['braftonInlineImageFloat'], 'none', 'selected'); ?> >None</option>
        </select>
<?php
}
function braftonInlineImageWidth(){
    $options = getOptions();
    $tip = "Changes the width of the Inline Images in relation to the container in percentage";
    tooltip($tip); ?>
        <input type="number" name="braftonInlineImageWidth" value="<?php echo $options['braftonInlineImageWidth']; ?>" />
<?php
}
function braftonInlineImages(){
    $options = getOptions();
    $tip = 'Enables the correction of Inline Image Styles in your blog posts.  This will affect ALL Brafton Imline Images including CTAs';
    tooltip($tip); ?>
    <input type="radio" name="braftonInlineImages" value="1" <?php	checkRadioval($options['braftonInlineImages'], 1); ?> /> On
    <input type="radio" name="braftonInlineImages" value="0" <?php checkRadioval($options['braftonInlineImages'], 0); ?>/> Off
<?php
}
function braftonPullQuoteMargin(){
    $options = getOptions();
    $tip = "Changes the margin of the pullquote seperating it from the surronding content in pixels.  NOTE: this number should remain low.";
    tooltip($tip); ?>
        <input type="number" name="braftonPullQuoteMargin" value="<?php echo $options['braftonPullQuoteMargin']; ?>" />
<?php
}
function braftonPullQuoteFloat(){
    $options = getOptions();
    $tip = "Float the pullquote to either side";
    tooltip($tip); ?>
    <select name="braftonPullQuoteFloat" style="width:90px" class="braftonPullQuoteFloat">
            <option value="0"></option>
            <option value="left" <?php checkRadioVal($options['braftonPullQuoteFloat'], 'left', 'selected'); ?>>Left</option>
            <option value="right" <?php checkRadioVal($options['braftonPullQuoteFloat'], 'right', 'selected'); ?> >Right</option>
            <option value="none" <?php checkRadioVal($options['braftonPullQuoteFloat'], 'none', 'selected'); ?> >None</option>
        </select>
<?php
}
function braftonPullQuotes(){
    $options = getOptions();
    $tip = 'Enables the correction of PullQuotes Styles in your blog posts';
    tooltip($tip); ?>
    <input type="radio" name="braftonPullQuotes" value="1" <?php	checkRadioval($options['braftonPullQuotes'], 1); ?> /> On
    <input type="radio" name="braftonPullQuotes" value="0" <?php checkRadioval($options['braftonPullQuotes'], 0); ?>/> Off
<?php
}
function braftonPullQuoteWidth(){
    $options = getOptions();
    $tip = "Changes the width of the pullquote in relation to the container in percentage";
    tooltip($tip); ?>
        <input type="number" name="braftonPullQuoteWidth" value="<?php echo $options['braftonPullQuoteWidth']; ?>" />
<?php
}
function braftonRegisterSettings(){
//Defines each settings section for General, Articles, Videos, marpro, Archives, and Error Logs.  Each section is labeled with the appropriate settings section for finding the appropriate fucntion for displaying that option.

    GeneralSettingsSetup();
    ArticleSettingsSetup();
    VideoSettingsSetup();
    MarproSettingsSetup();
    ArchiveSettingSetup();
    ErrorSettingsSetup();
    ManualSettingsSetup();
    PremiumStylesAtlantisVideoSetup();
    PremiumStylesArticleSetup();
}
//add_action('admin_init', 'braftonRegisterSettings');
function admin_page(){
    braftonRegisterSettings();
    include 'BraftonAdminPage.php';
}
function style_page(){
    braftonRegisterSettings();
    include 'BraftonStylePage.php';
}
?>
