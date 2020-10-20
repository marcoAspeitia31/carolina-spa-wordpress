<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags Requeridos -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <?php wp_head(); ?>
</head>
<header class="container-fluid website-header">
    <div class="row justify-content-md-between align-items-center">
        <div class="col-lg-4">
            <a href="<?php echo esc_url(home_url('/')) ;?>">
                <img src="<?php echo get_template_directory_uri();?>/img/logo.svg" alt="carolina spa"
                    class="img-fluid mx-auto d-block py-4">
            </a>
        </div>
        <div class="col-lg-4 text-center text-lg-right">
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
            <!-- social-icons end -->
        </div><!-- col-lg-4 social icons -->
    </div><!-- top bar end -->
    <div class="navigation mt-3 py-2">
        <nav class="main-nav navbar navbar-expand-lg navbar-light bg-faded">
            <!-- responsive menu -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand text-light d-lg-none" href="#">Carolina SPA</a>
            <div class="container">
                <?php
                    $args = array(
                        'menu_class'        => 'nav nav-justified flex-sm-row flex-column w-100',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'navbarNav',
                        'theme_location'    => 'primary',
                    );
                    wp_nav_menu($args);
                ?>
            </div><!-- container end -->
        </nav><!-- navbar end -->
    </div><!-- navigation end -->
</header>

<body>