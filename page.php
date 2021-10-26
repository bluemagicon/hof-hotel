<?php
/**
 * The template for displaying Pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package braveandwray
 * @subpackage braveandwray
 * @since braveandwray 1.0
 */

get_header();
?>


<main role="main">
	<article <?php post_class(); ?>>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
	</article>
</main>



<?php
get_footer();
