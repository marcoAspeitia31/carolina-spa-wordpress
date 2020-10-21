<footer class="site-footer pt-3 mt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3 class="text-uppercase text-center pb-4">Nosotros</h3>
                <p class="text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illum mollitia
                    quae consequatur explicabo adipisci fugiat possimus eligendi id, recusandae, reprehenderit eius
                    beatae quibusdam ut facilis delectus nihil ipsa error aut.</p>
            </div>
            <div class="col-md-4 text-center">
                <h3 class="text-uppercase pb-4">Horario</h3>
                <p>Lunes-Viernes: 9 AM - 7 PM</p>
                <p>Sábado: 10AM - 2PM</p>
                <p>Domingo: Cerrado</p>
            </div>
            <div class="col-md-4 text-center">
                <h3 class="text-uppercase pb-4">Contacto</h3>
                <p>66 East Sunnyslope Avenue</p>
                <p>Lansdowne, PA 19050</p>
                <!-- social-icons menu -->
                <?php
                    $args = array(
                        'container'         => 'nav',
                        'container_class'   => 'social-icons',
                        'link_before'       => '<span class="sr-only">',
                        'link_after'        => '</span>',
                        'theme_location'    => 'social_media',
                    );
                    wp_nav_menu($args);
                ?>
                <!-- social-icons menu end -->
            </div><!-- col-md-4 end -->
            <hr class="w-100">
            <p class="text-center copyright w-100">Carolina Spa & Salon 2020. Derechos Reservados</p>
        </div><!-- row end -->
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>