<?php

namespace Echo\Classes;

use Echo\Traits\Singleton;

class ECHO_THEME {
    use Singleton;

    protected function __construct() {
        Enqueue::get_instance();
        Theme_Support::get_instance();
        Register_Menus::get_instance();
        Image_Sizes::get_instance();
        Settings_Page::get_instance();
    }
}
