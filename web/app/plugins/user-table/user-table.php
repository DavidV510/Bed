<?php
 /*
        Plugin Name: User Field to add
        Plugin URI: 
        Description: Adds a phone and table to user
        Version: 1.0
        Author: David
        Text Domain: table
    */


add_action( 'personal_options_update', 'save_extra_user_profile_fields_mbz' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields_mbz' );

function save_extra_user_profile_fields_mbz( $user_id ) {
    if(!current_user_can( 'edit_user', $user_id ) ) { 
        return false; 
    }
    update_user_meta($user_id, 'phone', $_POST["phone"]);
    update_user_meta($user_id, 'Item List', $_POST["item_list"]);
}




function new_modify_user_table_mbz( $column ) {
    $column['phone'] = 'Phone';
    $column['item_list'] = 'Item List';
    return $column;
}
add_filter( 'manage_users_columns', 'new_modify_user_table_mbz' );


function table_create($array){ ?>
<td class="wisper">
     <table class="wp-list-table">
                <thead>
                  <tr>
                  <th>Title</th>
                  <th>Side</th>
                  <th>Change</th>
                  <th>Quantity</th>
                  <th>Total Cost</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($array as $item): ?>
                <tr>
                
                    <td>
                    <?php echo $item->title;?>
                    </td>
                    
                    <td>
                    <?php echo $item->side;?>
                    </td>

                    <td>
                    <?php echo $item->change;?>
                    </td>

                    <td>
                    <?php echo $item->change;?>
                    </td>

                    <td>
                    <?php echo $item->quantity; ?>
                    </td>

                    <td>
                    <?php echo $item->total; ?>
                    </td>
                
                    </tr>
                    <?php  endforeach; ?>
                </tbody>
              </table>
    </td>
<?php } function new_modify_user_table_row_mbz( $val, $column_name, $user_id ) {
    $meta = get_user_meta($user_id);

    switch ($column_name) {
        case 'phone' :
            if(isset($meta['phone'])){
                $phone = $meta['phone'][0];
                return $phone;
            }else{
                return '';
            }
            
        break;
        case 'item_list':
            if(isset($meta['Item List'])){
                $item_list = $meta['Item List'][0];
                $beforeJson_User=stripslashes($item_list);
                $beforeJson_User=str_replace('}{','},{',$beforeJson_User);
                $beforeJson_User='['.$beforeJson_User.']';
                $theJson_User=json_decode($beforeJson_User);
                
                return table_create($theJson_User) ;
        
            }else{
                return '';
            }
        default:
    }
    return $val;
}
add_filter( 'manage_users_custom_column', 'new_modify_user_table_row_mbz', 30, 30 );
