<?php
    $inhaltauswahl = get_field('inhaltauswahl');
?>
<ul class="inhaltausgabe">
    <?php if($inhaltauswahl[0]->post_parent != 0){ ?>
        <?php
            $parentID = $inhaltauswahl[0]->post_parent;
            $parentPost = get_post($parentID);
        ?>
        <li>
            <a href="<?= get_permalink($parentID); ?>">
                Alle <?= $parentPost->post_title; ?>
            </a>
        </li>
    <?php } ?>
    <?php foreach($inhaltauswahl as $inhalt){ ?>
        <li>
            <a href="<?= get_permalink($inhalt->ID); ?>">
                <?= $inhalt->post_title; ?>
            </a>
        </li>
    <?php } ?>
</ul>