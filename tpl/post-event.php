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
	<div class="post-inner <?php if(get_field('status', get_the_ID()) == "Noch wenige Plätze frei"){echo 'fast-ausgebucht';}elseif(get_field('status', get_the_ID()) == "Bereits ausgebucht"){echo 'ausgebucht';} ?>">

		<?php if(! $hide_images) { ?>
			<?php include 'post/thumbnail.php'; ?>
		<?php } ?>

        <?php
            $monate = array(1=>"Januar", 2=>"Februar", 3=>"M&auml;rz", 4=>"April", 5=>"Mai", 6=>"Juni", 7=>"Juli", 8=>"August", 9=>"September", 10=>"Oktober", 11=>"November", 12=>"Dezember");

            $originalDate = $post->$post_excerpt['_event_start_date'][0];
            $timestamp = strtotime($originalDate);
            $newDate = date("d. F Y", $timestamp );

            $month = date("n", $timestamp);
            $translatedMonth = $monate[$month];
            $startDate = date("d. ", $timestamp) . $translatedMonth . date(" Y", $timestamp);

            $originalDate = $post->$post_excerpt['_event_end_date'][0];
            $timestamp = strtotime($originalDate);
            $newDate_end = date("d. F Y", $timestamp);

            $month = date("n", $timestamp);
            $translatedMonth = $monate[$month];
            $endDate = date("d. ", $timestamp) . $translatedMonth . date(" Y", $timestamp);

            $originalTime = $post->$post_excerpt['_event_start_time'][0];
            $timestamp = strtotime($originalTime);
            $newTime = date("H:i", $timestamp);

            $originalTime = $post->$post_excerpt['_event_end_time'][0];
            $timestamp = strtotime($originalTime);
            $newTime_end = date("H:i", $timestamp);

        ?>

		<div class="post-content">
            <div class="events-excerpt">
                <span class="is-style-subheadline has-primary-color has-text-color"><?= get_the_terms(get_the_id(), 'event-categories')[0]->name; ?></span>
                <h3 class="post-title"><?php echo get_the_title(); ?></h3>
                <strong class="date"><?= $startDate ?><?php if($startDate != $endDate){ ?> - <?= $endDate ?><?php } ?></strong>
                <span class="time"><?= $newTime ?> Uhr - <?= $newTime_end ?> Uhr</span>
            </div>
		</div>

	</div>

</article>
