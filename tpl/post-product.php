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

<article <?php post_class('post-teaser'); ?> id="post-<?php the_ID(); ?>">
	<div class="post-inner">

		<?php
		//wc_get_template_part( 'content', 'product' );
		?>

	</div>

</article>
