<?php get_header(); ?>

<?php wp_nav_menu(array('theme_location'=>'cate-menu')); ?>

<?php 
     
     $args=array(
        'post_type'=>'Restaurant-Menu',
     );

     $resto=new WP_Query($args);
 ?>


<div class="restaurants-Cate container">
<?php    
   
     while($resto->have_posts()):$resto->the_post();
     $chef=get_field('main_chef')[0];
     $open=strtotime(get_field('open_time'));
     $close=strtotime(get_field('closing_time'));
     $current=strtotime(date('H:i'));
   
    if($open<=$current && $current<=$close){ ?>
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
   <?php } else{ 
        echo '';
    }
     endwhile;wp_reset_postdata();
?>

</div>


<?php get_footer(); ?>