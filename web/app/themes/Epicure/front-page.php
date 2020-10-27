<?php get_header(); ?>


<section class="open" style="background-image: url(<?php echo get_field('open_img'); ?>);">
    <div class="open-inner">
        <p class="open-text">
            <?php the_field('open_text'); ?>
        </p>
        <div class="open-search">
        <form class="search-form" method="get" action="<?php echo home_url(); ?>" role="search">
                <button class="search-button" type="search" role="button"></button>
                <input id="searchInput" onkeyup="search_Input()" class="search-input" autocomplete="off" type="search" name="s" placeholder="<?php _e('Search for restaurant cuisine, chef');?>">        
        </form>
            <ul id="search_options">
                
                    <?php
                    $argsRest=array(
                    'post_type'=>'Restaurant-Menu'
                    );

                    $Restaurants_Options=new WP_Query($argsRest);

                    while($Restaurants_Options->have_posts()):$Restaurants_Options->the_post();?>
                <li id="<?php echo get_the_ID().'c'; ?>" class="search_list" value="<?php the_title(); ?>" style="width: 100rem;" onclick="select_Search_Input('<?php echo get_the_ID().'c'; ?>')">
                   <h2>Restaurants:</h2>
                   <p><?php the_title(); ?></p>
                </li>
                    <?php endwhile; wp_reset_postdata();?>


                    <?php
                    $args_Dishes=array(
                    'post_type'=>'dishes'
                    );

                    $Dishes_Options=new WP_Query($args_Dishes);

                    while($Dishes_Options->have_posts()):$Dishes_Options->the_post();?>
                <li id="<?php echo get_the_ID().'c'; ?>" class="search_list" value="<?php the_title(); ?>" style="width: 100rem;" onclick="select_Search_Input('<?php echo get_the_ID().'c'; ?>')">
                   <h2>Cuisine:</h2>
                   <p><?php the_title(); ?></p>
                </li>
                    <?php endwhile; wp_reset_postdata();?>
                
            </ul>
        </div>
    </div>
</section>


<section class="Mobile-Buttons">
        <div class="Mobile-Buttons-Inner">
           <div class="chef-button">
             <p>chefs</p>
           </div>
           <div class="res-button">
             <p>restaurants</p>
           </div>
        </div>
</section>

<section class="popularRestaurants">
    <h1>THE POPULAR RESTAURANTS IN EPICURE :</h1>
    <div class="grid3 the-restaurants container owl-carousel">
      <?php
      $PopularRestaurants=get_field('choose_the_restaurants');
       foreach($PopularRestaurants as $restu):?>
        <?php $chef=get_field('main_chef',$restu->ID); ?>

        <a href="<?php echo get_page_link($restu->ID); ?>">
        <div class="restaurant">
            <div class="resu-img">
            <?php echo get_the_post_thumbnail($restu->ID); ?>
            </div>

            <div class="resu-content">
               <p class="title"><?php echo $restu->post_title ?></p>
               <p class="chef"><?php echo $chef[0]->post_title; ?></p>
            </div>
        </div>
        </a>

       <?php endforeach; ?>
       <a class="all" href="<?php echo get_category_link(2); ?>">
       <h3>All Restaurants <img class="arrow-img" src="<?php echo get_template_directory_uri()."/img/all-restaurants-arrows.svg" ?>"></h3>
       </a>
    </div>

</section>

<section class="popularDishes">
     <h1>SIGNATURE DISH OF :</h1>
     <div class="grid3 the-dishes container owl-carousel">
        <?php 
          $PopularDishes=get_field('pick_the_dishes');
          foreach($PopularDishes as $dish):?>
          <?php 
          $DishRestaurant= get_field('dish_restaurant',$dish->ID); 
          $DishPrice=get_field('price',$dish->ID);
          ?>
         
         <div class="PopDish">
            <div class="dishRes">
                <h2><?php echo $DishRestaurant[0]->post_title; ?></h2>
            </div>

            <div class="dishImg">
              <?php echo get_the_post_thumbnail($dish->ID); ?>
            </div>

            <div class="dish-content">
                <p class="title"><?php echo $dish->post_title; ?></p>
                <p class="desc"><?php echo $dish->post_content; ?></p>
                <div class="dishIcon">
                  <?php $icon=get_the_terms($dish->ID,'icons'); ?>
                   <?php if(get_field('icon_img',$icon[0])){ ?>
                    <img class="icon" src="<?php echo get_field('icon_img',$icon[0]) ?>" alt="">
                    <?php }else{ ?>
                     <?php echo ''; ?>
                    <?php }; ?>
                </div>
                <div class="dishPrice">
                <span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13">
                        <g fill="none" fill-rule="evenodd" stroke="#000" stroke-width=".639">
                            <path d="M1 12V.48h5.253C8.127.453 9.064 1.616 9.064 3.97v4.45"/>
                            <path d="M13.544.48V12H8.291c-1.874.027-2.811-1.136-2.811-3.49V4.06"/>
                        </g>
                    </svg><?php echo $DishPrice; ?>
                </span>
                </div>
            </div>
         </div>
            
        <?php endforeach; ?>

     </div>
