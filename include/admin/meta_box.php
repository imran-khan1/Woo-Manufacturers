<?php

add_action( 'add_meta_boxes', 'manufacturer_meta_box_add' );
function manufacturer_meta_box_add()
{
    add_meta_box( 'manufacturer-meta-box-id', 'All Manufacturers', 'meta_box_manufacturer', 'product', 'side', 'high' );
}

function meta_box_manufacturer( $post )
{
    // $post is already set, and contains an object: the WordPress post
    global $post;
    $values = get_post_custom( $post->ID );
	//print_r( $values['meta_box_manufacturer']);exit;
    $selected = isset( $values['meta_box_manufacturer'] ) ?  $values['meta_box_manufacturer']: '';
     
    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'meta_box_nonce', 'meta_box_nonce' );
	
	/* manufacturer */
	$manufacturer_array = array( "" => __('Select manufacturer','framework') );
	$manufacturer_posts = get_posts( array( 'post_type' => 'manufacturer', 'posts_per_page' => -1, 'suppress_filters' => 0 ) );
	
	if(!empty($manufacturer_posts)){
		foreach( $manufacturer_posts as $manufacturer_post ){
			$manufacturer_array[$manufacturer_post->post_title] =$manufacturer_post->post_title;
		}
	}
    ?>
    <p>
        <label for="meta_box_manufacturer"><strong>manufacturer: </strong></label></p>
        <select name="meta_box_manufacturer" id="meta_box_manufacturer" class="required" required title="Please Select manufacturer">
            <?php foreach($manufacturer_array as $key=>$val){?>
            <option value="<?php echo $key;?>" <?php selected( $selected[0], $key ); ?>><?php echo $val;?></option>
            <?php }?>
        </select>
    
    <?php   
}

add_action( 'save_post', 'meta_box_save' );
function meta_box_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    //if( !current_user_can( 'edit_post' ) ) return;
	
	// now we can actually save the data
    $allowed = array(
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );
    // Make sure your data is set before trying to save it
     if( isset( $_POST['meta_box_manufacturer'] ) )
        update_post_meta( $post_id, 'meta_box_manufacturer',  $_POST['meta_box_manufacturer'] );
}
?>