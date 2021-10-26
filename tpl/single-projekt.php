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

?>

<article <?php post_class('post post--detail'); ?>>

	<header class="single-header">
		<div class="alignwide">
			<div class="single-header-inner">
				<div class="uk-grid uk-flex-middle">
					<?php if ( has_post_thumbnail() ) { ?>
						<div class="uk-width-1-3@s post-image">
							<?php the_post_thumbnail('thumbnail'); ?>
						</div>
					<?php } ?>
					<div class="uk-width-expand">
						<div class="single-header-inner">
							<h1 class="single-title">
								<?= get_the_title(); ?>
							</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div class="single-content entry-content">
		<?php the_content(); ?>
	</div>

	<div class="single-footer">
		<div class="single-footer-inner alignwide">
			<?php get_template_part( 'tpl/single/navigation' ); ?>
		</div>
	</div>


</article>
