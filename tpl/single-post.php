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
                <span class="has-text-align-center is-style-subheadline has-primary-color has-text-color"><?= get_the_category()[0]->name; ?></span>
                <h1 class="has-text-align-center"><?= get_the_title(); ?></h1>
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
