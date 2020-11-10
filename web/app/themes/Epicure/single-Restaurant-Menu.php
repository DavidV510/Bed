<?php get_header(); ?>

<?php while(have_posts()):the_post(); ?>
<?php $chef=get_field('main_chef')[0];?>
    <div class="resContainer">
    <div class="res-Thumnail" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">

        </div>
        <div class="resDetails">
            <h1><?php the_title(); ?></h1>
            <p><?php echo $chef->post_title; ?></p>
            <p class="openTime"><?php 
                  $open=strtotime(get_field('open_time'));
                  $close=strtotime(get_field('closing_time'));
                  $current=strtotime(date('H:i'));
                if($open<=$current && $current<=$close){?>
                <?xml version="1.0" encoding="UTF-8"?>
                <svg width="17px" height="18px" viewBox="0 0 17 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <!-- Generator: sketchtool 52.5 (67469) - http://www.bohemiancoding.com/sketch -->
                    
                    <g id="Home-page---desktop" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="desktop---claro" transform="translate(-663.000000, -612.000000)" fill="#000000" fill-rule="nonzero">
                            <g id="Group-4" transform="translate(663.000000, 612.190000)">
                                <g id="np_clock_2120466_000000">
                                    <path d="M8.5,3.39304115e-16 C3.80838202,3.39304115e-16 0,3.80838202 0,8.5 C0,13.191618 3.80838202,17 8.5,17 C13.191618,17 17,13.191618 17,8.5 C17,3.80838202 13.191618,0 8.5,3.39304115e-16 Z M8.5,0.405898876 C12.9753933,0.405898876 16.6000225,4.02460674 16.6000225,8.5 C16.6000225,12.9753933 12.9752022,16.6000225 8.5,16.6000225 C4.02479775,16.6000225 0.399977528,12.9752022 0.399977528,8.5 C0.399977528,4.02460674 4.02479775,0.405898876 8.5,0.405898876 Z M11.8008652,6.18991011 C11.7769888,6.19587921 11.755351,6.20632504 11.7352051,6.21975562 L8.47617135,8.20741854 L8.45229494,8.21935674 C8.4485643,8.22084892 8.44408738,8.22308738 8.44035674,8.22532584 C8.43811828,8.22681802 8.4366261,8.22905648 8.43438764,8.23129494 C8.43214918,8.23278712 8.430657,8.23502558 8.42841854,8.23726404 C8.42618008,8.23875622 8.4246879,8.24099469 8.42244944,8.24323315 C8.4187188,8.24696379 8.41424188,8.25069443 8.41051124,8.25517135 C8.40827278,8.25666353 8.4067806,8.25890199 8.40454213,8.26039436 C8.40230367,8.26263263 8.40081149,8.26487109 8.39857303,8.26636346 C8.39633457,8.27084019 8.39484239,8.27457083 8.39260393,8.27830166 C8.39036547,8.28053993 8.38887329,8.2820323 8.38663483,8.28427076 C8.38439637,8.28650903 8.38290419,8.2880014 8.38066573,8.29023987 L8.38066573,8.30217807 C8.37842727,8.30441634 8.37693509,8.30590871 8.37469663,8.30814717 C8.37245817,8.31187781 8.37096599,8.31560845 8.36872753,8.32008537 C8.36648907,8.32381601 8.36499689,8.32754665 8.36275843,8.33202357 L8.36275843,8.33799267 L8.36275843,8.3491846 C8.36051997,8.35142306 8.35902779,8.35366152 8.35678933,8.3551537 L8.35678933,8.3670919 L8.35678933,8.3790301 L8.35678933,8.3849992 L8.35678933,8.3909683 C8.35604324,8.40290651 8.35604324,8.41484471 8.35678933,8.42678291 L8.35678933,14.3660863 C8.3523124,14.4220468 8.37171208,14.4772606 8.40976438,14.5182993 C8.44781764,14.5593362 8.5007927,14.5824676 8.55675326,14.5824676 C8.61271382,14.5824676 8.66643573,14.5593381 8.70448899,14.5182993 C8.74179539,14.4772625 8.7611964,14.4220468 8.7567191,14.3660863 L8.7567191,8.50433347 L11.9443146,6.558311 C12.0308656,6.50906639 12.0681739,6.40386122 12.0323593,6.31133347 C11.9965447,6.21881336 11.8980536,6.16583639 11.8010638,6.188221 L11.8008652,6.18991011 Z" id="clock-icon"></path>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg> Open Now
                <?php } else{ ?>
                    Closed
               <?php  } ?>
              </p>
        </div>

        
        <div class="res-Dishes">
        
        <div id="dishes" data-id="<?php echo $post -> ID ?>">
        <?php 
           $dinnerTimes=array('breakfast_dishes','lunch_dishes','dinner_dishes');
            foreach($dinnerTimes as $key=>$din):
              if(null!==get_field($din) && get_field($din)!==''){
                
                  if($din=='lunch_dishes'){?>
                <button id="<?php echo $din;  ?>" class="dishes-cat" onclick="sendAjax('<?php echo $din ?>',<?php echo $key+1 ?>)">
                <?php 
                   echo 'Lunch'; ?>
                </button>

                 <?php } else{  ?>
                    <button id="<?php echo $din;  ?>" class="dishes-cat" onclick="sendAjax('<?php echo $din ?>',<?php echo $key+1 ?>)">
                        <?php 
                            $din=ucfirst($din);
                            echo trim($din,'_dishes'); ?>
                    </button>
                <?php   } ?>
              
             <?php }
             
             ?>   

         <?php endforeach;?>
        
        </div>
        
        <ul class="theDishes">
            <?php 
            
            if(get_field('breakfast_dishes')){
                $timeDishes=get_field('breakfast_dishes');
                foreach($timeDishes as $dish):
                    $DishPrice=get_field('price',$dish->ID);
                    $newId=$dish->ID + 1 .'a';
                ?>

                <li class='theDish'  data-toggle="modal" data-target="#<?php echo $newId ?>"> 
                    <div class="theDish-Img">
                      <?php echo get_the_post_thumbnail($dish->ID); ?>
                    </div>    
                    
                    <div class="theDish-Title">
                    <?php echo $dish->post_title ?>
                    </div>

                    <div class="theDish-Content">
                    <?php echo $dish->post_content ?>
                    </div>

                    <div class="theDish-Price">
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13">
                            <g fill="none" fill-rule="evenodd" stroke="#000" stroke-width=".639">
                                <path d="M1 12V.48h5.253C8.127.453 9.064 1.616 9.064 3.97v4.45"/>
                                <path d="M13.544.48V12H8.291c-1.874.027-2.811-1.136-2.811-3.49V4.06"/>
                            </g>
                        </svg><?php echo $DishPrice; ?>
                    </span>
                    </div>
               </li>

        <!-- Modal -->
                <div class="modal fade" id="<?php echo $newId ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="innerModal">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                        <g fill="none" fill-rule="evenodd" stroke="#FFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                            <path d="M1 1l18 18M19 1L1 19"/>
                                        </g>
                                    </svg>
                                </span>
                        </button>
                        <div class="modal-dialog" >
                            
                           <div class="modal-dish-img">
                             <?php echo get_the_post_thumbnail($dish->ID); ?>
                           </div>

                            <div class="modal-dish-inner">

                               <div class="modal-dish-title">
                                    
                                    <div class="title">
                                    <?php $icon=get_the_terms($dish->ID,'icons'); ?>
                                            <?php if(get_field('icon_img',$icon[0])){ ?>
                                            <img class="icon" src="<?php echo get_field('icon_img',$icon[0]) ?>" alt="">
                                            <?php }else{ ?>
                                            <?php echo ''; ?>
                                        <?php }; ?>
                                        <span><?php echo $dish->post_title ?></span>
                                    </div>
                                    
                                </div>
                              
                                <div class="modal-dish-content">
                                   <p><?php echo $dish->post_content ?></p>

                                   <div class="modal-dish-price">
                                       <span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13">
                                                <g fill="none" fill-rule="evenodd" stroke="#000" stroke-width=".639">
                                                    <path d="M1 12V.48h5.253C8.127.453 9.064 1.616 9.064 3.97v4.45"/>
                                                    <path d="M13.544.48V12H8.291c-1.874.027-2.811-1.136-2.811-3.49V4.06"/>
                                                </g>
                                            </svg> <span style="padding: 0;
                                                position: relative;
                                                top: 0.1rem;"><?php echo $DishPrice; ?></span>
                                        </span>
                                   </div>


                                   <?php if(get_the_terms($dish->ID,'sides')){ ?>
                                   <div class="modal-dish-side">
                                        <h1>Choose A Side</h1>
                                        <div class="side-pick">
                                        <?php 
                                           
                                            
                                                $sides=get_the_terms($dish->ID,'sides');
                                                foreach($sides as $side):?>
                                                
                                                <div class="the-side-pick">
                                                <div id="<?php echo $side->term_id; ?>" class="side " onclick="chooseSide('<?php echo $side->name; ?>', <?php echo $side->term_id; ?>)">
                                                    <div class="inside">
                                                    <input type="radio"  style ="opacity:0;" value="<?php echo $side->name; ?>" name="side" />
                                                    </div>
                                                </div>
                                                <?php echo $side->name; ?>
                                                </div>
                                                <?php endforeach; ?>
                                        </div>
                                   </div>
                                    <?php  }else{
                                                echo '';
                                            }; ?>

                                  <?php if(get_the_terms($dish->ID,'changes')){ ?>
                                   <div class="modal-dish-change">
                                        <h1>Changes</h1>
                                        <div class="change-pick">
                                        <?php 
                                                $changes=get_the_terms($dish->ID,'changes');
                                                foreach($changes as $change):?>
                                                <div class="the-change-pick">
                                                <div id="<?php echo $change->term_id; ?>" class="change " onclick="chooseChange('<?php echo $change->name; ?>', <?php echo $change->term_id; ?>)">
                                                    <div class="inside">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11">
                                                        <path fill="#000" fill-rule="evenodd" d="M12.813.794L5.27 8.642l-4.019-4.15a.58.58 0 0 0-.866 0 .65.65 0 0 0 0 .908l4.451 4.605c.124.13.31.195.433.195.185 0 .31-.064.432-.195l7.914-8.301a.65.65 0 0 0 0-.909c-.184-.26-.555-.26-.802 0z"/>
                                                    </svg>

                                                    <input type="radio" style ="opacity:0;" class="check-change" value="<?php echo $change->name; ?>" name="change" />
                                                    </div>
                                                </div>
                                                <?php echo $change->name; ?>
                                                </div>
                                                <?php endforeach;
                                        ?>
                                        </div>
                                   </div>
                                   <?php }else{
                                                echo '';
                                            } ?>


                                   <div class="modal-dish-quantity">
                                       <h1>Quantity</h1>
                                       <div class="quant">
                                            <button class="reduce" onclick="reduce(<?php echo $dish->ID; ?>)">
                                            -
                                            </button>

                                            <div id="num<?php echo $dish->ID; ?>" class="number">
                                            2
                                            </div>

                                            <button class="add" onclick="add(<?php echo $dish->ID; ?>)">
                                              +
                                            </button>
                                       </div>
                                   </div>


                                   <div class="modal-add-bag">
                                        <?php    if(get_current_user_id()){ ?>
                                        <button class="users" onclick="Add_To_Bag_User('<?php echo $newId; ?>','<?php echo $dish->ID; ?>')">
                                            ADD TO BAG
                                        </button>
                                      <?php } else {?>
                                        <button onclick="addToBag('<?php echo $newId; ?>','<?php echo $dish->ID; ?>')">
                                            ADD TO BAG
                                        </button>
                                      <?php } ?>
                                   </div>

                                </div>

                            </div>
                           
                        </div>
                    </div>
                </div>

            <!-- ///// END MODAL ///// -->

             <?php endforeach; ?>
             <?php } elseif(get_field('lunch_dishes')){
                $timeDishes=get_field('lunch_dishes');
                foreach($timeDishes as $dish):
                    $DishPrice=get_field('price',$dish->ID);
                    $newId=$dish->ID + 1 .'a';
                ?>

                <li class='theDish'  data-toggle="modal" data-target="#<?php echo $newId ?>"> 
                    <div class="theDish-Img">
                      <?php echo get_the_post_thumbnail($dish->ID); ?>
                    </div>    
                    
                    <div class="theDish-Title">
                    <?php echo $dish->post_title ?>
                    </div>

                    <div class="theDish-Content">
                    <?php echo $dish->post_content ?>
                    </div>

                    <div class="theDish-Price">
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13">
                            <g fill="none" fill-rule="evenodd" stroke="#000" stroke-width=".639">
                                <path d="M1 12V.48h5.253C8.127.453 9.064 1.616 9.064 3.97v4.45"/>
                                <path d="M13.544.48V12H8.291c-1.874.027-2.811-1.136-2.811-3.49V4.06"/>
                            </g>
                        </svg><?php echo $DishPrice; ?>
                    </span>
                    </div>
               </li>

        <!-- Modal -->
                <div class="modal fade" id="<?php echo $newId ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="innerModal">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                        <g fill="none" fill-rule="evenodd" stroke="#FFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                            <path d="M1 1l18 18M19 1L1 19"/>
                                        </g>
                                    </svg>
                                </span>
                        </button>
                        <div class="modal-dialog" >
                            
                           <div class="modal-dish-img">
                             <?php echo get_the_post_thumbnail($dish->ID); ?>
                           </div>

                            <div class="modal-dish-inner">

                               <div class="modal-dish-title">
                                    
                                    <div class="title">
                                    <?php $icon=get_the_terms($dish->ID,'icons'); ?>
                                            <?php if(get_field('icon_img',$icon[0])){ ?>
                                            <img class="icon" src="<?php echo get_field('icon_img',$icon[0]) ?>" alt="">
                                            <?php }else{ ?>
                                            <?php echo ''; ?>
                                        <?php }; ?>
                                        <span><?php echo $dish->post_title ?></span>
                                    </div>
                                    
                                </div>
                              
                                <div class="modal-dish-content">
                                   <p><?php echo $dish->post_content ?></p>

                                   <div class="modal-dish-price">
                                       <span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13">
                                                <g fill="none" fill-rule="evenodd" stroke="#000" stroke-width=".639">
                                                    <path d="M1 12V.48h5.253C8.127.453 9.064 1.616 9.064 3.97v4.45"/>
                                                    <path d="M13.544.48V12H8.291c-1.874.027-2.811-1.136-2.811-3.49V4.06"/>
                                                </g>
                                            </svg> <span style="padding: 0;
                                                position: relative;
                                                top: 0.1rem;"><?php echo $DishPrice; ?></span>
                                        </span>
                                   </div>


                                   <?php if(get_the_terms($dish->ID,'sides')){ ?>
                                   <div class="modal-dish-side">
                                        <h1>Choose A Side</h1>
                                        <div class="side-pick">
                                        <?php 
                                           
                                            
                                                $sides=get_the_terms($dish->ID,'sides');
                                                foreach($sides as $side):?>
                                                
                                                <div class="the-side-pick">
                                                <div id="<?php echo $side->term_id; ?>" class="side " onclick="chooseSide('<?php echo $side->name; ?>', <?php echo $side->term_id; ?>)">
                                                    <div class="inside">
                                                    <input type="radio"  style ="opacity:0;" value="<?php echo $side->name; ?>" name="side" />
                                                    </div>
                                                </div>
                                                <?php echo $side->name; ?>
                                                </div>
                                                <?php endforeach; ?>
                                        </div>
                                   </div>
                                    <?php  }else{
                                                echo '';
                                            }; ?>

                                  <?php if(get_the_terms($dish->ID,'changes')){ ?>
                                   <div class="modal-dish-change">
                                        <h1>Changes</h1>
                                        <div class="change-pick">
                                        <?php 
                                                $changes=get_the_terms($dish->ID,'changes');
                                                foreach($changes as $change):?>
                                                <div class="the-change-pick">
                                                <div id="<?php echo $change->term_id; ?>" class="change " onclick="chooseChange('<?php echo $change->name; ?>', <?php echo $change->term_id; ?>)">
                                                    <div class="inside">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11">
                                                        <path fill="#000" fill-rule="evenodd" d="M12.813.794L5.27 8.642l-4.019-4.15a.58.58 0 0 0-.866 0 .65.65 0 0 0 0 .908l4.451 4.605c.124.13.31.195.433.195.185 0 .31-.064.432-.195l7.914-8.301a.65.65 0 0 0 0-.909c-.184-.26-.555-.26-.802 0z"/>
                                                    </svg>

                                                    <input type="radio" style ="opacity:0;" class="check-change" value="<?php echo $change->name; ?>" name="change" />
                                                    </div>
                                                </div>
                                                <?php echo $change->name; ?>
                                                </div>
                                                <?php endforeach;
                                        ?>
                                        </div>
                                   </div>
                                   <?php }else{
                                                echo '';
                                            } ?>


                                   <div class="modal-dish-quantity">
                                       <h1>Quantity</h1>
                                       <div class="quant">
                                            <button class="reduce" onclick="reduce(<?php echo $dish->ID; ?>)">
                                            -
                                            </button>

                                            <div id="num<?php echo $dish->ID; ?>" class="number">
                                            2
                                            </div>

                                            <button class="add" onclick="add(<?php echo $dish->ID; ?>)">
                                              +
                                            </button>
                                       </div>
                                   </div>


                                   <div class="modal-add-bag">
                                        <?php    if(get_current_user_id()){ ?>
                                        <button class="users" onclick="Add_To_Bag_User('<?php echo $newId; ?>','<?php echo $dish->ID; ?>')">
                                            ADD TO BAG
                                        </button>
                                      <?php } else {?>
                                        <button onclick="addToBag('<?php echo $newId; ?>','<?php echo $dish->ID; ?>')">
                                            ADD TO BAG
                                        </button>
                                      <?php } ?>
                                   </div>

                                </div>

                            </div>
                           
                        </div>
                    </div>
                </div>

            <!-- ///// END MODAL ///// -->

             <?php endforeach;
             
            } else{
                $timeDishes=get_field('lunch_dishes');
                foreach($timeDishes as $dish):
                    $DishPrice=get_field('price',$dish->ID);
                    $newId=$dish->ID + 1 .'a';
                ?>

                <li class='theDish'  data-toggle="modal" data-target="#<?php echo $newId ?>"> 
                    <div class="theDish-Img">
                      <?php echo get_the_post_thumbnail($dish->ID); ?>
                    </div>    
                    
                    <div class="theDish-Title">
                    <?php echo $dish->post_title ?>
                    </div>

                    <div class="theDish-Content">
                    <?php echo $dish->post_content ?>
                    </div>

                    <div class="theDish-Price">
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13">
                            <g fill="none" fill-rule="evenodd" stroke="#000" stroke-width=".639">
                                <path d="M1 12V.48h5.253C8.127.453 9.064 1.616 9.064 3.97v4.45"/>
                                <path d="M13.544.48V12H8.291c-1.874.027-2.811-1.136-2.811-3.49V4.06"/>
                            </g>
                        </svg><?php echo $DishPrice; ?>
                    </span>
                    </div>
               </li>

        <!-- Modal -->
                <div class="modal fade" id="<?php echo $newId ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="innerModal">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                        <g fill="none" fill-rule="evenodd" stroke="#FFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                            <path d="M1 1l18 18M19 1L1 19"/>
                                        </g>
                                    </svg>
                                </span>
                        </button>
                        <div class="modal-dialog" >
                            
                           <div class="modal-dish-img">
                             <?php echo get_the_post_thumbnail($dish->ID); ?>
                           </div>

                            <div class="modal-dish-inner">

                               <div class="modal-dish-title">
                                    
                                    <div class="title">
                                    <?php $icon=get_the_terms($dish->ID,'icons'); ?>
                                            <?php if(get_field('icon_img',$icon[0])){ ?>
                                            <img class="icon" src="<?php echo get_field('icon_img',$icon[0]) ?>" alt="">
                                            <?php }else{ ?>
                                            <?php echo ''; ?>
                                        <?php }; ?>
                                        <span><?php echo $dish->post_title ?></span>
                                    </div>
                                    
                                </div>
                              
                                <div class="modal-dish-content">
                                   <p><?php echo $dish->post_content ?></p>

                                   <div class="modal-dish-price">
                                       <span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13">
                                                <g fill="none" fill-rule="evenodd" stroke="#000" stroke-width=".639">
                                                    <path d="M1 12V.48h5.253C8.127.453 9.064 1.616 9.064 3.97v4.45"/>
                                                    <path d="M13.544.48V12H8.291c-1.874.027-2.811-1.136-2.811-3.49V4.06"/>
                                                </g>
                                            </svg> <span style="padding: 0;
                                                position: relative;
                                                top: 0.1rem;"><?php echo $DishPrice; ?></span>
                                        </span>
                                   </div>


                                   <?php if(get_the_terms($dish->ID,'sides')){ ?>
                                   <div class="modal-dish-side">
                                        <h1>Choose A Side</h1>
                                        <div class="side-pick">
                                        <?php 
                                           
                                            
                                                $sides=get_the_terms($dish->ID,'sides');
                                                foreach($sides as $side):?>
                                                
                                                <div class="the-side-pick">
                                                <div id="<?php echo $side->term_id; ?>" class="side " onclick="chooseSide('<?php echo $side->name; ?>', <?php echo $side->term_id; ?>)">
                                                    <div class="inside">
                                                    <input type="radio"  style ="opacity:0;" value="<?php echo $side->name; ?>" name="side" />
                                                    </div>
                                                </div>
                                                <?php echo $side->name; ?>
                                                </div>
                                                <?php endforeach; ?>
                                        </div>
                                   </div>
                                    <?php  }else{
                                                echo '';
                                            }; ?>

                                  <?php if(get_the_terms($dish->ID,'changes')){ ?>
                                   <div class="modal-dish-change">
                                        <h1>Changes</h1>
                                        <div class="change-pick">
                                        <?php 
                                                $changes=get_the_terms($dish->ID,'changes');
                                                foreach($changes as $change):?>
                                                <div class="the-change-pick">
                                                <div id="<?php echo $change->term_id; ?>" class="change " onclick="chooseChange('<?php echo $change->name; ?>', <?php echo $change->term_id; ?>)">
                                                    <div class="inside">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11">
                                                        <path fill="#000" fill-rule="evenodd" d="M12.813.794L5.27 8.642l-4.019-4.15a.58.58 0 0 0-.866 0 .65.65 0 0 0 0 .908l4.451 4.605c.124.13.31.195.433.195.185 0 .31-.064.432-.195l7.914-8.301a.65.65 0 0 0 0-.909c-.184-.26-.555-.26-.802 0z"/>
                                                    </svg>

                                                    <input type="radio" style ="opacity:0;" class="check-change" value="<?php echo $change->name; ?>" name="change" />
                                                    </div>
                                                </div>
                                                <?php echo $change->name; ?>
                                                </div>
                                                <?php endforeach;
                                        ?>
                                        </div>
                                   </div>
                                   <?php }else{
                                                echo '';
                                            } ?>


                                   <div class="modal-dish-quantity">
                                       <h1>Quantity</h1>
                                       <div class="quant">
                                            <button class="reduce" onclick="reduce(<?php echo $dish->ID; ?>)">
                                            -
                                            </button>

                                            <div id="num<?php echo $dish->ID; ?>" class="number">
                                            2
                                            </div>

                                            <button class="add" onclick="add(<?php echo $dish->ID; ?>)">
                                              +
                                            </button>
                                       </div>
                                   </div>


                                   <div class="modal-add-bag">
                                        <?php    if(get_current_user_id()){ ?>
                                        <button class="users" onclick="Add_To_Bag_User('<?php echo $newId; ?>','<?php echo $dish->ID; ?>')">
                                            ADD TO BAG
                                        </button>
                                      <?php } else {?>
                                        <button onclick="addToBag('<?php echo $newId; ?>','<?php echo $dish->ID; ?>')">
                                            ADD TO BAG
                                        </button>
                                      <?php } ?>
                                   </div>

                                </div>

                            </div>
                           
                        </div>
                    </div>
                </div>

            <!-- ///// END MODAL ///// -->

             <?php endforeach;
            }?> 
        </ul>
        </div>
    </div>
   


<?php endwhile; ?>
<?php get_footer(); ?>