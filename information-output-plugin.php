<?php
/*
Plugin Name: Information Output Plugin
Plugin URI: https://github.com/kulchenkoalex/information-output-plugin
Description: display information on the screen
Version: 1.0
Author: Alexey Kulchenko
Author URI: http://wp8poltava.it-dev-lab.com/wp-site/
Text Domain: information-output-plugin
Domain Path: /languages/

Copyright 2017  Kulchenko Alexey  (email: kulchenko.alexey@gmail.com)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

require_once plugin_dir_path(__FILE__) . '/config-path.php';
require_once INFORMATIONOUTPUT_PlUGIN_DIR.'/includes/common/InformationOutputAutoload.php';
require_once INFORMATIONOUTPUT_PlUGIN_DIR.'/includes/InformationOutputPlugin.php';

//Регистрация виджета
add_action('widgets_init', create_function('', 'return register_widget("includes\widgets\InformationOutputContactInformationWidget");'));

register_activation_hook( __FILE__, array('includes\InformationOutputPlugin' ,  'activation' ) );
register_deactivation_hook( __FILE__, array('includes\InformationOutputPlugin' ,  'deactivation' ) );

error_log(INFORMATIONOUTPUT_PlUGIN_URL_IMG);
?>