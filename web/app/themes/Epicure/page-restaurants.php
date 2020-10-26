<?php get_header(); ?>
<?php 
  
   $args=array(
       'post_type'=>'Restaurant-Menu'
   );
   $categories=get_categories( $args );
   foreach($categories as $cat):
?>


    <h1><?php var_dump($cat); ?></h1>

   <?php endforeach; ?>


<?php get_footer(); ?>