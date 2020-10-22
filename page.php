<?php

get_header(); 

if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); 
?>
<!-- Hero -->
<div class="container pt-4">
    <div class="row no-gutters">
        <div class="col-12 hero">
            <?php the_post_thumbnail('full', array('class' => 'img-fluid'))?>
            <h2 class="d-none d-md-block text-uppercase py-3 px-5 text-light">
                <?php the_title(); ?>
            </h2>
        </div>
    </div>
</div><!-- Hero end -->

<div class="container pt-4">
    <div class="row">
        <main class="col-lg-8 main-content">
            <h2 class="d-block d-md-none text-uppercase text-center">
                <?php the_title(); ?>
            </h2>
            <?php the_content(); ?>
            <h2 class="text-center text-uppercase italic-letter mb-4">
                <span class="text-lowercase d-block">
                    Conoce nuestras
                </span>
                instalaciones
            </h2>
            <?php
                if(is_page('nosotros')):
                    get_template_part('template-parts/gallery');
                endif;
            ?>
        </main>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php 
// Display post content
endwhile; 
endif;
get_footer();