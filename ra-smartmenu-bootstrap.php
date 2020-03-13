<?php
/*
Plugin Name: SmartMenus for Bootstrap
Plugin URI:  https://github.com/webdevsuperfast/ra-smartmenu-bootstrap
Description: Multi-level dropdown menus using SmartMenus Bootstrap Addon 
Version:     1.0
Author:      Rotsen Mark Acob
Author URI:  https://webdevsuperfast.github.io/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: ra-widgets-animate
Domain Path: /languages
*/

defined( 'ABSPATH' ) or die( esc_html_e( 'You do not have an access to this realm, return to your own world.', 'ra-smartmenu-bootstrap' ) );

class RA_Smartmenu_Bootstrap {
  public function __construct() {
    add_action( 'wp_enqueue_scripts', array( &$this, 'rasb_enqueue_scripts' ) );
  }

  public function rasb_enqueue_scripts() {
    $plugin_version = '1.0';

    if ( !is_admin() ) {
      // Enqueue SmartMenus Bootstrap Addon CSS
      wp_enqueue_style( 'rasb-smartmenu-css', plugin_dir_url( __FILE__ ) . 'public/css/jquery.smartmenus.bootstrap-4.css' );

      // Register and enqueue SmartMenus main JS file
      wp_register_script( 'rasb-smartmenu-js', plugin_dir_url( __FILE__ ) . 'public/js/jquery.smartmenus.min.js', array( 'jquery' ), $plugin_version, true );
      wp_enqueue_script( 'rasb-smartmenu-js' );

      // Register and enqueue SmartMenus Bootstrap Addon JS file
      wp_register_script( 'rasb-smartmenu-bootstrap-js', plugin_dir_url( __FILE__ ) . 'public/js/jquery.smartmenus.bootstrap-4.min.js', array( 'jquery', 'rasb-smartmenu-js' ), $plugin_version, true );
      wp_enqueue_script( 'rasb-smartmenu-bootstrap-js' );
    }
  }
}

new RA_Smartmenu_Bootstrap();