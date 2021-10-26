<?php
/**
 * A template partial to output pagination for the Twenty Twenty default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package braveandwray
 * @subpackage baw.base
 * @since braveandwray 1.0
 */


$prev_link = get_previous_posts_link(__('&laquo; Older Entries'));
$next_link = get_next_posts_link(__('Newer Entries &raquo;'));


$args = array(
	'prev_text' => baw_svg('solid/arrow-left'),
	'next_text' => baw_svg('solid/arrow-right'),
);


?>



<?php if ($prev_link || $next_link) { ?>

	<div class="single-footer">
		<div class="single-footer-inner">
			<nav class="pagination">
				<?php echo paginate_links($args); ?>
			</nav>
		</div>
	</div>

<?php } ?>
