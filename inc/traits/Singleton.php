<?php
// inc/traits/Singleton.php

namespace Echo\Traits;

trait Singleton {
    protected static $instance = null;

    public static function get_instance() {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    protected function __construct() {
        $this->setup_hooks();
    }

    protected function __clone() {}
    public function __wakeup() {
        throw new \Exception("Cannot unserialize singleton");
    }

    protected function setup_hooks() {}
}
