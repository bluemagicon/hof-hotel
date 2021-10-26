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

<article <?php post_class(); ?>>

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

    <header class="single-header">
        <div class="alignwide">
            <div class="single-header-inner">
                <span class="has-text-align-center is-style-subheadline has-primary-color has-text-color"><?= get_the_terms(get_the_id(), 'event-categories')[0]->name; ?></span>
                <h1 class="has-text-align-center"><?= get_the_title(); ?></h1>
                <strong class="date"><?= $startDate ?><?php if($startDate != $endDate){ ?> - <?= $endDate ?><?php } ?></strong><br />
                <span class="time"><?= $newTime ?> Uhr - <?= $newTime_end ?> Uhr</span>
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
