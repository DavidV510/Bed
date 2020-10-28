<?php 


function epicureOrders_database(){
    global $wpdb;
    global $epicure_wp;

    $epicure_wp="1.0";
    $table = $wpdb->prefix . 'orders';
    $table_users = $wpdb->prefix . 'users_epicure';
    $table_order_users=$wpdb->prefix. 'order_users';
    $charset_collate = $wpdb->get_charset_collate();
    
    // SQL Statement
    
    $sql = "CREATE TABLE $table ( 
            id mediumint(9) NOT NULL AUTO_INCREMENT, 
            name varchar(50) NOT NULL,
            date datetime NOT NULL,
            email varchar(50) DEFAULT '' NOT NULL,
            phone varchar(10) NOT NULL,
            ItemList varchar(23767),
            totalPrice int NOT NULL,
            PRIMARY KEY (id)
    ) $charset_collate; 
    
    CREATE TABLE $table_order_users ( 
            id mediumint(9) NOT NULL AUTO_INCREMENT, 
            name varchar(50) NOT NULL,
            date datetime NOT NULL,
            email varchar(50) DEFAULT '' NOT NULL,
            phone varchar(10) NOT NULL,
            ItemList varchar(23767),
            totalPrice int NOT NULL,
            PRIMARY KEY (id)
    ) $charset_collate; 


    CREATE TABLE $table_users ( 
           id mediumint(9) NOT NULL AUTO_INCREMENT,
           name varchar(50) NOT NULL,
           phone varchar(10) NOT NULL,
           email varchar(50) DEFAULT '' NOT NULL,
           password varchar(23767) NOT NULL,
           ItemList varchar(23767),
           PRIMARY KEY (id)
    ) $charset_collate;    ";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
};

add_action('after_setup_theme','epicureOrders_database');


// function epicureUsers_database(){
//     global $wpdb;
//     global $epicure_wp;

//     $epicure_wp='1.0';
//     $table=$wpdb->prefix . 'users_epicure';

//     $charset_collate = $wpdb->get_charset_collate();

//     $sql="CREATE TABLE $table(
//            id mediumint(9) NOT NULL AUTO_INCREMENT,
//            name varchar(50) NOT NULL,
//            phone varchar(10) NOT NULL,
//            email varchar(50) DEFAULT '' NOT NULL,
//            password varchar(50) NOT NULL,
//            ItemList varchar(23767),
//            PRIMARY KEY (id)
//         ) $charset_collate;";
    
//     require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
//     dbDelta($sql);
// };

//add_action('init','epicureUsers_database');

?>