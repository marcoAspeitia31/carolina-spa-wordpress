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
        <!-- SIDEBAR SCHEDULES-->
        <aside class="col-lg-4 pt-4 pt-lg-0 text-light align-self-start">
            <div class="sidebar schedules">
                <h2 class="text-center text-uppercase font-weight-bold mt-5">horarios</h2>
                <p class="text-center lead mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum,
                    dolorum
                    voluptates quis alias quidem explicabo ipsum quia temporibus accusantium autem saepe, pariatur
                    beatae vitae iure rem corrupti suscipit laborum et!</p>
                <table class="table table-hover text-center mt-3 mb-5 text-light">
                    <thead>
                        <tr>
                            <th class="text-center">Día</th>
                            <th class="text-center">De</th>
                            <th class="text-center">Hasta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Lunes</td>
                            <td>09:00</td>
                            <td>19:00</td>
                        </tr>
                        <tr>
                            <td>Martes</td>
                            <td>09:00</td>
                            <td>19:00</td>
                        </tr>
                        <tr>
                            <td>Miércoles</td>
                            <td>09:00</td>
                            <td>19:00</td>
                        </tr>
                        <tr>
                            <td>Jueves</td>
                            <td>09:00</td>
                            <td>19:00</td>
                        </tr>
                        <tr>
                            <td>Viernes</td>
                            <td>09:00</td>
                            <td>19:00</td>
                        </tr>
                        <tr>
                            <td>Sábado</td>
                            <td>09:00</td>
                            <td>19:00</td>
                        </tr>
                        <tr>
                            <td>Domingo</td>
                            <td>09:00</td>
                            <td>19:00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </aside>
        <!-- SIDEBAR SCHEDULES END -->
    </div>
</div>
<?php 
// Display post content
endwhile; 
endif;
get_footer();