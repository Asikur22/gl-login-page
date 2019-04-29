<?php
/*
  Plugin Name: GL WP Login
  Plugin URI: https://greenlifeit.com/plugins/
  Description: A simple plugin to change login page logo from Green Life IT.
  Author: Asiqur Rahman
  Author URI: https://asique.net/
  Version: 1.0.0
  Text Domain: gl-wpl
  Licence: GPL2 and Later
 */

//add default setting values on activation   
function gl_lp_add_options() {
    add_option( 'login_page_logo', '' );
    add_option( 'login_page_logo_width', 'auto' );
    add_option( 'login_page_logo_height', 'auto' );
}

register_activation_hook( __FILE__, 'gl_lp_add_options' );

//Remove default setting values on deactivation   
function gl_lp_remove_options() {
    delete_option( 'login_page_logo' );
    delete_option( 'login_page_logo_width' );
    delete_option( 'login_page_logo_height' );
}

register_deactivation_hook( __FILE__, 'gl_lp_remove_options' );

//register settings 
function gl_lp_register_settings() {
    register_setting( 'gl-lp-settings', 'login_page_logo' );
    register_setting( 'gl-lp-settings', 'login_page_logo_width' );
    register_setting( 'gl-lp-settings', 'login_page_logo_height' );
}

function gl_lp_add_menu_item() {
    add_options_page( __( 'Login Page Logo', 'gl-wpl' ), __( 'Login Page Logo', 'gl-wpl' ), 'manage_options', 'gl-lp-options', 'gl_lp_settings_page' );
    add_action( 'admin_init', 'gl_lp_register_settings' );
}

add_action( 'admin_menu', 'gl_lp_add_menu_item' );

function gl_lp_settings_page() {
    require_once 'admin-page.php';
}

function gl_lp__admin_scripts() {
    wp_enqueue_media();
    wp_enqueue_script( 'gl-lp', plugins_url( '/js/gl-login-page.js', __FILE__ ), array( 'jquery' ) );
}

if ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'gl-lp-options' ) {
    add_action( 'admin_enqueue_scripts', 'gl_lp__admin_scripts' );
}

/*
 * Login Page Custom Logo.
 */

function gl_lp_login_logo() {
    if ( !empty( get_option( 'login_page_logo' ) ) ) {
        ?>
        <style type="text/css">
            #login h1 a, .login h1 a {
                background-image: url("<?php echo get_option( 'login_page_logo' ); ?>");
                background-repeat: no-repeat;
                background-position: center;
                background-size: <?php echo get_option( 'login_page_logo_width' ); ?> <?php echo get_option( 'login_page_logo_height' ); ?>;
                width: <?php echo get_option( 'login_page_logo_width' ); ?>;
                height: <?php echo get_option( 'login_page_logo_height' ); ?>;
            }
            .login #backtoblog, .login #nav {
                text-align: center;
            }
        </style>
        <?php
    }
}

add_action( 'login_head', 'gl_lp_login_logo' );

function gl_lp_login_logo_url() {
    return home_url();
}

add_filter( 'login_headerurl', 'gl_lp_login_logo_url' );
