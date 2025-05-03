<?php
/**
 * Footer Navigation template.
 *
 * @package Echo
 */

$footer_menu_location = 'footer';
$footer_menu = wp_nav_menu([
    'theme_location' => $footer_menu_location,
    'container'      => 'nav',
    'container_class'=> 'footer-nav',
    'menu_class'     => 'footer-menu list-unstyled d-flex flex-wrap gap-3',
    'echo'           => false,
    'fallback_cb'    => false,
]);

if ( $footer_menu ) {
    echo $footer_menu;
}
?>
