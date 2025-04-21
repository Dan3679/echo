<?php

// Define theme root constants
define('ECHO_THEME_DIR', get_template_directory());
define('ECHO_THEME_URI', get_template_directory_uri());

// Load Composer-style autoloader
require_once ECHO_THEME_DIR . '/inc/helpers/Autoloader.php';

// Kick off the theme setup class
if (class_exists('\Echo\Classes\EchoTheme')) {  // Updated namespace
    \Echo\Classes\EchoTheme::get_instance();   // Updated namespace
}