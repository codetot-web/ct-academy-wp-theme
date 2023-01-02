<?php
/**
 * Functions
 */

define( 'CT_AC_THEME_DIR', get_template_directory() );
define( 'CT_AC_THEME_URI', get_template_directory_uri() );
define( 'CT_AC_THEME_VERSION', wp_get_theme()->Get('version') );

add_action('after_setup_theme', 'ct_ac_theme_supports');
function ct_ac_theme_supports()
{
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
}

add_action('wp_enqueue_scripts', 'ct_ac_enqueue_frontend_assets');

function ct_ac_enqueue_frontend_assets()
{
    $template_dir = CT_AC_THEME_DIR;
    $template_url = CT_AC_THEME_URI;
    $theme_version = CT_AC_THEME_VERSION;

    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', [], '5.0.2');

    /**
     * Enqueue static assets css variables with inline style
     */
    $css_variables_file = $template_dir . '/static-assets/variables.css';
    $css_variables_handle = 'codetot-academy-css-variables';
    if ( file_exists( $css_variables_file ) ) {
        require_once ABSPATH . 'wp-admin/includes/file.php';
        WP_Filesystem();
        global $wp_filesystem;

        $css_variables_data = $wp_filesystem->get_contents( $css_variables_file );

        if ( !empty($css_variables_data) ) {
            wp_register_style($css_variables_handle, false);
            wp_enqueue_style($css_variables_handle, false);
            wp_add_inline_style($css_variables_handle, $css_variables_data);
        }
    }


    /**
     * Enqueue only single template's css
     */
    if ( is_singular() ) :
        wp_enqueue_style('codetot-academy-single-css', $template_url .'/static-assets/single.css', ['bootstrap-css'], $theme_version);
    endif;

    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', [], '5.0.2', true);
}

/**
 * Register sidebars
 */
function ct_ac_register_sidebars()
{
    register_sidebar(array(
        'name'          => __('Single Post Sidebar', 'codetot-academy'),
        'id'            => 'post-sidebar',
        'description'   => __('Widgets in this area will be shown on all posts.', 'textdomain'),
        'before_widget' => '<div id="%1$s" class="widget widget--post %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<p class="fw-bold text-uppercase h6 widget__title">',
        'after_title'   => '</p>',
    ));

    register_sidebar(array(
        'name'          => __('Page Sidebar', 'codetot-academy'),
        'id'            => 'page-sidebar',
        'description'   => __('Widgets in this area will be shown on all posts.', 'textdomain'),
        'before_widget' => '<div id="%1$s" class="widget widget--page %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<p class="fw-bold text-uppercase h6 widget__title">',
        'after_title'   => '</p>',
    ));
}
add_action('widgets_init', 'ct_ac_register_sidebars');
