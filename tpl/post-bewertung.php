<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package braveandwray
 * @subpackage baw.base
 * @since braveandwray 1.0
 */

include 'post/load-vars.php';


$data = get_field('review_daten', $theID);
$stars = $data['stars'] ?: false;

if($stars) {
    $stars = explode('.', $stars);
    $full_stars = $stars[0];
    $half_star = isset($stars[1]) ? true : false;
}

?>

<article <?php post_class('post post--box'); ?> id="post-<?php the_ID(); ?>">
    <div class="post-inner">

        <?php if(! $hide_images) { ?>
            <?php include 'post/thumbnail.php'; ?>
        <?php } ?>

        <div class="post-content">
            <p class="post-stars">
                <?php if($stars) { ?>
                    <?php for($i=0; $i<$full_stars; $i++) { ?>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 18.26l-7.053 3.948 1.575-7.928L.587 8.792l8.027-.952L12 .5l3.386 7.34 8.027.952-5.935 5.488 1.575 7.928L12 18.26zm0-2.292l4.247 2.377-.949-4.773 3.573-3.305-4.833-.573L12 5.275l-2.038 4.42-4.833.572 3.573 3.305-.949 4.773L12 15.968z"/></svg>
                    <?php } ?>
                <?php } ?>
            </p>
            <h3><?= $data['headline'] ?></h3>
            <?php if(! $hide_descr) { ?>
                <?php the_excerpt(); ?>
                <a uk-toggle="target: #modal-bewertungen" data-content="<?= urlencode(get_the_content()); ?>" data-title="<?= urlencode($data['headline']) ?>" data-subtitle="<?= $data['subheadline'] ?>" class="open-dyn-modal">weiterlesen</a>
            <?php } ?>
        </div>

    </div>

</article>
