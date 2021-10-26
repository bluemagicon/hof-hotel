<?php if($page_logos && $page_logos['show_logo']) { ?>
    <?php
    if($page_logos['link_logo'] && $page_logos['verlinkung'] == 'custom') {
        $link_label = $page_logos['custom_label'] ?: '';
        $link_url   = $page_logos['custom_link'] ?: false;
    } else {
        $link_label = __('zur Startseite', 'baw');
        $link_url   = home_url();
    }

    if($page_logos['link_logo'] && $link_url) { ?>
    <a href="<?= $link_url ?>" aria-label="<?= $link_label ?>" alt="<?= $link_label ?>" class="header__item header__item--logo">
    <?php } ?>

            <?php
            if($page_logos['change_mobile']) {
                echo '<span class="uk-hidden@l">';
                    print_logos($page_logos['m_logo_logo']);
                echo '</span>';
                echo '<span class="uk-visible@l">';
                    print_logos($page_logos['logo']);
                echo '</span>';
            } elseif($isFooter && $page_logos['change_footer']) {
                print_logos($page_logos['footer_logo_logo']);
            } else {
                print_logos($page_logos['logo']);
            }
            ?>

    <?php if($page_logos['link_logo']) { ?>
    </a>
    <?php } ?>

<?php } ?>
