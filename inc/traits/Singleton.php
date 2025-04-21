<?php
// inc/traits/Singleton.php

namespace Echo\Traits;

trait Singleton {

    /**
     * Holds the instance of each class that uses this trait
     */
    private static $instances = [];

    /**
     * This method returns the instance of the class using this trait
     *
     * @return object Singleton instance of the class.
     */
    final public static function get_instance() {
        // Get the called class dynamically
        $called_class = get_called_class();

        // If the instance doesn't exist, create it
        if ( ! isset( self::$instances[ $called_class ] ) ) {
            self::$instances[ $called_class ] = new $called_class();

            // Optionally, you can trigger a hook after the instance is created
            do_action( sprintf( '%s_singleton_init', $called_class ) );
        }

        return self::$instances[ $called_class ];
    }

    /**
     * Prevent cloning of the instance
     */
    final protected function __clone() {}

    /**
     * Prevent unserializing the instance
     */
    public function __wakeup() {
        throw new \Exception("Cannot unserialize singleton");
    }

    /**
     * Protected constructor to prevent direct instantiation
     */
    protected function __construct() {
        $this->setup_hooks();

        if (method_exists($this, 'init')) {
            $this->init();
        }
    }

    /**
     * Initialize hooks - This can be overridden in the classes that use the trait
     */
    protected function setup_hooks() {
        // Default implementation does nothing, but classes that use the trait can define their own
    }
}


