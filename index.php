<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package braveandwray
 * @subpackage braveandwray
 * @since braveandwray 1.0
 */

 get_header();
 ?>

 <?php

 $archive_title    = '';
 $archive_subtitle = '';

 if ( is_search() ) {
 	global $wp_query;

 	$archive_title = sprintf(
 		'%1$s %2$s',
 		'<span class="color-accent">' . __( 'Suche nach:', 'wray' ) . '</span>',
 		'&ldquo;' . get_search_query() . '&rdquo;'
 	);

 	if ( $wp_query->found_posts ) {
 		$archive_subtitle = sprintf(
 			/* translators: %s: Number of search results. */
 			_n(
 				'Wir haben %s Ergebnis für Ihre Suche gefunden.',
 				'Wir haben %s Ergebnisse für Ihre Suche gefunden.',
 				$wp_query->found_posts,
 				'wray'
 			),
 			number_format_i18n( $wp_query->found_posts )
 		);
 	} else {
 		$archive_subtitle = __( 'Wir konnten leider keine Ergebnisse zu Ihrer Suche finden. Vielleicht probieren Sie einen anderen Begriff?', 'wray' );
 	}
 } elseif(is_home()) {
    $w_opt_blog	= get_field('opt_blog', 'option') ?: false;
    $archive_title = get_the_title( get_option('page_for_posts', true) );
    $archive_subtitle = $w_opt_blog['blog_description'] ?: '';
 } elseif(is_archive()) {
 	$archive_title = get_the_archive_title();
 	$archive_subtitle = get_the_archive_description();
 }

 ?>


 <main role="main">
     <div class="archive alignwide">

     	<?php
     	//*******************************************************
     	//*******************************************************
     	/**
     	***	Archive Header
     	***
     	**/

    	$postTypeSlug = 'post';
        $postTypeInfo = get_post_type_object($postTypeSlug);


     	if ( $archive_title || $archive_subtitle ) {
     	?>
     		<header class="archive-header single-header">
     			<div class="archive-header-inner single-header-inner">
     				<span class="has-text-align-center is-style-subheadline has-primary-color has-text-color"><?= get_the_archive_title(); ?></span>
                    <?php if(have_rows('opt_blog', 'option')) : the_row(); ?>
                        <h1 class="has-text-align-center"><?= get_sub_field('blog_text_above_archive'); ?></h1>
                    <?php endif; ?>
                    <ul class="blog-navigation">
                        <?php for($i = 0; $i < count(get_categories()); $i++){ ?>
                            <?php
                                $category_id = get_categories()[$i]->cat_ID;
                                $category_link = get_category_link($category_id);
                            ?>
                            <li>
                                <a href="<?= $category_link; ?>"><?= get_categories()[$i]->name ?></a>
                            </li>
                        <?php } ?>
                    </ul>
     			</div>
                <div class="filter">
                    <?php if(is_home()) { ?>
                        <div class="filter-inner">
                            <form>
                                <div class="filter-inner-select-wrap">
                                    <div class="filter-inner-tax">
                                        <label>Kategorien</label>
                                        <?php wp_dropdown_categories(array('hide_empty' => 1, 'show_option_all' => 'Alle Beiträge', 'selected' => $_REQUEST['cat'])); ?>
                                    </div>
                                    <?php /*
                                    <div class="filter-inner-tax">
                                        <label>Schlagwörter</label>
                                        <?php wp_dropdown_categories(array('taxonomy'=> 'post_tag', 'name' => 'post_tag', 'value_field' => 'slug', 'hide_empty' => 1, 'show_option_all' => 'Alle anzeigen', 'selected' => $_REQUEST['post_tag'])); ?>
                                    </div>
                                    */ ?>
                                </div>
                                <button class="filter-inner-button" type="submit">Filter anwenden</button>
                                <?php if($_REQUEST) { ?>
                                    <a class="filter-inner-clear-all" href="<?= get_permalink( get_option( 'page_for_posts' ) ) ?>">Einstellungen löschen</a>
                                <?php } ?>
                            </form>
                        </div>
                    <?php } else {
                        do_action('show_beautiful_filters');
                    }
                    ?>
                </div>
     		</header>


     	<?php } //*********************************************** ?>


    	<div class="archive-listing single-listing">
    		<?php
    		//*******************************************************
    		//*******************************************************
    		/**
    		***	Post Loop
    		***
    		**/

    		if ( have_posts() ) {
                echo '<div class="uk-grid uk-child-width-1-2@s uk-child-width-1-3@l">';
        			while ( have_posts() ) {
        				the_post();
        				get_template_part( 'tpl/post', get_post_type() );
        			}
                echo '</div>';
    		} elseif ( is_search() ) {

    			echo '<div class="no-search-results-form section-inner thin">';
    				get_search_form(array('label' => __( 'search again', 'twentytwenty' ),));
    			echo '</div>';

    		}

    		//****************************************************** ?>
    	</div>


    </div>

    <?php get_template_part( 'tpl/single/pagination' ); ?>

 </main>



 <?php
 get_footer();
