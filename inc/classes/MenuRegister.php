<?php
namespace Echo\Classes;

use Echo\Traits\Singleton;

class MenuRegister {
    use Singleton;

    protected function init() {
        add_action('after_setup_theme', [$this, 'register_menus']);
    }

    public function register_menus() {
        register_nav_menus([
            'primary' => __('Primary Menu', 'echo'),
            'footer'  => __('Footer Menu', 'echo'),
        ]);
    }
}