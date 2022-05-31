<?php
/*
   Plugin Name: CustomForm
   description: Custom Form Plugin
   Version: 1.0.0
   Author: Abdelah
*/


function plugin_table(){

  global $wpdb;
  $charset_collate = $wpdb->get_charset_collate();

  $tablename = $wpdb->prefix."plugin";

  $sql = "CREATE TABLE $tablename (
  id mediumint(11) NOT NULL AUTO_INCREMENT,
  email varchar(80) NOT NULL,
  subject varchar(180) NOT NULL,
  message varchar(280) NOT NULL,
  PRIMARY KEY  (id)
  ) $charset_collate;";

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );

}

//creating Plugin
register_activation_hook( __FILE__, 'plugin_table' );

//creation de la table en data base
function deleteTable() {
  global $wpdb;
  $table_name = $wpdb->prefix."plugin";
  $sql = "DROP TABLE IF EXISTS $table_name";
  $wpdb->query($sql);
  delete_option("devnote_plugin_db_version");
}
register_deactivation_hook( __FILE__, 'deleteTable' );

function plugin_menu() {

    add_menu_page("Plugin", "Brief 10Form","MyPlugin","manage_options", "./icons/Circle-icons-contacts.svg.png");
    add_submenu_page("manage_options","Messages", "Messages",4, "Messages", "getMessages");
    add_submenu_page("manage_options","Message", "Message",4, "Message", "addMessage");
    add_submenu_page("manage_options","settings", "settings",4, "settings", "settings");
}

add_action("admin_menu", "plugin_menu");

function MessagesList(){
  include "Messages.php";
}
function getMessages() {
  include "getMessages.php";
}

function addMessage(){
  include "addMessage.php";
}
function settings(){
  include "settings.php";
}

add_shortcode('contact','addMessage');