<?php get_header(); 
  // Deployment Branch
?>

<div class="popularRestaurants resContainer SearchCont">
<?php
      while(have_posts()):the_post();?>
       <h1 style="margin-top: 6rem;">Search Results for: <?php the_title(); ?> </h1>
    <div class="grid3 the-restaurants container ">
      
        <?php if(get_post_type()=='restaurant-menu'){ ?>
          
            <?php $chef=get_field('main_chef'); ?>

            <a href="<?php the_permalink(); ?>">
            <div class="restaurant">
                <div class="resu-img">
                <?php the_post_thumbnail(); ?>
                </div>

                <div class="resu-content">
                  <p class="title"><?php the_title() ?></p>
                  <p class="chef"><?php echo $chef[0]->post_title; ?></p>
                </div>
            </div>
            </a>   
         <?php  }?>
       </div>

         <?php if(get_post_type()=='dishes'){ ?>
          
          <div class="resContainer">
          <ul class="theDishes"><?php 
             get_template_part('template-parts/page','dishSearch'); ?>
            </ul>
          </div>
           
         <?php  } ?>
       <?php endwhile; ?>
       
    
</div>
<?php get_footer(); ?>