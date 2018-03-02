<?php

if( !function_exists( 'manufacturer_post_type' ) ){

    function manufacturer_post_type(){



      $labels = array(

        'name' => __( 'manufacturer'),

        'singular_name' => __( 'manufacturer' ),

		/*'menu_name'           => __( 'All Manufactuers'),*/

		'all_items'           => __( 'Manufacturer'),

        'add_new' => __('Add New'),

        'add_new_item' => __('Add New manufacturer'),

        'edit_item' => __('Edit manufacturer'),

        'new_item' => __('New manufacturer'),

        'view_item' => __('View manufacturer'),

        'search_items' => __('Search Manufacturer'),

        'not_found' =>  __('No manufacturer found'),

        'not_found_in_trash' => __('No manufacturer found in Trash'),

        'parent_item_colon' => ''

      );



      $args = array(

        'labels' => $labels,

        'public' => true,

        'publicly_queryable' => true,

        'show_ui' => true,

		'show_in_menu' => 'edit.php?post_type=product', // Comment it if you want to show alone CPT

        'query_var' => true,

        'capability_type' => 'post',

        'hierarchical' => false,

        //'menu_position' => 1,
		'has_archive'         => false,

        'exclude_from_search' => true,

        'supports' => array('title','thumbnail','editor'),

        'rewrite' => array( 'slug' => __('manufacturer', 'framework') ),

		'menu_icon' => admin_url() . 'images/media-button-video.gif',

      );



      register_post_type('Manufacturer',$args);

    }

}

add_action('init', 'manufacturer_post_type');
?>