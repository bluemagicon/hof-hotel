<?php if( has_post_thumbnail() ) { ?>
    <?php if(! $hide_links) { ?>
        <a aria-label="<?= get_the_title(); ?>" class="post-image" href="<?= esc_url( get_permalink()) ?>">
    <?php } else { ?>
        <div class="post-image">
    <?php } ?>
        <?php the_post_thumbnail($thumbnail_size, ['class' => $image_classes]); ?>
    <?php if(! $hide_links) { ?>
    </a>
    <?php } else { ?>
        </div>
    <?php } ?>
<?php } ?>
