<?php 
get_header();
if(have_posts()):
    while(have_posts()): the_post(  );
    get_template_part('template-parts/hero');
?>
<div class="container pt-4">
    <div class="row no-gutters">
        <main class="col-lg-8 main-content pr-md-3">
            <h2 class="d-block d-md-none text-uppercase text-center">
                <?php the_title( ); ?>
            </h2>
            <?php the_content(); ?>
        </main>
        <aside class="col-lg-4 py-md-4 py-md-0 text-light align-self-start">
            <div class="sidebar py-5 px-3">
                <h2 class="text-center text-uppercase mt-4 font-weight-bold">Descripción</h2>
                <p class="text-center lead"> <?php the_field('descripcion_corta'); ?></p>
                <h3 class="text-uppercase text-center mt-2 font-weight-bold mt-5">Precio</h3>
                <p class="text-center display-4">$ <?php the_field('precio'); ?></p>
            </div>
        </aside>
    </div>
</div>



<?php endwhile; endif; get_footer();?>