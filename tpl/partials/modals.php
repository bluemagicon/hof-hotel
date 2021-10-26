<?php
    error_reporting(0);
?>
<?php if(get_field('modal_oeffnungszeiten', 'option')){ ?>
    <?php if(have_rows('modal_oeffnungszeiten_data', 'option')) : the_row(); ?>
        <div id="modal-oeffnungszeiten" class="uk-flex-top uk-modal-container" uk-modal>
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
                    <span class="is-style-subheadline has-primary-color has-text-color"><?= get_sub_field('dialog_subtitel'); ?></span>
                    <h2><?= get_sub_field('dialog_titel'); ?></h2>
                    <?php if(get_sub_field('bloecke') != "") { ?>
                        <div class="block-wrapper uk-grid-large" uk-grid>
                            <?php while(have_rows('bloecke')) : the_row(); ?>
                                <div class="block uk-width-1-2@m">
                                    <div class="block-inner">
                                        <?= get_sub_field('inhalt'); ?>
                                        <?php while(have_rows('buttons')) : the_row(); ?>
                                            <a class="button" href="<?= get_sub_field('button')['url']; ?>" target="<?= get_sub_field('button')['target']; ?>"><?= get_sub_field('button')['title']; ?></a>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php } ?>

<?php if(get_field('modal_kontakt', 'option')){ ?>
    <?php if(have_rows('modal_kontakt_data', 'option')) : the_row(); ?>
        <div id="modal-kontakt" class="uk-flex-top uk-modal-container" uk-modal>
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
                    <span class="is-style-subheadline has-primary-color has-text-color"><?= get_sub_field('dialog_subtitel'); ?></span>
                    <h2><?= get_sub_field('dialog_titel'); ?></h2>
                    <div class="block-wrapper" uk-grid>
                        <?php
                        $args = array(
                            'post_type' => 'adressen'
                        );
                        $custom_query = new WP_Query($args);
                        while($custom_query->have_posts()) : $custom_query->the_post();
                            ?>
                            <div class="block uk-width-1-2@m">
                                <div class="block-inner">
                                    <h4><?= get_the_title(); ?></h4>
                                    <p>
                                        <strong><a class="txt-link" href="tel:<?= get_field('telefonnummer'); ?>"><?= get_field('telefonnummer'); ?></a></strong>
                                        <a class="txt-link" href="mailto:<?= get_field('e-mail-adresse'); ?>"><?= get_field('e-mail-adresse'); ?></a>
                                    </p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <?php if(get_sub_field('buttons') != ""){ ?>
                        <div class="button-wrapper uk-flex uk-flex-middle uk-flex-center uk-flex-wrap">
                            <?php while(have_rows('buttons')) : the_row(); ?>
                                <a class="button" href="<?= get_sub_field('button')['url']; ?>" target="<?= get_sub_field('button')['target']; ?>"><?= get_sub_field('button')['title']; ?></a>
                            <?php endwhile; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php } ?>

<?php if(get_field('modal_speisekarte', 'option')){ ?>
    <?php if(have_rows('modal_speisekarte_data', 'option')) : the_row(); ?>
        <div id="modal-speisekarte" class="uk-flex-top uk-modal-container" uk-modal>
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
                    <span class="is-style-subheadline has-primary-color has-text-color"><?= get_sub_field('dialog_subtitel'); ?></span>
                    <h2><?= get_sub_field('dialog_titel'); ?></h2>
                    <?php if(get_sub_field('bloecke') != "") { ?>
                        <div class="block-wrapper uk-grid-large" uk-grid>
                            <?php while(have_rows('bloecke')) : the_row(); ?>
                                <div class="block uk-width-1-2@m">
                                    <div class="block-inner">
                                        <h4><?= get_sub_field('ueberschrift'); ?></h4>
                                        <a class="button" href="<?= get_sub_field('button')['url']; ?>" target="<?= get_sub_field('button')['target']; ?>"><?= get_sub_field('button')['title']; ?></a>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php } ?>

<?php while(have_rows('custom_modals' , 'option')) : the_row(); ?>
    <div id="<?= get_sub_field('id') ?>" class="uk-flex-top uk-modal-container" uk-modal>
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
                <span class="is-style-subheadline has-primary-color has-text-color"><?= get_sub_field('dialog_subtitel'); ?></span>
                <h2><?= get_sub_field('dialog_titel'); ?></h2>
                <div class="content-wrapper">
                    <?= get_sub_field('dialog_inhalt'); ?>
                </div>
                <?php if(get_sub_field('buttons') != ""){ ?>
                    <div class="button-wrapper uk-flex uk-flex-middle uk-flex-center uk-flex-wrap">
                        <?php while(have_rows('buttons')) : the_row(); ?>
                            <a class="button" href="<?= get_sub_field('button')['url']; ?>" target="<?= get_sub_field('button')['target']; ?>"><?= get_sub_field('button')['title']; ?></a>
                        <?php endwhile; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php endwhile; ?>
