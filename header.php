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
            <nav class="social-icons">
                <ul class="">
                    <li>
                        <a href="https://facebook.com">
                            <span class="sr-only">Facebook </span>
                        </a>
                    </li>
                    <li><a href="https://instagram.com">
                            <span class="sr-only">Instagram </span>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com">
                            <span class="sr-only">Twitter </span>
                        </a>
                    </li>
                    <li>
                        <a href="https://pinterest.com">
                            <span class="sr-only">Pinterest </span>
                        </a>
                    </li>
                    <li>
                        <a href="https://youtube.com">
                            <span class="sr-only">YouTube </span>
                        </a>
                    </li>
                </ul>
            </nav><!-- social-icons end -->
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
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="nav nav-justified flex-sm-row flex-column w-100">
                        <li class="nav-item <?php echo 'index' === $activePage ? 'active' : '' ?>">
                            <a href="index.php" class="nav-link">Inicio</a>
                        </li>
                        <li class="nav-item <?php echo 'nosotros' === $activePage ? 'active' : '' ?>">
                            <a href="nosotros.php" class="nav-link">Nosotros</a>
                        </li>
                        <li class="nav-item <?php echo 'servicios' === $activePage ? 'active' : '' ?>">
                            <a href="servicios.php" class="nav-link">Servicios</a>
                        </li>
                        <li class="nav-item <?php echo 'productos' === $activePage ? 'active' : '' ?>">
                            <a href="productos.php" class="nav-link">Productos</a>
                        </li>
                        <li class="nav-item <?php echo 'contacto' === $activePage ? 'active' : '' ?>">
                            <a href="contacto.php" class="nav-link">Contacto</a>
                        </li>
                    </ul>
                </div><!-- navbar-collapse end -->
            </div><!-- container end -->
        </nav><!-- navbar end -->
    </div><!-- navigation end -->
</header>

<body>