<?php
/**
 * Displays the next and previous post navigation in single posts.
 *
 * @package braveandbaw
 * @subpackage baw.website
 * @since braveandbaw 1.0
 */

$next_post = get_next_post();
$prev_post = get_previous_post();

if ( $next_post || $prev_post ) {

	$pagination_classes = '';

	if ( ! $next_post ) {
		$pagination_classes = ' only-one only-prev';
	} elseif ( ! $prev_post ) {
		$pagination_classes = ' only-one only-next';
	}

	?>

	<nav class="single-navigation section-inner<?php echo esc_attr( $pagination_classes ); ?>" aria-label="<?php esc_attr_e( 'Post', 'twentytwenty' ); ?>" role="navigation">
		<div class="single-navigation-inner uk-grid">
			<div class="uk-width-1-2 single-navigation-prev">
				<?php if ( $prev_post ) { ?>
					<a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">
						<?= baw_svg('solid/arrow-left') ?>
						<span><?= __('vorheriger Artikel', 'baw') ?></span>
						<small class="uk-visible@m">
							<?php echo wp_kses_post( get_the_title( $prev_post->ID ) ); ?>
						</small>
					</a>
				<?php } ?>
			</div>
			<div class="uk-width-1-2 single-navigation-next">
				<?php if ( $next_post ) {?>
					<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
						<?= baw_svg('solid/arrow-right') ?>
						<span><?= __('nächster Artikel', 'baw') ?></span>
						<small class="uk-visible@m">
							<?php echo wp_kses_post( get_the_title( $next_post->ID ) ); ?>
						</small>
					</a>
				<?php } ?>
			</div>

		</div>
	</nav>

	<?php
}
