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

//change the_content fillter
include( plugin_dir_path( __FILE__ ) . 'include/cpt-template-replace-cotent.php');

//Include ACF Javascript
function cpt_template_my_admin_enqueue_scripts() {

	wp_enqueue_script( 'cpt_template_admin_js', plugin_dir_url( __FILE__ ) . 'include/js/cpt-template-select.js', array(), '1.0.0', true );
  wp_localize_script('cpt_template_admin_js', 'ajax_url',
     array(
         'ajaxurl' => admin_url('admin-ajax.php'),

     )
);

}

add_action('acf/input/admin_enqueue_scripts', 'cpt_template_my_admin_enqueue_scripts'); //add javascript to the admin ares


function more_post_ajax(){
        $post_type = $_POST["post_type"];
    header("Content-Type: text/html");

    $args = array(
        'post_type' => $post_type,
        'posts_per_page' => -1,
    );

    $loop = new WP_Query($args);
		ob_start();
    while ($loop->have_posts()) { $loop->the_post();?>
			<option value="<?php the_ID(); ?>"><?php the_title(); ?></option>
<?php
    }

		$posts_html = ob_get_contents(); // we pass the posts to variable
   		ob_end_clean(); // clear the buffer

			echo $posts_html;


    exit;
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');
