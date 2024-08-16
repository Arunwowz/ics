<?php 
/*
Plugin Name: DWL Preloader
Plugin URI: http://theforu.byethost7.com/
Description: DWL Preloader is an excellent preloader that looks awesome. 
Author: Dream Web Lab
Version: 2.0
Author URI: http://gaziyeasin.com
 Text Domain: dwlpreloader
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class dwlPreloader{
    public function __construct(){
        add_action ('wp_enqueue_scripts', array($this,'dwl_preloader_markup'));
        add_action ('wp_footer', array($this,'dwl_preloader_activation'));
        add_action('init', array($this,'dwl_preloader_latest_jquery'));
        add_action( 'wp_enqueue_scripts', array($this,'dwl_preloader_plugin_styles') );
        add_action('admin_menu',array($this,'dwl_preloader_create_admin_page'));
    }
    public function dwl_preloader_create_admin_page(){
        $page_title = __("DWL Preloader Settings","dwlpreloader");
        $menu_title = __("DWL Preloader","dwlpreloader");
        $capability = 'manage_options';
        $slug = 'dwl-preloader-option';
        $callback = array($this,'dwl_option_page_content');
        //add_menu_page($page_title,$menu_title,$capability,$slug,$callback,'dashicons-image-rotate'); //coming in next version
    }
    public function dwl_option_page_content(){
        require_once plugin_dir_path(__FILE__).'/admin/admin.php';
    }
    public function dwl_preloader_latest_jquery() {
        wp_enqueue_script('jquery');
    }
    public function dwl_preloader_plugin_styles() {
        wp_register_style( 'preloader-plugin-style', plugins_url('css/style.css', __FILE__) );
        wp_enqueue_style( 'preloader-plugin-style' );
    }
    function dwl_preloader_markup() {
        ?>
        <div id="loader-wrapper">
            <div id="loader"></div>
        </div>
        <?php
    }
    //PRELOADER ACTIVATION
    function dwl_preloader_activation() {
        ?>
            <script>
                jQuery(window).load(function() {
                    jQuery("#loader").delay(300).fadeOut("slow");
                    jQuery("#loader-wrapper").delay(1200).fadeOut("slow");
                });
            </script>
        <?php
    }

}

new dwlPreloader();