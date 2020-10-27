<?php get_header(); 
    $args = array(
        'post_type'         => 'slider_post_type',
        'posts_per_page'    => 3,
        'orderby' => 'date',
        'order'   => 'DESC',
    );
    $slider = new WP_Query($args);
    if ( $slider -> have_posts() ) :
?>

<!-- Banner -->
<div class="container banner">
    <div class="carousel slide carousel-fade mt-4" id="main-slider" data-ride="carousel">
        <!-- Carousel pagination -->
        <ol class="carousel-indicators">
            <?php for($i = 0; $i < $slider->post_count; $i++): ?>
            <li data-target="#main-slider" data-slide-to="<?php echo $i; ?>"
                class="<?php echo $i == 0 ? 'active' : '' ?>"></li>
            <?php endfor; $counter = 0;?>
        </ol>
        <div class="carousel-inner" role="listbox">
            <?php while($slider->have_posts()): $slider->the_post(); ?>
            <div class="carousel-item <?php echo $counter == 0 ? 'active' : '' ?>">
                <?php the_post_thumbnail('hero', array(
                    'class' => 'img-fluid d-block',
                )); ?>
                <div class="carousel-caption">
                    <h3 class="text-uppercase"><?php the_content(); ?></h3>
                </div>
            </div><!-- repeatable carousel-item -->
            <?php echo $counter; $counter++; endwhile; ?>
        </div><!-- carousel-inner -->
        <!-- carousel prev&next arrows -->
        <a href="#main-slider" class="carousel-control-prev" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a href="#main-slider" class="carousel-control-next" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div><!-- carousel end -->
</div><!-- banner container end -->
<!-- Slogan -->

<?php
else: 
    _e( 'Favor de agregar Slides al banner', 'carolina-spa' ); 
endif; 
get_footer();