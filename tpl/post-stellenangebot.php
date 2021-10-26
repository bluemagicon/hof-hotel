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

// ----------------------------------------------------------------------
// Custom Fields

$entry = get_field('career_entry', $theID) ?: 'now';
$entry_date = $entry == 'now' ? get_field('glbl_career_entrynow', 'option') : get_field('career_entrydate', $theID);
$contact = get_field('career_contact', $theID) ? get_field('career_contact_cstm', $theID) : get_field('glbl_career_contact', 'option');
$benefits = get_field('career_benefits', $theID) ? get_field('career_benefits_cstm', $theID) : get_field('glbl_career_benefits', 'option');

// ----------------------------------------------------------------------
// Taxonomy Terms

$post_taxs = get_post_taxonomies();
$post_taxs_icons = array(
	'berufseinstieg' => 'solid/door-open',
	'berufsgruppe' => 'solid/user-tie',
	'location' => 'solid/map-pin',
);

$career_entry	= get_the_terms($theID, 'karriereeinstieg');
$career_cluster	= get_the_terms($theID, 'karrierebereich');

?>


<article <?php post_class('post post--box'); ?> id="post-<?php the_ID(); ?>">
	<div class="post-inner">

		<?php if(! $hide_images) { ?>
			<?php include 'post/thumbnail.php'; ?>
		<?php } ?>

		<div class="post-content">
			<?php include 'post/header.php'; ?>

			<?php if(! $hide_descr) { ?>
				<ul class="post-datalist">
					<?php foreach($post_taxs as $tax) {
						$terms = get_the_terms($theID, $tax);
						$term_icon = $post_taxs_icons[$tax] ?: 'solid/info-circle'; ?>
						<li>
							<?= baw_svg($term_icon) ?>
							<?php foreach($terms as $term) { ?>
								<span><?= $term->name ?></span>
							<?php } ?>
						</li>
					<?php } ?>
					<?php if($entry_date) { ?>
						<li>
							<?= baw_svg('solid/clock').$entry_date ?>
						</li>
					<?php } ?>
				</ul>
				<?php /* the_excerpt(); */ ?>
				<?php
				/*
				pre_print_r($entry_date);
				pre_print_r($contact);
				pre_print_r($benefits);
				pre_print_r($benefits_cstm);
				*/
				?>
			<?php } ?>

			<?php include 'post/footer.php'; ?>

		</div>

	</div>

</article>
