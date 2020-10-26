<?php

function get_Dishes() {
    if(isset($_POST['name'])){
  
          $time=$_POST['name'];
          $timeDishes=get_field($time, $_POST['id']);
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
                                        <button onclick="addToBag('<?php echo $newId; ?>','<?php echo $dish->ID; ?>')">
                                            ADD TO BAG
                                        </button>
                                   </div>

                                </div>

                            </div>
                           
                        </div>
                    </div>
                </div>

            <!-- ///// END MODAL ///// -->

             <?php endforeach; wp_die(); ?>
             <?php } else {
              echo ''; 
            }
      }
    
   
    add_action('wp_ajax_getDishes','get_Dishes');
    add_action('wp_ajax_nopriv_getDishes','get_Dishes');




    function send_ItemTo_Admin(){ 
        global $wpdb;

        if(isset($_POST['email'])){
            $name=sanitize_text_field($_POST['name']);
            $email=sanitize_text_field($_POST['email']);
            
            $phone=sanitize_text_field($_POST['phone']);
            $ItemList=sanitize_text_field($_POST['ItemList']);
            $totalPrice=sanitize_text_field($_POST['totalPrice']);

            
            $table = $wpdb->prefix. 'orders';
            $data=array(
                'name'=>$name,
                'email'=>$email,
                'phone'=>$phone,
                'date'=> date('Y-m-d H:i:s'),
                'ItemList'=>$ItemList,
                'totalPrice'=>$totalPrice
            );

            $format=array(
                '%s',
                '%s',
                '%s',
                '%s',
                '%s'
            );

            $wpdb->insert($table,$data,$format);
            // $url=get_page_by_title('Thanks For Ordering!');
            // wp_redirect(get_permalink($url));
            // exit();

            wp_die();
            
            
        }
               
    }
    
    
    add_action('wp_ajax_sendItemToAdmin','send_ItemTo_Admin');
    add_action('wp_ajax_nopriv_sendItemToAdmin','send_ItemTo_Admin');



    function remove_order(){
        if($_POST['type']=='delete'){
            global $wpdb;
            $table=$wpdb->prefix.'orders';
            $id=$_POST['id'];

            $result= $wpdb->delete($table, array('id'=>$id));

            if($result==1){
                $response=array(
                    'response'=>'success',
                );
            }else{
                $response=array(
                    'response'=>'error'
                );
            }
        }
        
        
        die(json_encode($response));
    }

    add_action('wp_ajax_removeOrder','remove_order');
    add_action('wp_ajax_nopriv_removeOrder','remove_order');

?>