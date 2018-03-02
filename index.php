<?php
/*
Plugin Name: Woo IK Manufacturer
Plugin URI: http://imran1.com/
Description: Product Manufacturer.
Author: Imran Khan
Version: 1.0
Author URI: http://imran1.com/
*/

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

//Admin Files
require_once ( plugin_dir_path( __FILE__ ) . '/include/admin/post_type.php' );
require_once ( plugin_dir_path( __FILE__ ) . '/include/admin/meta_box.php' );
require_once ( plugin_dir_path( __FILE__ ) . '/include/admin/add_column.php' );

//Frontend Files
require_once ( plugin_dir_path( __FILE__ ) . '/include/product-detail.php' );





function wpse255804_add_page_template ($templates) {
    $templates['archive-manufacturer.php'] = 'Manufacturer';
    return $templates;
    }
add_filter ('theme_page_templates', 'wpse255804_add_page_template');


function wpse255804_redirect_page_template ($template) {
   
  if (is_page_template('archive-manufacturer.php')){
        
      $template = plugin_dir_path( __FILE__ ) . 'templates/manufacturer/archive-manufacturer.php';
      } 
        
       
    return $template;
    }
add_filter ('page_template', 'wpse255804_redirect_page_template');




function get_custom_post_type_template($single_template) {
     global $post;

     if ($post->post_type == 'manufacturer') {
          $single_template = plugin_dir_path( __FILE__ ) . 'templates/manufacturer/single-manufacturer.php';
     }
     return $single_template;
}
add_filter( 'single_template', 'get_custom_post_type_template' );


}