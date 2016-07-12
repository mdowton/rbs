<?php
/*
Plugin Name: ReachLocal Tracking Code
Plugin URI: http://edge.reachlocal.com/
Description: Enables the <a href="http://www.reachlocal.com/">ReachLocal</a> tracking code on all your site pages.
Version: 1.0.0
Author: ReachLocal, Inc.
Author URI: http://www.reachlocal.com/
*/

if (!defined('WP_CONTENT_URL'))
      define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if (!defined('WP_CONTENT_DIR'))
      define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if (!defined('WP_PLUGIN_URL'))
      define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if (!defined('WP_PLUGIN_DIR'))
      define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');

function activate_reachlocaltracking() {
  add_option('reachlocal_tracking_id', '00000000-0000-0000-0000-000000000000');
}

function deactive_reachlocaltracking() {
  delete_option('reachlocal_tracking_id');
}

function admin_init_reachlocaltracking() {
  register_setting('reachlocaltracking', 'reachlocal_tracking_id');
}

function admin_menu_reachlocaltracking() {
  add_options_page('ReachLocal Tracking', 'ReachLocal Tracking', 'manage_options', 'reachlocaltracking', 'options_page_reachlocaltracking');
}

function options_page_reachlocaltracking() {
  include(WP_PLUGIN_DIR.'/reachlocaltracking/options.php');  
}

function reachlocaltracking() {
  $reachlocal_tracking_id = get_option('reachlocal_tracking_id');
?>
<script type="text/javascript">var rl_siteid = "<?php echo $reachlocal_tracking_id ?>";</script>
<script type="text/javascript" src="//cdn.rlets.com/capture_static/mms/mms.js" async="async"></script>
<?php
}

register_activation_hook(__FILE__, 'activate_reachlocaltracking');
register_deactivation_hook(__FILE__, 'deactive_reachlocaltracking');

if (is_admin()) {
  add_action('admin_init', 'admin_init_reachlocaltracking');
  add_action('admin_menu', 'admin_menu_reachlocaltracking');
}

if (!is_admin()) {
  add_action('wp_head', 'reachlocaltracking');
}

?>
