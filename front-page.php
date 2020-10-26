<?php

get_header(); 

if ( have_posts() ) : 
    while ( have_posts() ) : the_post();
?>


<?php 
// Display post content
endwhile; 
endif;
get_footer();