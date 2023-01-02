<?php
$categories = get_the_category();

$category_ids = !empty($categories) ? wp_list_pluck( $categories, 'term_id' ) : [];
$category_name = !empty($categories) ? $categories[array_key_first($categories)]->name : __('More posts', 'codetot-academy');

?>

<article class="entry-single">
    <header class="entry-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center mt-4 mb-2">
                        <h1 class="h1 entry-title"><?php the_title(); ?></h1>
                        <p class="entry-meta"><?php the_category(', '); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="entry-row">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 col-lg-8 entry-main">
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="col-12 mt-3 col-md-2 mt-md-0 col-lg-4 entry-sidebar">
                    <?php get_template_part('templates/widgets/related-posts', null, [
                        'category_ids' => $category_ids,
                        'title' => $category_name
                    ]);
                    
                    if ( is_active_sidebar( 'post-sidebar' ) ) :
                        dynamic_sidebar( 'post-sidebar' );
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</article>