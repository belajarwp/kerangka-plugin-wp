<?php
/**
 * Plugin Name:       Kerangka Plugin WordPress
 * Plugin URI:        https://dankedev.com/kelas/master-plugin-wordpress
 * Description:       Belajar cara membuat plugin WordPress untuk kerangka plugin
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            Hadie Danker
 * Author URI:        https://facebook.com/hadie.danker
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       kerangka-plugin-wp
 * Domain Path:       /languages
 */

 if(!function_exists('kerangka_plugin_wp_setting')){
    function kerangka_plugin_wp_setting(){
        add_options_page( 
            'Skeleton Setting Page', //title page
            'Sekeleton' , // nama pada menu setting
            'manage_options', // capability
            'kerangka-plugin-wp-setting', // slug
            'Kerangka_plugin_wp_setting_page' //callable function yang akan menampilkan halaman setting nya
    );
    }
    add_action( 'admin_menu', 'kerangka_plugin_wp_setting' );
 }

 if(!function_exists('Kerangka_plugin_wp_setting_page')){
     function Kerangka_plugin_wp_setting_page(){
         echo 'Halo saya adalah menu baru';
     }
 }


 /**
  * Membuat Menu sendiri
  */

  if(!function_exists('kerangka_plugin_menu')){
      function kerangka_plugin_menu(){
          add_menu_page( 
              'My Menu Page',
               'Dankedev', 
               'manage_options', 
               'dankedev', 
               'kerangka_plugin_menu_page', 
               'dashicons-translation', 
               1
          );
      }
      add_action( 'admin_menu','kerangka_plugin_menu' );
  }


  /**
   * Function menu page
   * berisikan konten yang akan ditampilkan di halaman menu admin
   */
  if(!function_exists('kerangka_plugin_menu_page')){
      function kerangka_plugin_menu_page(){
          ?>
<div class="wrap">
    <h1>Ini adalah halaman setting ku</h1>
    <p>Halo terimakasih sudah mendownload plugin "Kerangka Plugin WP"</p>
</div>
          <?php

        /**
         * Variable
         */

        $file = __FILE__;
        $dir = __DIR__;
        var_dump($dir);
        $plugin_url = plugins_url('file-javascript.js');
        $plugin_dir_url =plugin_dir_url(__FILE__);
        $plugin_dir_path = plugin_dir_path(__FILE__);
        $plugin_basename = plugin_basename(__DIR__);

        $home_path = get_home_path();
        $home_url = home_url( );
        $all = compact('file','plugin_url','plugin_dir_url','plugin_dir_path','plugin_basename','home_path','home_url');
        var_dump($all);
        var_dump(WP_PLUGIN_DIR);
      }    
  }


  function ganti_login_logo(){
      ?>
<style type="text/css">
body.login #login h1 a{
    background-image:none,url(<?php echo plugin_dir_url(__FILE__);?>logo-dankedev.png);
 
</style>
      <?php
  }



  add_action( 'login_enqueue_scripts','ganti_login_logo',10 );