<?php
/**
 * Single: Related posts
 */

$data = wp_parse_args($args, [
    'category_ids' => [],
    'title' => __('More posts', 'codetot-academy')
]);

global $post;

$current_post_type = $post->post_type;

$related_posts_query = new WP_Query([
    'post_type' => $current_post_type,
    // 'post__not_in' => [$post->ID],
    'posts_per_page' => 5,
    'post_status' => 'publish',
    'update_post_term_cache' => false,
    'update_post_meta_cache' => false
]);

if ($related_posts_query->have_posts()) :
    $items = [];

    foreach ($related_posts_query->posts as $related_post_row) :
        $items[] = [
            'url' => get_permalink( $related_post_row ),
            'title' => $related_post_row->post_title
        ];
    endforeach;

    ?>
    <div class="widget widget--related-posts">
        <p class="fw-bold text-uppercase h6 widget__title"><?php echo esc_html( $data['title'] ); ?></p>
        <div class="widget__content">
            <?php
            get_template_part('templates/blocks/list', null, [
                'class' => 'single-related-posts widget widget--single',
                'items' => $items
            ]);
            ?>
        </div>
    </div>
    <?php

endif;