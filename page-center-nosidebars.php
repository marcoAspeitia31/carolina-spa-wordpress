<?php
/**
 * Template Name: No Sidebars / Centered
 * 
 */

get_header(); 

if ( have_posts() ) : 
    while ( have_posts() ) : the_post();
    get_template_part('template-parts/hero');
?>

<div class="container <?php echo is_page('productos') ? "productos": ""; ?> pt-4">
    <div class="row justify-content-center">
        <main class="col-lg-10 main-content">
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