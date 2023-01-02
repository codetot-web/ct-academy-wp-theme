<?php
/**
 * Main Template
 */
get_header();

if ( have_posts() ) :

    while ( have_posts() ) : the_post();

        if ( is_archive() ) :

            get_template_part('templates/content/archive-header');

        endif;

        get_template_part('templates/content/single-loop');

    endwhile;

endif;

get_footer();