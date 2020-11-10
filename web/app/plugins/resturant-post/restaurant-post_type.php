<?php 
 /*
        Plugin Name: Restaurants Menu - Post Types
        Plugin URI: 
        Description: Adds a Restaurant Post Type into WordPress
        Version: 1.0
        Author: David
        Text Domain: table
    */

if(!defined('ABSPATH')) die();


// Register new Custom Post Type
function restaurant_menu() {
	$labels = array(
		'name'               => _x( 'Restaurants', 'blog' ),
		'singular_name'      => _x( 'Restaurant', 'post type singular name', 'blog' ),
		'menu_name'          => _x( 'Restaurants', 'admin menu', 'blog' ),
		'name_admin_bar'     => _x( 'Restaurants', 'add new on admin bar', 'blog' ),
		'add_new'            => _x( 'Add New', 'book', 'blog' ),
		'add_new_item'       => __( 'Add New Restaurant', 'blog' ),
		'new_item'           => __( 'New Restaurants', 'blog' ),
		'edit_item'          => __( 'Edit Restaurants', 'blog' ),
		'view_item'          => __( 'View Restaurants', 'blog' ),
		'all_items'          => __( 'All Restaurants', 'blog' ),
		'search_items'       => __( 'Search Restaurants', 'blog' ),
		'parent_item_colon'  => __( 'Parent Restaurants:', 'blog' ),
		'not_found'          => __( 'No Restaurants found.', 'blog' ),
		'not_found_in_trash' => __( 'No Restaurants found in Trash.', 'blog' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'blog' ),
		'menu_icon'          =>'dashicons-store',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'restaurant' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'         => array( 'category' ),
	);

	register_post_type( 'Restaurant-Menu', $args );
}

add_action( 'init', 'restaurant_menu' );