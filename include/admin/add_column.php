<?php
/**
 * Add new "Manufacturer" column to products list
 */
add_filter( 'manage_edit-product_columns', 'add_product_manufacturer' );

function add_product_manufacturer( $columns ) {

	$columns['meta_box_manufacturer'] = 'Manufacturer';
	return $columns;
}

/**
 * Output "Manufacturer" column
 */
 
add_action( 'manage_product_posts_custom_column', 'render_product_column_manufacturer', 2 );

function render_product_column_manufacturer( $column ) {

	if ( 'meta_box_manufacturer' != $column ) {
			return;
		}
	
	$manufacturer = get_post_meta( get_the_ID(), 'meta_box_manufacturer', true );
	echo $manufacturer;
}


add_action('admin_head', 'manufacturer_column_width');

function manufacturer_column_width() {
    echo '<style type="text/css">';
    echo '#meta_box_manufacturer { text-align: center; width:100px !important; overflow:hidden }';
    echo '</style>';
}