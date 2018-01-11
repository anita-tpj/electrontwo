<?php

// Slider Shortcode
function elt_slider_shortcode() {
    ob_start();
    wptuts_slider_template();
    $slider = ob_get_clean();
    return $slider;
}
add_shortcode( 'slider', 'elt_slider_shortcode' );
