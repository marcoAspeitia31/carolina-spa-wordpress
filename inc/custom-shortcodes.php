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