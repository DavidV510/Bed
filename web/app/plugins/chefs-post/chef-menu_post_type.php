<?php 
 /*
        Plugin Name: Chefs Menu - Post Types
        Plugin URI: 
        Description: Adds a Chef Post Type into WordPress
        Version: 1.0
        Author: David
        Text Domain: gymfitness
    */

    if(!defined('ABSPATH')) die();


// Register new Custom Post Type
function chef_menu() {
	$labels = array(
		'name'               => _x( 'Chefs', 'blog' ),
		'singular_name'      => _x( 'Chef', 'post type singular name', 'blog' ),
		'menu_name'          => _x( 'Chefs', 'admin menu', 'blog' ),
		'name_admin_bar'     => _x( 'Chefs', 'add new on admin bar', 'blog' ),
		'add_new'            => _x( 'Add New', 'book', 'blog' ),
		'add_new_item'       => __( 'Add New Chef', 'blog' ),
		'new_item'           => __( 'New Chefs', 'blog' ),
		'edit_item'          => __( 'Edit Chefs', 'blog' ),
		'view_item'          => __( 'View Chefs', 'blog' ),
		'all_items'          => __( 'All Chefs', 'blog' ),
		'search_items'       => __( 'Search Chefs', 'blog' ),
		'parent_item_colon'  => __( 'Parent Chefs:', 'blog' ),
		'not_found'          => __( 'No Chefs found.', 'blog' ),
		'not_found_in_trash' => __( 'No Chefs found in Trash.', 'blog' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'blog' ),
		'public'             => true,
		'menu_icon'          =>'dashicons-admin-users',
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'chef' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
    'taxonomies'          => array( 'category' ),
	);

	register_post_type( 'Chef-Menu', $args );
}

add_action( 'init', 'chef_menu' ); 