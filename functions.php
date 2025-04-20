<?php
// functions.php

// Load the autoloader
require_once get_template_directory() . '/inc/helpers/Autoloader.php';

// Boot up the theme
\Echo\Classes\Theme::get_instance();
