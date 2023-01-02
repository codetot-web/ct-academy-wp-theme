<?php
/**
 * Render list block
 */

$data = wp_parse_args($args, [
    'class' => 'list-block',
    'items' => []
]);

if ( !empty($data['items']) ) : ?>
    <div class="list-group">
        <?php foreach ($data['items'] as $item) : ?>
            <?php if ( !empty($item['url']) ) : ?>
                <a class="list-group-item" href="<?php echo esc_attr( $item['url'] ); ?>"><?php echo esc_html( $item['title'] ); ?></a>
            <?php else : ?>
                <span class="list-group-item"><?php echo esc_html( $item['title'] ); ?></span>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php endif;