<?php

/**
 * Plugin Name:       Elementor Questionaire
 * Description:       Questionaire is created by Zain Hassan.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Zain Hassan
 * Author URI:        https://hassanzain.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       elementor-questionaire 
*/

if(!defined('ABSPATH')){
exit;
}

function add_questoinaire_category( $elements_manager ) {

	$elements_manager->add_category(
		'el-questionaire',
		[
			'title' => esc_html__( 'El Questionaire', 'elementor-questionaire' ),
			'icon' => 'fa fa-plug',
		]
	);



}
add_action( 'elementor/elements/categories_registered', 'add_questoinaire_category' );

/**
 *  questionaire Elementor Custom Widget
*/
function register_questionaire_elementor_widgets( $widgets_manager ) {
    /** Home Slider Widget **/
	require_once( __DIR__ . '/inc/questionaire.php' );
	$widgets_manager->register( new \questionaire_widget_elementore );

}
add_action( 'elementor/widgets/register', 'register_questionaire_elementor_widgets' );



function plugin_scripts_questionaire() {

	wp_enqueue_script( 'questionaire-script', plugins_url( 'inc/assets/js/script.js', __FILE__ ), [], '1.0.0', true );

}
add_action( 'wp_footer', 'plugin_scripts_questionaire' );