<?php

if(!defined('ABSPATH')) die();

/**
 * Shortcode to render all custom type products
 * Way to use -> [carolinaspa_products]
**/

function carolinaspa_products_shortcode(){
    $args = array(
        'post_per_page' => 10,
        'post_type'     => 'products_post_type',
        'orderby'       => 'name',
        'order'         => 'ASC',
    );
    $products = new WP_Query($args);
    echo '<div class="card-columns w-100">';
    while ($products->have_posts()): $products->the_post();?>
<div class="card">
    <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('product-thumbnail', array('class' => 'card-img-top img-fluid'));?>
    </a>
    <div class="card-body">
        <h3 class="card-title text-center text-uppercase"><?php the_title(); ?></h3>
        <p class="card-text text-uppercase"><?php the_field('descripcion_corta'); ?></p>
        <p class="lead text-center product-pricing mb-0">$<?php the_field('precio'); ?></p>
    </div>
</div>
<?php
endwhile; wp_reset_postdata();
}
add_shortcode( 'carolinaspa_products', 'carolinaspa_products_shortcode' );

/**
 * Shortcode to render the contact-form
 * Way to use -> [carolinaspa_contact_form]
**/

function carolinaspa_contact_form_shortcode(){?>
<form class="p-5 mt-5 contact-form bg-white d-flex flex-column border border-dark needs-validation" novalidate>
    <div class="form-group">
        <label for="nameInput">Nombre:</label>
        <input type="text" class="form-control" id="nameInput" placeholder="Escribe tu nombre" required>
        <div class="invalid-feedback">
            El nombre es obligatorio
        </div>
        <div class="valid-feedback">
            Correcto
        </div>
    </div>
    <div class="form-group">
        <label for="emailInput">Email:</label>
        <input type="email" class="form-control" id="emailInput" placeholder="Escribe tu email" required>
        <div class="invalid-feedback">
            Email inválido
        </div>
        <div class="valid-feedback">
            Correcto
        </div>
    </div>
    <div class="form-group">
        <label for="subjectInput">Asunto:</label>
        <input type="text" class="form-control" id="subjectInput" placeholder="Escribe el asunto del mensaje" required>
        <div class="invalid-feedback">
            El asunto del mensaje es obligatorio
        </div>
        <div class="valid-feedback">
            Correcto
        </div>
    </div>
    <div class="form-group">
        <label for="messageInput">Mensaje:</label>
        <textarea class="form-control" id="messageInput" rows="5" required></textarea>
        <div class="invalid-feedback">
            El mensaje es obligatorio
        </div>
        <div class="valid-feedback">
            Correcto
        </div>
    </div>
    <small id="emailHelp" class="form-text text-muted mb-4">Tus datos están seguros y no compartiremos
        ningún dato proporcionado.</small>
    <input type="submit" class="btn btn-primary text-uppercase" value="Enviar">
</form>
<?php
}
add_shortcode( 'carolinaspa_contact_form', 'carolinaspa_contact_form_shortcode' );