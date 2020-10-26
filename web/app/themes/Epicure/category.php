<?php get_header(); ?>



<?php wp_nav_menu(array('theme_location'=>'cate-menu')); ?>

<?php 
     $page=$wp_query->get_queried_object();
     $id=$page->term_id;
     
     $args=array(
        'post_type'=>'Restaurant-Menu',
        'cat'=>$id
     );

     $resto=new WP_Query($args);
     
?>

<div class="restaurants-Cate container">
    <?php while($resto->have_posts()):$resto->the_post(); 
       $chef=get_field('main_chef')[0];
    
      ?>
       <div class="theRestaurant">
           <a href="<?php the_permalink(); ?>">
           <div class="ResImg">
            <?php the_post_thumbnail(); ?>
           </div>
           <div class="ResCont">
              <h1><?php the_title(); ?></h1>
              <p><?php echo $chef->post_title; ?></p>
           </div>
           </a>
       </div>
    <?php endwhile;wp_reset_postdata(); ?>
</div>

<?php get_footer(); ?>