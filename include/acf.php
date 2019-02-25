<?php
function acf_load_cpt_template_field_choices( $field ) {

  // reset choices
  $field['choices'] = array();

  $args = array(
   'public'   => true,
   //'_builtin' => true
  );

  $output = 'objects'; // names or objects
  $operator = 'and'; // 'and' or 'or' (default: 'and')
  $post_types = get_post_types( $args, $output, $operator );

  foreach ( $post_types  as $post_type ) {

    $field['choices'][ $post_type->name ] = $post_type->labels->singular_name;

     //echo '<p>' . $post_type->name . '</p>';
  }


  // return the field
   return $field;

}

add_filter('acf/load_field/name=cpt_template_post_type', 'acf_load_cpt_template_field_choices');



function cpt_template_object_query( $args, $field, $post_id ) {

$cpt = the_field('cpt_template_post_type');

  $args = array(
	'post_type' => $cpt,

  );



	// return
    return $args;

}


// filter for a specific field based on it's name
add_filter('acf/fields/post_object/query/name=cpt_template_demo_page', 'cpt_template_object_query', 10, 3);
