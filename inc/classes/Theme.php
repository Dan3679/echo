<?php
namespace Echo\Classes;

use Echo\Traits\Singleton;
use Echo\Classes\Enqueue;

class Theme {
    use Singleton;

    protected function init() {
        Enqueue::get_instance();
        ThemeSupport::get_instance();
        MenuRegister::get_instance();
    }
}
