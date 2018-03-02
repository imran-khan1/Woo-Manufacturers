<?php

get_header(); ?>
df
<div id="main-content" class="main-content">

    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
            <table>
            <?php
                // Start the Loop.
                while ( have_posts() ) : the_post();
?>
                     <tr>
                <td><?php  the_post_thumbnail();?></td>
               <td><a href="<?php the_permalink(); ?>">
               <?php the_title(); ?></a></td>
              <td><?php the_content(); ?></td>
              </tr>
<?php
                endwhile;
            ?>
            </table>
        </div><!-- #content -->
    </div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_sidebar();
get_footer();