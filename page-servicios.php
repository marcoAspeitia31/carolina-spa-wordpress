<?php
get_header(); 

if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); 
    get_template_part('template-parts/hero');
?>

<div class="container py-4">
    <div class="row">
        <main class="col-lg-8 main-content">
            <h2 class="d-block d-md-none text-uppercase text-center">
                <?php the_title(); ?>
            </h2>
            <?php the_content(); ?>
            <div id="services-accordion">
                <div class="card">
                    <a class="btn btn-link p-0 text-light" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne" role="button">
                        <div class="card-header" id="headingOne">
                            <h3 class="mb-0 text-lg-left"><?php the_field('titulo_servicio_1');?></h3>
                        </div>
                    </a><!-- card heading accordion -->
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#services-accordion">
                        <div class="card-body">
                            <p><?php the_field('descripcion_servicio_1'); ?></p>
                        </div>
                    </div><!-- card body accordion -->
                </div><!-- repeatable card -->
                <div class="card">
                    <a class="btn btn-link p-0 text-light" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo" role="button">
                        <div class="card-header" id="headingTwo">
                            <h3 class="mb-0 text-lg-left"><?php the_field('titulo_servicio_2');?></h3>
                        </div>
                    </a><!-- card heading accordion -->
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                        data-parent="#services-accordion">
                        <div class="card-body">
                            <p><?php the_field('descripcion_servicio_2'); ?></p>
                        </div>
                    </div><!-- card body accordion -->
                </div><!-- repeatable card -->
                <div class="card">
                    <a class="btn btn-link p-0 text-light" data-toggle="collapse" data-target="#collapseThree"
                        aria-expanded="true" aria-controls="collapseThree" role="button">
                        <div class="card-header" id="headingThree">
                            <h3 class="mb-0 text-lg-left"><?php the_field('titulo_servicio_3');?></h3>
                        </div>
                    </a><!-- card heading accordion -->
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                        data-parent="#services-accordion">
                        <div class="card-body">
                            <p><?php the_field('descripcion_servicio_3'); ?></p>
                        </div>
                    </div><!-- card body accordion -->
                </div><!-- repeatable card -->
            </div>
        </main>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php 
// Display post content
get_template_part('template-parts/booking');

endwhile; 
endif;
get_footer();