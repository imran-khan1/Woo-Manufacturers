 <?php
/*
Template Name: Manufacturer

*/
?>
<?php get_header(); ?>
<section id="primary">
<div id="content" role="main" style="width: 100%">
<?php 
 $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
			'post_type' => 'manufacturer',
			'posts_per_page' => 10,
			'paged'          => $paged,
			);
			
	$loop = new WP_Query( $args );
	

    if ( $loop->have_posts() ) {
?>
          <header class="page-header">
          <h1 class="page-title">Manufacturers</h1>
         </header>
         
         <table>
        
        <!-- Start the Loop -->
        <?php 
        
             while ( $loop->have_posts() ) : $loop->the_post(); ?>
                 <!-- Display review title and author -->
                <tr>
                <td><?php  the_post_thumbnail();?></td>
               <td><a href="<?php the_permalink(); ?>">
               <?php the_title(); ?></a></td>
              <td><?php the_content(); ?></td>
              </tr>
         <?php endwhile; 
         }
           ?>
		 
<!-- Display page navigation -->
		 
</table>

<?php 
            $total_pages = $loop->max_num_pages;

            if ($total_pages > 1){

                $current_page = max(1, get_query_var('paged'));

                echo paginate_links(array(
                    'base' => get_pagenum_link(1) . '%_%',
                    'format' => '/page/%#%',
                    'current' => $current_page,
                    'total' => $total_pages,
                    'prev_text'    => __('« prev'),
                    'next_text'    => __('next »'),
                ));
            }
            ?> 
  </div>
</section>
<?php get_footer(); ?>