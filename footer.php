<?php
// ----------------------------------------------------------------------
// ----------------------------------------------------------------------
// ----------------------------------------------------------------------
// Globale Einstellungen werden geladen

$global_social		= get_field('opt_socialmedia', 'option') ?: false;
$global_contact		= get_field('opt_contact', 'option') ?: false;
$global_support		= get_field('opt_support', 'option') ?: false;

$global_logos 		= get_field('opt_logos', 'option') ?: false;
$global_footer 		= get_field('opt_footer', 'option') ?: false;

// ----------------------------------------------------------------------
// Überschreibende Einstellungen werden geladen

$override_logos		= get_field('override_logos') ? get_field('instance_logos')['opt_logos'] : false;
$override_footer	= get_field('override_footer') ? get_field('instance_footer')['opt_footer'] : false;
$override_support	= get_field('override_support') ? get_field('instance_support')['opt_support'] : false;

// ----------------------------------------------------------------------
// Überschreibende Einstellungen werden geladen

$page_logos		= $override_logos ?: $global_logos;
$page_footer	= $override_footer ?: $global_footer;
$page_support	= $override_support ?: $global_support;

// ----------------------------------------------------------------------
?>

<footer id="footer">
    <div class="alignwide">
        <?php if($page_footer['show_socialmedia'] && $global_social) { ?>
            <div class="footer-item footer-social">
                <?php $social_profiles = $global_social;
                include 'tpl/partials/social.php'; ?>
            </div>
        <?php } ?>
        <div class="scroll-top-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="116" height="116" viewBox="0 0 116 116">
                <g id="divider-icon" transform="translate(116 116) rotate(180)">
                    <g id="Ellipse_3" data-name="Ellipse 3" fill="#fff" stroke="#c8bbae" stroke-width="1">
                        <circle cx="58" cy="58" r="58" stroke="none"/>
                        <circle cx="58" cy="58" r="57.5" fill="none"/>
                    </g>
                    <g id="Ellipse_4" data-name="Ellipse 4" transform="translate(4 4)" fill="#fff" stroke="#c8bbae" stroke-width="3">
                        <circle cx="54" cy="54" r="54" stroke="none"/>
                        <circle cx="54" cy="54" r="52.5" fill="none"/>
                    </g>
                    <path id="arrow-left" d="M10.035,15.111H47.889a.889.889,0,1,1,0,1.778H10.035l5.594,5.594a.889.889,0,1,1-1.257,1.257L7.26,16.629a.889.889,0,0,1,0-1.257L14.371,8.26a.889.889,0,1,1,1.257,1.257Z" transform="translate(42.27 83.912) rotate(-90)" fill="#c8bbae"/>
                </g>
            </svg>
        </div>
        <?php if(has_nav_menu('footer')) { ?>
            <div class="footer-item footer-menu">
                <?php wp_nav_menu(array('theme_location' => 'footer', 'container' => false, 'fallback_cb' => false)); ?>
            </div>
        <?php } ?>
    </div>
</footer>
</div>

<div id="modal-bewertungen" class="uk-flex-top uk-modal-container" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <div class="modal-inner">
            <button class="uk-modal-close-default" type="button" uk-close>
                <svg class="custom-icon" xmlns="http://www.w3.org/2000/svg" width="68" height="68" viewBox="0 0 68 68">
                    <g id="Gruppe_106" data-name="Gruppe 106" transform="translate(-1369 -2905)">
                        <g id="Ellipse_1" data-name="Ellipse 1" transform="translate(1369 2905)" fill="#fff" stroke="#c8bbae" stroke-width="1">
                            <circle cx="34" cy="34" r="34" stroke="none"/>
                            <circle cx="34" cy="34" r="33.5" fill="none"/>
                        </g>
                        <g id="Ellipse_5" data-name="Ellipse 5" transform="translate(1375 2911)" fill="#fff" stroke="#c8bbae" stroke-width="2">
                            <circle cx="28" cy="28" r="28" stroke="none"/>
                            <circle cx="28" cy="28" r="27" fill="none"/>
                        </g>
                        <path id="Pfad_283" data-name="Pfad 283" d="M14.636,12.636l7-7,2,2-7,7,7,7-2,2-7-7-7,7-2-2,7-7-7-7,2-2Z" transform="translate(1388.364 2924.364)" fill="#bcae9f"/>
                    </g>
                </svg>
            </button>
            <!--<span class="is-style-subheadline has-primary-color has-text-color" id="dyn-modal-subtitle"></span>-->
            <h2 id="dyn-modal-title"></h2>
            <div class="content-wrapper" id="dyn-modal-content">
                <p></p>
            </div>
        </div>
    </div>
</div>

<?php
include 'tpl/partials/offcanvas.php';
include 'tpl/partials/fixed-sidebar.php';
include 'tpl/partials/modals.php';

wp_footer() ;
?>

</body>
</html>
