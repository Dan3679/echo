<?php
namespace Echo\Classes;

use Echo\Traits\Singleton;

class RegisterImageSizes {
    use Singleton;

    protected function init() {
        add_action('after_setup_theme', [$this, 'add_image_sizes']);
        add_filter('image_size_names_choose', [$this, 'add_custom_sizes_to_media']);
    }

    public function add_image_sizes() {
        add_image_size('hero', 1920, 800, true);
        add_image_size('square', 600, 600, true);
        add_image_size('portrait', 600, 900, true);
        add_image_size('landscape', 1200, 800, true);
    }

    public function add_custom_sizes_to_media($sizes) {
        return array_merge($sizes, [
            'hero'      => __('Hero Image', 'echo'),
            'square'    => __('Square', 'echo'),
            'portrait'  => __('Portrait', 'echo'),
            'landscape' => __('Landscape', 'echo'),
        ]);
    }
}