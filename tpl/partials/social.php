<?php

if($social_profiles) {

    $icons = array(
        'linkedin' => 'brands/linkedin',
        'xing' => 'brands/xing',
        'facebook' => 'own/facebook',
        'instagram' => 'own/instagram',
        'google' => 'brands/google',
        'pinterest' => 'brands/pinterest',
        'twitter' => 'brands/twitter',
        'tiktok' => 'brands/tiktok',
    );
    ?>

    <ul class="social">
        <?php foreach($social_profiles as $profile) {
            $icon = $icons[$profile['netzwerk']['value']] ?: false;
            if($icon) { ?>
                <li>
                    <a rel="noopener" aria-label="<?= $profile['netzwerk']['label'] ?>" href="<?= $profile['url'] ?>" target="_blank">
                        <?= baw_svg($icon) ?>
                    </a>
                </li>
            <?php } ?>
        <?php } ?>
    </ul>

<?php } ?>
