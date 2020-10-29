<?php get_header(); 


if(isset($_SESSION['userId'])){ ?>

<div class="cart-user">
    <h1 class="ml-2">
    The stuff for: <?php echo $_SESSION['userName'] ?>
    </h1>
    <table class="table Cart">
                    <thead>
                        <tr>
                            <th class="tHead">Title</th>
                            <th class="tHead timg">Img</th>
                            <th class="tHead">Side</th>
                            <th class="tHead">Changes</th>
                            <th class="tHead">Quantity</th>
                            <th class="tHead">Price</th>
                            <th class="tHead">Remove</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php 
                    global $wpdb;
                     $userId=$_SESSION['userId'];


                     //Get the user row from DB
                     $findUser="SELECT * FROM wp_users_epicure WHERE id='$userId'";
                     $findUser=$wpdb->get_results($findUser);
                     $beforeJson_User=$findUser[0]->ItemList;

                     // Turn to JSON
                     $beforeJson_User=str_replace('}{','},{',$beforeJson_User);
                     $beforeJson_User='['.$beforeJson_User.']';
                     $theJson_User=json_decode($beforeJson_User);

                     // Vars to define Total Price and New ID for each item
                     global $total;
                     $total=0;
                     $newId=0;
                     
                     //Displaying the Items
                    foreach($theJson_User as $item){ 
                      $newId++;
                      $item->id=$newId;
                      ?>
                       <tr id="<?php echo $newId; ?>">
                            <td> Title : <?php echo $item->title; ?></td>
                            <td class="table-img"><img src='<?php echo $item->img; ?>'> </td>
                            <?php if($item->side){ ?>
                            <td><?php echo $item->side; ?> </td>
                            <?php  } else{ ?>
                            <td> No Sides </td>
                            <?php  } ?>

                            <?php if($item->change){ ?>
                            <td><?php echo $item->change; ?> </td>
                            <?php  } else{ ?>
                              <td> No Changes </td>
                            <?php  } ?>
                            <td><?php echo $item->quantity; ?> </td>
                                        
                            <td><?php echo $item->total; ?> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13">
                                <g fill="none" fill-rule="evenodd" stroke="#000" stroke-width=".639">
                                    <path d="M1 12V.48h5.253C8.127.453 9.064 1.616 9.064 3.97v4.45"/>
                                    <path d="M13.544.48V12H8.291c-1.874.027-2.811-1.136-2.811-3.49V4.06"/>
                                </g>
                            </svg></td>
                            <td><button class="CartButton" onclick="removeDish_User('<?php echo $newId; ?>')"> Remove </button></td>
                       
                   <?php 

                    $total=$total+$item->total;
                    }

                    //Updating the Items in DB
                    //Back to string
                    
                      $new_item_list=json_encode($theJson_User);
                      $updateItems=str_replace('},{','}{',$new_item_list);
                      $updateItems=str_replace('[','',$updateItems); 
                      $updateItems=str_replace(']','',$updateItems);
                      // $status='active';
                      // $min_id=0;
                      $wpdb->query("UPDATE wp_users_epicure SET ItemList='$updateItems' WHERE id= $userId ");
        
                  
                    ?>
                          
                    
                    </tbody>
    </table>
      
    <?php if(count($theJson_User)>0){?>
      <form id="form3" class="cart-form">

        <div class="form-Stuff">
        <p>Total Price:  <span class="form-Price-user"> <?php echo $total; ?></span>  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13">
          <g fill="none" fill-rule="evenodd" stroke="#000" stroke-width=".639">
              <path d="M1 12V.48h5.253C8.127.453 9.064 1.616 9.064 3.97v4.45"/>
              <path d="M13.544.48V12H8.291c-1.874.027-2.811-1.136-2.811-3.49V4.06"/>
          </g>
        </svg></p>
        </div>

        <div class="form-Stuff">
        <label for="">Name</label>
        <input type="text" name="name" value="<?php echo $_SESSION['userName']; ?>">
        </div>

        <div class="form-Stuff">
        <label for="">Email</label>
        <input type="email" name="email" value="<?php echo $_SESSION['userEmail']; ?>">
        </div>

        <div class="form-Stuff">
        <label for="">Phone</label>
        <input type="tel" name="phone" value="<?php echo $_SESSION['userPhone'];  ?>">
        </div>

        <input type="submit" class="CartButton" value="Make Order" > 
        </form>
   <?php } ?>
      
</div>

      <?php } else { ?>
        <table class="table Cart">
                <thead>
                    <tr>
                        <th class="tHead">Title</th>
                        <th class="tHead timg">Img</th>
                        <th class="tHead">Side</th>
                        <th class="tHead">Changes</th>
                        <th class="tHead">Quantity</th>
                        <th class="tHead">Price</th>
                        <th class="tHead">Remove</th>
                    </tr>
                </thead>

                <tbody>
               
                      
                
                </tbody>
        </table>

          <form id="form1" class="cart-form">

            <div class="form-Stuff">
            <p>Total Price: <span class="form-Price"> 0 </span>  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13">
              <g fill="none" fill-rule="evenodd" stroke="#000" stroke-width=".639">
                  <path d="M1 12V.48h5.253C8.127.453 9.064 1.616 9.064 3.97v4.45"/>
                  <path d="M13.544.48V12H8.291c-1.874.027-2.811-1.136-2.811-3.49V4.06"/>
              </g>
          </svg></p>
            </div>

            <div class="form-Stuff">
            <label for="">Name</label>
            <input type="text" name="name">
            </div>

            <div class="form-Stuff">
            <label for="">Email</label>
            <input type="email" name="email">
            </div>

            <div class="form-Stuff">
            <label for="">Phone</label>
            <input type="tel" name="phone">
            </div>

            <input type="submit" class="CartButton" value="Make Order" > 
          </form>

      <?php  } ?>
<?php get_footer(); ?>