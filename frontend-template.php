<?php
/**
 * Plugin Name: UCF Custom Post Type Templates
 * Plugin URI:  https://developer.wordpress.org/plugins/the-basics/
 * Description: Design custom post type templates from the frontend
 * Version:     1.0.0
 * Author:      Mark Bennett
 * Author URI:  https://developer.wordpress.org/
 * Text Domain: ucf_cpt
 * Domain Path: /languages
 * License:     GPL3
 */

defined( 'ABSPATH' ) or die( 'Uh oh!' );

//custom post type
include( plugin_dir_path( __FILE__ ) . 'include/cpt-template.php');

//ACF
include( plugin_dir_path( __FILE__ ) . 'include/acf.php');

//Include ACF Javascript
function cpt_template_my_admin_enqueue_scripts() {

	wp_enqueue_script( 'cpt_template-admin-js', plugin_dir_url( __FILE__ ) . 'include/js/cpt-template-select.js', array(), '1.0.0', true );
  wp_localize_script( 'my_ajax_filter_search', 'ajax_url', admin_url('admin-ajax.php') );

}

add_action('acf/input/admin_enqueue_scripts', 'cpt_template_my_admin_enqueue_scripts');


function more_post_ajax(){
    $offset = $_POST["offset"];
    $ppp = $_POST["ppp"];
    $post_type;
    header("Content-Type: text/html");

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        //'cat' => 1,
        //'offset' => $offset,
    );

    $loop = new WP_Query($args);
    while ($loop->have_posts()) { $loop->the_post();
       the_title();
    }

    exit;
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');
