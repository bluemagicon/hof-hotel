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
			<?php
			//include 'post/thumbnail.php';
			?>
		<?php } ?>

		<div class="post-content">
			<header class="post-header">
		        <h3 class="post-title">
		            <b><?= get_the_title(); ?></b>
		        </h3>
			</header>

			<?php if(! $hide_descr) { ?>
				<?php the_content(); ?>
			<?php } ?>
		</div>

	</div>

</article>
