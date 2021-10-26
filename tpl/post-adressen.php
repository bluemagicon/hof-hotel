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

?>

<article <?php post_class('post post--box'); ?> id="post-<?php the_ID(); ?>">
	<div class="post-inner">

		<?php if(! $hide_images) { ?>
			<?php include 'post/thumbnail.php'; ?>
		<?php } ?>

		<div class="post-content">
			<h3><?php the_title(); ?></h3>
            <p><?= get_post()->$ID['content'][0]; ?></p>
            <strong><a class="txt-link" href="tel:<?= get_post()->$ID['telefonnummer'][0]; ?>"><?= get_post()->$ID['telefonnummer'][0]; ?></a></strong>
            <a class="txt-link" href="mailto:<?= get_post()->$ID['e-mail-adresse'][0]; ?>"><?= get_post()->$ID['e-mail-adresse'][0]; ?></a>
	</div>

</article>
