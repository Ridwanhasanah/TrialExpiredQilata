<?php
/**
 * Plugin Name: Trial Expired Qilata
 * Plugin URI: http://www.facebook.com/ridwan.hasanah3
 * Description: Trial Expired Qilata
 * Version: 1.0.0
 * Author: Ridwan Hasanah
 * Author URI: http://www.facebook.com/ridwan.hasanah3
 * License: GPL-3.0+
 * License URI: http://www.facebook.com/ridwan.hasanah3
 */

/*========== Nottice Expired Trial ==========*/

require_once ( plugin_dir_path(__FILE__ ) . 'dashboardmessage.php');
require_once ( plugin_dir_path(__FILE__ ) .'upgradeweb.php' );

function r_css_js(){

	//global $pagenow,$$typenow;

	wp_enqueue_style(' rcss', plugins_url('asset/css/rstyle.css', __FILE__ ));
	//wp_enqueue_style('rcss' );

}
add_action('wp_enqueue_scripts', 'r_css_js' );
?>