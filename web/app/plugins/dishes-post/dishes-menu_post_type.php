<?php 
 /*
        Plugin Name: Dishes Menu - Post Types
        Plugin URI: 
        Description: Adds a Dish Post Type into WordPress
        Version: 1.0.2
        Author: David
        Text Domain: gymfitness
    */

    if(!defined('ABSPATH')) die();


// Register new Custom Post Type
function dish_menu() {
	$labels = array(
		'name'               => _x( 'Dishes', 'blog' ),
		'singular_name'      => _x( 'Dish', 'post type singular name', 'blog' ),
		'menu_name'          => _x( 'Dishes', 'admin menu', 'blog' ),
		'name_admin_bar'     => _x( 'Dishes', 'add new on admin bar', 'blog' ),
		'add_new'            => _x( 'Add New', 'book', 'blog' ),
		'add_new_item'       => __( 'Add New Dish', 'blog' ),
		'new_item'           => __( 'New Dishes', 'blog' ),
		'edit_item'          => __( 'Edit Dishes', 'blog' ),
		'view_item'          => __( 'View Dishes', 'blog' ),
		'all_items'          => __( 'All Dishes', 'blog' ),
		'search_items'       => __( 'Search Dishes', 'blog' ),
		'parent_item_colon'  => __( 'Parent Dishes:', 'blog' ),
		'not_found'          => __( 'No Dishes found.', 'blog' ),
		'not_found_in_trash' => __( 'No Dishes found in Trash.', 'blog' )
	);


	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'blog' ),
		'public'             => true,
		'menu_icon'          =>'dashicons-buddicons-community',
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'dish' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
	);
	
	register_post_type( 'dishes', $args );
}


function sides_dishes_taxonomy() {
 
	$labels = array(
	  'name' => _x( 'Sides', 'taxonomy general name' ),
	  'singular_name' => _x( 'Side', 'taxonomy singular name' ),
	  'search_items' =>  __( 'Search Sides' ),
	  'all_items' => __( 'All Sides' ),
	  'parent_item' => __( 'Parent Side' ),
	  'parent_item_colon' => __( 'Parent Side:' ),
	  'edit_item' => __( 'Edit Side' ), 
	  'update_item' => __( 'Update Side' ),
	  'add_new_item' => __( 'Add New Side' ),
	  'new_item_name' => __( 'New Side Name' ),
	  'menu_name' => __( 'Sides' ),
	); 	
   
	register_taxonomy('sides',array('dishes'), array(
	  'hierarchical' => true,
	  'labels' => $labels,
	  'show_ui' => true,
	  'show_admin_column' => true,
	  'query_var' => true,
	  'rewrite' => array( 'slug' => 'side' ),
	));
  }


function changes_dishes_taxonomy() {
 
	$labels = array(
	  'name' => _x( 'Changes', 'taxonomy general name' ),
	  'singular_name' => _x( 'Change', 'taxonomy singular name' ),
	  'search_items' =>  __( 'Search Changes' ),
	  'all_items' => __( 'All Changes' ),
	  'parent_item' => __( 'Parent Change' ),
	  'parent_item_colon' => __( 'Parent Change:' ),
	  'edit_item' => __( 'Edit Change' ), 
	  'update_item' => __( 'Update Change' ),
	  'add_new_item' => __( 'Add New Change' ),
	  'new_item_name' => __( 'New Change Name' ),
	  'menu_name' => __( 'Changes' ),
	); 	
   
	register_taxonomy('changes',array('dishes'), array(
	  'hierarchical' => true,
	  'labels' => $labels,
	  'show_ui' => true,
	  'show_admin_column' => true,
	  'query_var' => true,
	  'rewrite' => array( 'slug' => 'change' ),
	));
  }
   


  function icons_dishes_taxonomy() {
 
	$labels = array(
	  'name' => _x( 'Icons', 'taxonomy general name' ),
	  'singular_name' => _x( 'Icon', 'taxonomy singular name' ),
	  'search_items' =>  __( 'Search Icons' ),
	  'all_items' => __( 'All Icons' ),
	  'parent_item' => __( 'Parent Icon' ),
	  'parent_item_colon' => __( 'Parent Icon:' ),
	  'edit_item' => __( 'Edit Icon' ), 
	  'update_item' => __( 'Update Icon' ),
	  'add_new_item' => __( 'Add New Icon' ),
	  'new_item_name' => __( 'New Icon Name' ),
	  'menu_name' => __( 'Icons' ),
	); 	
   
	register_taxonomy('icons',array('dishes'), array(
	  'hierarchical' => true,
	  'labels' => $labels,
	  'show_ui' => true,
	  'show_admin_column' => true,
	  'query_var' => true,
	  'rewrite' => array( 'slug' => 'icons' ),
	));
  }

  function whenServe_taxonomy() {
 
	$labels = array(
	  'name' => _x( 'Serving Time', 'taxonomy general name' ),
	  'singular_name' => _x( 'Serving Time', 'taxonomy singular name' ),
	  'search_items' =>  __( 'Search Serving Time' ),
	  'all_items' => __( 'All Serving Times' ),
	  'parent_item' => __( 'Parent Serve' ),
	  'parent_item_colon' => __( 'Parent Serve:' ),
	  'edit_item' => __( 'Edit Serving Time' ), 
	  'update_item' => __( 'Update Serving Time' ),
	  'add_new_item' => __( 'Add New Serving Time' ),
	  'new_item_name' => __( 'New Serving Time Name' ),
	  'menu_name' => __( 'Serving Times' ),
	); 	
   
	register_taxonomy('serving times',array('dishes'), array(
	  'hierarchical' => true,
	  'labels' => $labels,
	  'show_ui' => true,
	  'show_admin_column' => true,
	  'query_var' => true,
	  'rewrite' => array( 'slug' => 'serving times' ),
	));
  }


	// Hooks
	add_action( 'init', 'icons_dishes_taxonomy', 0 );
	add_action( 'init', 'sides_dishes_taxonomy', 0 );
	add_action( 'init', 'changes_dishes_taxonomy', 0 );
	add_action( 'init','whenServe_taxonomy',0);
    add_action( 'init', 'dish_menu' );?>