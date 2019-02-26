<?php


function cpt_template_content($content) {


  $current = get_post_type();// get the currnet page pos ttype

// WP_Query arguments
$args = array(
	'post_type'              => array( 'ucf_cpt_template' ),
	'post_status'            => array( 'publish' ),
	'orderby'                => 'menu_order',
  'meta_query'             => array(
      		'relation' => 'OR',
      		array(
      			'key'     => 'cpt_template_post_type',
      			'value'   => $current,
      			'compare' => '=',
      		),
	       ),
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		// do something
		//$content = "Post Name: " . get_the_title() . " Post ID: " . get_the_ID();
    $content .= get_the_content();
	}
} else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata();


return $content;

}

add_filter('the_content', 'cpt_template_content');
