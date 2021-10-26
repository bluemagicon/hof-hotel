<?php
/**
 * The template for displaying single posts and pages.
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

	<?php

	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();

			get_template_part( 'tpl/single', get_post_type() );
		}
	}

	?>

</main>



<?php
get_footer();
