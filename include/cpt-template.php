<?php

if ( ! function_exists('UCF_cpt_template_creator') ) {

// Register Custom Post Type
function UCF_cpt_template_creator() {

	$labels = array(
		'name'                  => _x( 'CPT Templates', 'Post Type General Name', 'ucf_lang' ),
		'singular_name'         => _x( 'CPT Template', 'Post Type Singular Name', 'ucf_lang' ),
		'menu_name'             => __( 'CPT Templates', 'ucf_lang' ),
		'name_admin_bar'        => __( 'CPT Template', 'ucf_lang' ),
		'archives'              => __( 'Template Archives', 'ucf_lang' ),
		'attributes'            => __( 'Item Attributes', 'ucf_lang' ),
		'parent_item_colon'     => __( 'Parent Item:', 'ucf_lang' ),
		'all_items'             => __( 'All Templates', 'ucf_lang' ),
		'add_new_item'          => __( 'Add New Template', 'ucf_lang' ),
		'add_new'               => __( 'Add New', 'ucf_lang' ),
		'new_item'              => __( 'New Template', 'ucf_lang' ),
		'edit_item'             => __( 'Edit Template', 'ucf_lang' ),
		'update_item'           => __( 'Update Template', 'ucf_lang' ),
		'view_item'             => __( 'View Template', 'ucf_lang' ),
		'view_items'            => __( 'View Templates', 'ucf_lang' ),
		'search_items'          => __( 'Search Template', 'ucf_lang' ),
		'not_found'             => __( 'Not found', 'ucf_lang' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'ucf_lang' ),
		'featured_image'        => __( 'Featured Image', 'ucf_lang' ),
		'set_featured_image'    => __( 'Set featured image', 'ucf_lang' ),
		'remove_featured_image' => __( 'Remove featured image', 'ucf_lang' ),
		'use_featured_image'    => __( 'Use as featured image', 'ucf_lang' ),
		'insert_into_item'      => __( 'Insert into item', 'ucf_lang' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'ucf_lang' ),
		'items_list'            => __( 'Items list', 'ucf_lang' ),
		'items_list_navigation' => __( 'Items list navigation', 'ucf_lang' ),
		'filter_items_list'     => __( 'Filter items list', 'ucf_lang' ),
	);
	$args = array(
		'label'                 => __( 'CPT Template', 'ucf_lang' ),
		'description'           => __( 'Create templates for custom post types', 'ucf_lang' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'revisions' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20.1,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => false,
    'menu_icon'             => 'dashicons-hammer',
		'capability_type'       => 'page',
	);
	register_post_type( 'ucf_cpt_template', $args );

}
add_action( 'init', 'UCF_cpt_template_creator', 0 );

}



function my_acf_add_local_field_groups() {

	acf_add_local_field_group(array(
		'key' => 'group_5c70e8ddcd78d',
		'title' => 'CPT Template',
		'fields' => array(
			array(
				'key' => 'field_5c70e9dadff60',
				'label' => 'Custom Post Type',
				'name' => 'cpt_template_post_type',
				'type' => 'select',
				'instructions' => 'Select the custom post type you\'d like to edit.',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'post' => 'Post',
					'page' => 'Page',
					'attachment' => 'Media',
					'ucf_cpt_template' => 'CPT Template',
					'initiatives' => 'Initiative',
					'person' => 'Person',
					'ucf_section' => 'Section',
					'ucf_spotlight' => 'Spotlight',
					'shortcode' => 'Shortcode',
				),
				'default_value' => array(
				),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_5c70ea64dff61',
				'label' => 'Custom Post Type Templates',
				'name' => 'cpt_template_style',
				'type' => 'checkbox',
				'instructions' => 'Select if you want to change the individual page or archive page',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'single' => 'Single',
					'archive' => 'Archive',
				),
				'allow_custom' => 0,
				'default_value' => array(
				),
				'layout' => 'horizontal',
				'toggle' => 0,
				'return_format' => 'value',
				'save_custom' => 0,
			),
			array(
				'key' => 'field_5c710f16c0868',
				'label' => 'Select which page to pull the content from (for development purpose)',
				'name' => 'cpt_template_demo_page',
				'type' => 'select',
				'instructions' => 'Select a page you want to get the content from. This allows you to see how the would look from this page',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
				),
				'default_value' => array(
				),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 1,
				'ajax' => 0,
				'return_format' => 'value',
				'placeholder' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'ucf_cpt_template',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));


}

add_action('acf/init', 'my_acf_add_local_field_groups');
