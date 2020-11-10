<?php 
// //  Php Queries
 require  get_template_directory().'/inc/queries.php';
  
// // Database 
 require get_template_directory().'/inc/database.php';

// //Options Page
  require get_template_directory().'/inc/options.php';


  function epicure_scripts(){
     wp_enqueue_style('head',get_template_directory_uri().'/css/head.css',NULL,'1.0.0.6.4');
     wp_enqueue_style('foot',get_template_directory_uri().'/css/foot.css',NULL,'1.0.0.6.4');
     wp_enqueue_style('front',get_template_directory_uri().'/css/front.css',NULL,'1.0.0.6.4');
     wp_enqueue_style('category',get_template_directory_uri().'/css/category.css',NULL,'1.0.0.6.4');
     wp_enqueue_style('restaurant',get_template_directory_uri().'/css/restaurant.css',NULL,'1.0.0.6.4');
     wp_enqueue_style('cart',get_template_directory_uri().'/css/cart.css',NULL,'1.0.0.6.4');
     wp_enqueue_style('search_Cart_Modal',get_template_directory_uri().'/css/search_dish_modal.css',NULL,'1.0.0.6.4');
     wp_enqueue_style('users',get_template_directory_uri().'/css/users.css',NULL,'1.0.0.6.4');

     wp_enqueue_style('style',get_stylesheet_uri(),array('head','foot','front','category','restaurant','cart','search_Cart_Modal','users'),'1.0.0.6.4');

     wp_enqueue_script('jquery');
     wp_enqueue_script('script', get_template_directory_uri().'/js/script.js',array('jquery'), '1.0.0.3.0',true);
     wp_enqueue_script('user',get_template_directory_uri().'/js/user.js',array('jquery'), '1.0.0.3.0',true);
     wp_localize_script(
          'script',
          'admin_ajax',
          array(
              'ajaxurl'=>admin_url('admin-ajax.php'),
              'siteurl'=>trim(str_replace('wp','',site_url()))
          )
      );
      wp_localize_script(
        'user',
        'admin_ajax',
        array(
            'ajaxurl'=>admin_url('admin-ajax.php'),
            'siteurl'=>trim(str_replace('wp','',site_url()))
        )
    );
  }

  add_action('wp_enqueue_scripts','epicure_scripts');


  function epicure_thumbnail(){
    add_theme_support('post-thumbnails');
  }

  add_action('after_setup_theme','epicure_thumbnail');

  function epicure_menu(){
    register_nav_menus(array(
      'main-menu'=>'Main Menu',
      'mobile1-menu'=>'Mobile1 Menu',
      'mobile2-menu'=>'Mobile2 Menu',
      'mobile3-menu'=>'Mobile3 Menu',
      'footer-menu'=>'Footer Menu',
      'cate-menu'=>'cate menu'
    ));
  };
  add_action('init','epicure_menu');
  
  function admin_scripts(){
    wp_enqueue_script('ajax-admin', get_template_directory_uri().'/js/admin-ajax.js',array('jquery'), '1.0.0.1',true);
    
    wp_localize_script(
        'ajax-admin',
        'admin_ajax',
        array(
            'ajaxurl'=>admin_url('admin-ajax.php'),
            
        )
    );
  }
  add_action('admin_enqueue_scripts','admin_scripts');


  function wporg_simple_role() {
    add_role(
        'simple_role',
        'Simple Role',
        array(
            'read'         => true,
            'edit_posts'   => true,
            'upload_files' => true,
        )
      );
}
 
// Add the simple_role.
add_action( 'init', 'wporg_simple_role' );


// Start session
function start_session(){
  if(!session_id()){
    session_start();
  }
}

add_action('init','start_session',1);




/// Remove WP_Users Posts 
function wph_admin_user_columns($columns) {
  unset($columns['posts']);
 
  return $columns;
}
 
add_filter('manage_users_columns', 'wph_admin_user_columns', 10, 3);

if ( ! current_user_can( 'manage_options' ) ) {
  add_filter('show_admin_bar', '__return_false', 1000);
}


