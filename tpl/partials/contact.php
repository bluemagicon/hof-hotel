<div class="contact">
    <ul class="contact-data">
        <?php if($global_contact['telefonnummer']) { ?>
            <li>
                <a aria-label="<?= __('Jetzt anrufen', 'baw') ?>" href="tel:<?= $global_contact['telefonnummer'] ?>">
                    <?= baw_svg('solid/phone'); ?>
                    <?= $global_contact['telefonnummer'] ?>
                </a>
            </li>
        <?php } ?>

        <?php if($global_contact['email_adresse']) { ?>
            <li>
                <a aria-label="<?= __('Jetzt E-Mail schreiben', 'baw') ?>"href="mailto:<?= $global_contact['email_adresse'] ?>">
                    <?= baw_svg('solid/envelope'); ?>
                    <?= $global_contact['email_adresse'] ?>
                </a>
            </li>
        <?php } ?>

        <?php if($global_contact['anschrift']) { $anschrift = $global_contact['anschrift']; ?>
            <?php if($anschrift['strasse'] || $anschrift['plz'] || $anschrift['ort']) { ?>
                <li>
                    <?= baw_svg('solid/map-marker'); ?>
                    <b><?= $global_contact['firmenname'] ?></b><br>
                    <?= $anschrift['strasse'] ?><br>
                    <?= $anschrift['plz'] ?> <?= $anschrift['ort'] ?>
                </li>
            <?php } ?>
        <?php } ?>
    </ul>

    <?php if($global_contact['show_contactlink'] && $global_contact['contactlink']) { ?>
        <?php
        $cLink = $global_contact['contactlink'];
        $cURL = $cLink['url'] ?: false;
        $cTitle = $cLink['title'] ?: __('Kontakt aufnehmen', 'baw');
        $cTarget = $cLink['target'] ?: '';
        $cIcon = baw_svg($global_contact['contactlink_icon']) ?: '';

        if($cURL) {
        ?>
            <p>
                <a aria-label="<?= $cTitle ?>" target="<?= $cTarget ?>" href="<?= $cURL ?>" class="w-btn w-btn--xs">
                    <?= $cIcon ?><?= $cTitle ?>
                </a>
            </p>
        <?php } ?>
    <?php } ?>
</div>