</section>

<section class="ourIcons">
  <h1>THE MEANING OF OUR ICONS :</h1>
  <div class="theIcons container">
     <?php $terms = get_terms( array('taxonomy'   => 'icons'));
        foreach( $terms as $term ):?>
           <div class="iconIt">
            <img src="<?php echo get_field( 'icon_img',$term ) ?>" alt="">
            <p><?php echo $term->name ?></p>
           </div>
        <?php endforeach;?>
  </div>
</section>




<section class="chefOfWeek">
<h1>CHEF OF THE WEEK :</h1>
    <div class="theChef ">
        <?php $chef=get_field('best_chef')[0]; ?>
        <div class="chefImg" style="background-image: url(<?php echo get_the_post_thumbnail_url($chef); ?>);">
            <div class="name">
               <p> <?php echo $chef->post_title; ?></p>
            </div>
        </div>

        <div class="chefContent">
            <?php echo $chef->post_content; ?>
        </div>
    </div>

    <div class="chefRestaurants ">
        <div class="chef-title">
            <?php
            $chefName=substr($chef->post_title, 0, strrpos($chef->post_title, ' '));
            echo $chefName; ?>'s restaurants :
        </div>

        <div class="the-Restaurants owl-carousel">
            <?php $theRestaurants=get_field('his_restaurants',$chef);?>
            <?php foreach($theRestaurants as $res): ?>
                <a href="<?php echo get_page_link($res->ID); ?>">
                <div class="rest">
                  <div class="res-img">
                    <?php echo get_the_post_thumbnail($res->ID); ?>
                  </div>
                  <div class="res-title">
                    <?php echo $res->post_title; ?>
                  </div>
                </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

</section>

<section class="About">
    <div class="innerAbout">
        <div class="aboutUs">
            <div class="aboutContent">
                <?php $id=22;
                    $post=get_post($id);
                ?>
                <h1>ABOUT US:</h1>  
                <p><?php echo $post->post_content; ?></p>
            </div>

            <div class="aboutImg">
                <img src="<?php echo get_template_directory_uri()."/img/about-logo.png" ?>">
            </div>
        </div>

        <div class="appStore">
            <div class="apple">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="31" viewBox="0 0 24 31">
                <path fill="#000" fill-rule="nonzero" d="M17.633.842c-1.657.549-3.228 1.104-4.381 2.25s-1.762 2.857-1.57 5.339c.027.395.462.711.856.624 1.721-.38 3.408-1.046 4.6-2.282 1.193-1.237 1.808-3.057 1.417-5.393-.099-.542-.51-.655-.922-.538zM7.433 9.41c.86 0 1.718.363 2.58.786.862.422 1.695.936 2.69.936 1.125-.105 2.184-.586 3.063-.947 1.017-.414 2.041-.775 2.91-.775 1.57 0 3.248.986 4.27 2.035-1.932 1.68-3.567 3.654-3.567 5.888.012 3.022 2.009 4.675 4.117 6.135A11.986 11.986 0 0 1 21.2 28.14c-1.154 1.414-2.525 2.282-3.58 2.282-.897 0-1.664-.288-2.437-.624-.772-.337-1.544-.754-2.481-.754-.937 0-1.772.404-2.635.743-.863.339-1.737.635-2.635.635-.395 0-1.123-.327-1.91-1.055-.788-.728-1.642-1.814-2.405-3.122C1.593 23.628.406 20.107.406 16.644.34 12.517 3.854 9.417 7.433 9.41z"/>
            </svg> 
                <p>
                Download on the <br>
                 <b>App Store</b>
                </p>
            </div>

            <div class="apple">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" viewBox="0 0 19 25">
                <path fill="#000" fill-rule="evenodd" d="M18.147 10.826L3.033.34C1.743-.554 0 .42 0 2.026V22.97c0 1.633 1.744 2.582 3.033 1.686L18.147 14.17c1.137-.764 1.137-2.554 0-3.344z"/>
            </svg>
                <p>
                Get it on <br>
                 <b>Google Play</b>
                </p>
            </div>
        </div>
    </div>

</section>


<?php get_footer(); ?>