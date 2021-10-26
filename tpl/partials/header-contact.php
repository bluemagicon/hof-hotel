<?php if($page_header['show_contact'] && isset($global_contact['link_zur_kontaktseite']['url'])) { ?>
    <div class="header-item header-item--contact">
        <a aria-label="<?= __('Kontaktinformationen anzeigen', 'baw') ?>" href="<?= $global_contact['link_zur_kontaktseite']['url'] ?>">
            <?= baw_svg('solid/headset'); ?>
        </a>
    </div>
<?php } ?>

<?php /*
<div uk-dropdown="mode: click; pos: bottom-right">
    <div>
        <?php
        include 'contact.php';
        ?>
    </div>
</div>
*/ ?>
