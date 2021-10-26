<?php
function print_logos($logo) {
    if($logo['typ'] == 'text') {
        $logo_text = $logo['text'] ?: get_bloginfo("name");
        echo '<span class="w-h4">' . $logo_text . '</span>';
    } elseif($logo['typ'] == 'file') {
        echo wp_get_attachment_image($logo['file'], 'medium');
    } elseif($logo['typ'] == 'svg') {
        echo $logo['svg'];
    }
}
?>
