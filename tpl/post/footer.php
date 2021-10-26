<?php
if(! $hide_links) {
    $post_type = get_post_type_object(get_post_type());
    $post_type_labels = $post_type->labels;
    ?>

    <a href="<?= esc_url( get_permalink() ) ?>">
        <?= baw_svg('solid/arrow-right') ?> <?= $post_type_labels->view_item ?>
    </a>
<?php } ?>
