<?php
namespace Echo\Classes;

use Echo\Traits\Singleton;

class ImageSizes {
    use Singleton;

    protected function init() {
        add_action('after_setup_theme', [$this, 'add_image_sizes']);
    }

    public function add_image_sizes() {
        add_image_size('hero', 1920, 800, true);
        add_image_size('square', 600, 600, true);
        add_image_size('portrait', 600, 900, true);
        add_image_size('landscape', 1200, 800, true);
    }
}