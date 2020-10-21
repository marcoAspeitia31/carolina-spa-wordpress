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
            <div class="row justify-content-center">
                <?php 
                    /** Consulting Gallery Custom Field
                     * 
                     * get_field() is a custom function of ACF
                     * for more information please visit -> https://www.advancedcustomfields.com/resources/get_field/
                     * 
                     * preg_match() is a PHP function that returns whether a match was found in a string.
                     * for more info please visit -> https://www.w3schools.com/php/func_regex_preg_match.asp
                     * 
                     * explode() Break a string into an array
                     * more info, please visit -> https://www.w3schools.com/php/func_string_explode.asp
                     * 
                     **/
                    $gallery = get_field('galeria', $post, false);
                    preg_match('/\[gallery.*ids=.(.*).\]/',$gallery,$ids);
                    $imagesIds = explode(",", $ids[1]);

                    foreach($imagesIds as $singleImageId):
                ?>
                <div class="col-md-6 col-lg-4 mb-3">
                    <a href="#" data-target="#image-<?php echo $singleImageId?>" data-toggle="modal">
                        <!-- wp_get_attachment_image() get an HTML img element representing an image attachment
                         For more information please visit -> https://developer.wordpress.org/reference/functions/wp_get_attachment_image/
                        -->
                        <?php echo wp_get_attachment_image($singleImageId, 'medium', false, ['class' => 'img-fluid', 'srcset' => ' ']); ?>
                    </a>
                </div>
                <div class="modal fade" id="image-<?php echo $singleImageId?>" tabindex="-1" role="dialog"
                    aria-labelledby="Imagen <?php echo $singleImageId?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <?php echo wp_get_attachment_image($singleImageId, 'full', false, ["class" => "img-fluid"]); ?>
                            </div>
                        </div><!-- modal-content end -->
                    </div><!-- modal-dialog end -->
                </div><!-- repeatable modal -->
                <?php endforeach; ?>
            </div><!-- gallery end -->
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