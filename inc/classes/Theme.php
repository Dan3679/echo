<?php
// inc/classes/Theme.php

namespace Echo\Classes;

use Echo\Traits\Singleton;

class Theme {
    use Singleton;

    protected function setup_hooks() {
        Enqueue::get_instance();
    }
}
