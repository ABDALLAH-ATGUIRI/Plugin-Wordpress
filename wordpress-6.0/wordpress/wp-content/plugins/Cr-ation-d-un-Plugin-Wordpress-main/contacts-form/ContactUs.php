<?php

/*  
    Plugin Name: Contact Us
    Author: Otmane
    Version: 0.1
    Description: Contact form
    Author URI :https://github.com/moubtahij15
*/

# Define absolute path to avoid direct access
    if(!defined('ABSPATH'))
    {
        define('ABSPATH', dirname(__FILE__) . '/');
    }

    ob_start();

# Include database file
include_once("DataBaseFile.php");

# register hook
register_deactivation_hook(__FILE__, "DB_tb_delete");

register_activation_hook(__FILE__, "DB_tb_create");

// register_uninstall_hook(__FILE__, "DB_tb_delete");

add_action('admin_menu', 'showContactUsMenu');

function showContactUsMenu()
{
    add_menu_page(
        'Contact Us Plugin', # Page title
        'Contact Us Plugin', # Menu title
        'manage_options', # Capability
        'Contact Us Plugin', # Menu slug
        'adminFrontPage', # Function
    );
}

function adminFrontPage()
{
    include_once("ContactUsMessages.php");
}

# Add Custom page function
function addFrontPage($atts)
{
    # Include Instertion code
    include("ContactUsInsertFile.php");
    insertMessages($atts);
}

add_shortcode('ashContactUs','addFrontPage');
