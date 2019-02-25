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
