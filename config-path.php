<?php
define("INFORMATIONOUTPUT_PlUGIN_DIR", plugin_dir_path(__FILE__));
define("INFORMATIONOUTPUT_PlUGIN_URL", plugin_dir_url( __FILE__ ));
define("INFORMATIONOUTPUT_PlUGIN_SLUG", preg_replace( '/[^\da-zA-Z]/i', '_',  basename(INFORMATIONOUTPUT_PlUGIN_DIR)));
define("INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN", str_replace( '_', '-', INFORMATIONOUTPUT_PlUGIN_SLUG ));
define("INFORMATIONOUTPUT_PlUGIN_OPTION_VERSION", INFORMATIONOUTPUT_PlUGIN_SLUG.'_version');
define("INFORMATIONOUTPUT_PlUGIN_OPTION_NAME", INFORMATIONOUTPUT_PlUGIN_SLUG.'_options');
define("INFORMATIONOUTPUT_PlUGIN_AJAX_URL", admin_url('admin-ajax.php'));

if (!function_exists( 'get_plugins' ) ){
     require_once ABSPATH . 'wp-admin/includes/plugin.php';
}
$TPOPlUGINs = get_plugin_data(INFORMATIONOUTPUT_PlUGIN_DIR.'/'.basename(INFORMATIONOUTPUT_PlUGIN_DIR).'.php', false, false);

define("INFORMATIONOUTPUT_PlUGIN_VERSION", $TPOPlUGINs['Version']);
define("INFORMATIONOUTPUT_PlUGIN_NAME", $TPOPlUGINs['Name']);
?>