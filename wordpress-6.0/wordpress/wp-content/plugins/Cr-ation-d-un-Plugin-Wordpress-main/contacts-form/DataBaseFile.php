<?php

function DB_tb_create()
{
    global $wpdb;

    # table's name
    $tb_name = $wpdb->prefix ."wordpress-plugin";

    # Create table
    $query = "CREATE TABLE $tb_name(
        id int(10) NOT NULL AUTO_INCREMENT,
        name varchar (100) DEFAULT '',
        email varchar (100) DEFAULT '',
        object varchar (100) DEFAULT '',
        message text (600) DEFAULT '',

        PRIMARY KEY (id)
    ) ";


    #
    require_once (ABSPATH ."wp-admin/includes/upgrade.php");
    dbDelta($query);
}

function DB_tb_delete()
{
    
  
     global $wpdb;

    # table's name
    // wp_ash_contact_us
    $tb_name = $wpdb->prefix ."wordpress-plugin";
    $sql = "DROP TABLE IF EXISTS wp_ash_contact_us";
    $wpdb->query($sql);

    delete_option("my_plugin_db_version");

}