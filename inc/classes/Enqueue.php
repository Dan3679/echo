<?php
// inc/classes/Enqueue.php

namespace Echo\Classes;

use Echo\Traits\Singleton;

class Enqueue {
    use Singleton;

    protected function setup_hooks() {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
        add_action('wp_enqueue_scripts', [$this, 'dequeue_gutenberg'], 100);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_bootstrap']);
    }

    public function enqueue_assets() {
        // Main theme stylesheet (compiled from SCSS)
        wp_enqueue_style(
            'echo-theme-style',
            get_stylesheet_directory_uri() . '/style.css',
            ['bootstrap'],
            filemtime(get_stylesheet_directory() . '/style.css'),
            'all'
        );
    }

    public function enqueue_bootstrap() {
        // Bootstrap 5 (via CDN or host yourself if you prefer)
        wp_enqueue_style(
            'bootstrap',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
            [],
            '5.3.3'
        );

        wp_enqueue_script(
            'bootstrap',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
            ['jquery'],
            '5.3.3',
            true
        );
    }

    public function dequeue_gutenberg() {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('global-styles');
    }
}
