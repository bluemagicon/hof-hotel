<?php

if( function_exists('acf_register_block_type') ) {

    acf_register_block_type(array(
        'name' => 'Inhaltausgabe',
        'title' => 'Inhaltausgabe',
        'ghostkit' => array(
            'supports' => array(
                'scrollReveal' => true,
                'spacings' => true,
                'display' => true,
                'frame' => true,
            ),
        ),
        'description' => __('Für die Ausgabe von ausgewählten Inhalten'),
        'render_template' => 'tpl/blocks/inhaltausgabe.php',
        'category' => 'common',
        'mode' => 'preview',
        'icon' => 'category',
        'supports' => array(
            'align' => array('wide', 'full'),
            'anchor' => true
        ),
        'keywords' => array(
            'Inhalte',
            'Ausgabe',
        ),
    ));
}

?>
