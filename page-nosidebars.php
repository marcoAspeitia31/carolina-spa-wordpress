<?php
/**
 * Template Name: No Sidebars
 * 
 */

get_header(); 

if ( have_posts() ) : 
    while ( have_posts() ) : the_post();
    get_template_part('template-parts/hero');
?>

<div class="container <?php echo is_page('productos') ? "products": ""; ?> pt-4">
    <div class="row">
        <main class="col-lg-12 main-content">
            <h2 class="d-block d-md-none text-uppercase text-center">
                <?php the_title(); ?>
            </h2>
            <?php the_content(); ?>
        </main>
    </div>
</div>
<?php 
// Display post content
endwhile; 
endif;

get_footer();