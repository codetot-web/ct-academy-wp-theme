<?php
/**
 * Archive Header
 */
$current_object = get_queried_object();
?>

<div class="archive-header">
    <div class="container">
        <h1 class="h1 archive-header-title"><?php the_archive_title(); ?></h1>
        <?php if ( !empty($current_object->description)) : ?>
            <div class="archive-header-description"><?php the_archive_description(); ?></div>
        <?php endif; ?>
    </div>
</div>