<?php get_header(); 
    $args = array(
        'post_type'         => 'slider_post_type',
        'posts_per_page'    => 3,
        'orderby'           => 'date',
        'order'             => 'DESC',
    );
    $slider = new WP_Query($args);
    if ( $slider -> have_posts() ) :
        $test = $slider -> have_posts();
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
                <?php
                    if(has_post_thumbnail()){
                        the_post_thumbnail('hero', array(
                            'class' => 'img-fluid d-block',
                        ));
                    }else{
                        ?><img src="<?php echo get_template_directory_uri();?>/img/slide_01.jpg" alt="Carolina Spa"><?php
                    }
                ?>
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

<?php
else: 
    _e( 'Favor de agregar Slides al banner', 'carolina-spa' ); 
endif; 
?>
<!-- Slogan -->
<section class="welcome-frase py-5 mt-4">
    <h2 class="text-center text-capitalize italic-letter">
        <span class="text-lowercase d-block">
            Bienvenido a nuestro
        </span>
        Sitio web
    </h2>
    <p class="text-center mt-4"><?php echo get_bloginfo('description'); ?></p>
</section>
<!-- Slogan end -->

<!-- Services -->
<div class="container">
    <div class="row justify-content-center">
        <?php
            /* WP CUSTOM QUERYS
            ** more information in: https://developer.wordpress.org/reference/classes/wp_query/
            */
            $args = array(
            'post_type'     => 'page',
            'post_name__in' => array('nosotros', 'productos', 'servicios'),
            'orderby'       => 'name',
            'order'         => 'ASC',
            );
            $services = new WP_Query($args);
            if($services -> have_posts()):
                while($services -> have_posts()) : $services -> the_post();
        ?>
        <div class="col-md-6 col-lg-4 text-center mb-4">
            <div class="service">
                <?php 
                echo wp_get_attachment_image(get_field('imagen_principal'), 'portrait', false, ["class" => "img-fluid"]);
                ?>
                <div class="row justify-content-center no-gutters">
                    <div class="col-md-10 service-info">
                        <?php
                        /**
                         * in this process the function explode() will break a string into an array.
                         * and the function sizeof() will bring us the lenght of that array
                         * for more information please visit:
                         * https://www.w3schools.com/php/func_string_explode.asp
                         * https://www.w3schools.com/php/func_array_sizeof.asp
                         **/
                            $mainText = get_field('texto_principal');
                            $textArray = explode(" ", $mainText);
                        ?>
                        <h3 class="text-uppercase text-center py-4 italic-letter">
                            <span class="text-lowercase d-block">
                                <?php for($i=0; $i < sizeof($textArray)-1; $i++): echo $textArray[$i] . ' '; endfor;?>
                            </span><?php echo end($textArray);?>
                        </h3>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-block text-uppercase py-3">Leer
                            más</a>
                    </div>
                </div>
            </div><!-- service-image end -->
        </div><!-- repeatable col-md-4 -->
        <?php
            endwhile;
            else: 
                _e( 'Favor de verificar tener las páginas Nosotros, Servicios y Productos', 'carolina-spa' ); 
            endif; 
        ?>
    </div><!-- row end -->
</div>
<!-- Services end -->

<!-- Schedules -->
<div class="schedules my-5 text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php
                    $query = new WP_Query( array( 'pagename' => 'nosotros' ) );
                    if($query -> have_posts()):
                        while($query -> have_posts()): $query -> the_post();
                            dynamic_sidebar( 'carolinaspa-sidebar-widget-1' );
                        endwhile;
                    endif;
                    wp_reset_postdata();
                ?>
            </div>
            <div class="col-md-6 schedules-image pb-5 p-md-0">
                <?php 
                    echo wp_get_attachment_image(get_field('imagen_horario'), 'full', false, ["class" => "img-fluid"]);
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Schedules end -->

<!-- Products -->
<section class="container pb-5 products">
    <h2 class="text-center italic-letter text-uppercase mt-4">
        <span class="text-lowercase d-block">nuestros</span>productos
    </h2>
    <div class="row py-5">
        <div class="col-md-12 mb-4 products-on-front">
            <?php echo do_shortcode('[carolinaspa_products number=4]') ?>
        </div><!-- repeatable card group -->
    </div><!-- main row end -->
</section><!-- Products end -->
<?php
get_footer();