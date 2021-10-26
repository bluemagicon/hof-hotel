<?php

$theID = get_the_id();

$thumbnail_size = isset($args['thumbnail_size']) ? $args['thumbnail_size'] : 'baw-xs-fix';
$image_classes = isset($args['image_classes']) ? $args['image_classes'] : '';

$hide_images = isset($args['layout_settings']['hide_images']) ? $args['layout_settings']['hide_images']: false;
$hide_links = isset($args['layout_settings']['disable_links']) ? $args['layout_settings']['disable_links']: false;
$hide_descr = isset($args['layout_settings']['hide_descr']) ? $args['layout_settings']['hide_descr'] : false;

?>
