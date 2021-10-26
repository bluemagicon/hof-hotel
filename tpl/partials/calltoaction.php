<?php if($page_header['show_cta'] && $page_header['cta_link']) {

    $link = $page_header['cta_link'];
    $mobile_classes = $page_header['show_nav'] ? 'uk-visible@m' : ''

    ?>
    <div class="header-item header-item--cta <?= $mobile_classes ?>">
        <a href="<?= $link['url'] ?>" target="<?= $link['target'] ?>" class="w-btn w-btn--xs" aria-label="<?= $link['title'] ?>">
            <?= baw_svg($page_header['cta_icon']) ?><?= $link['title'] ?>
        </a>
    </div>
<?php } ?>
