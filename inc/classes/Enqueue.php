<?php
namespace Echo\Classes;

use Echo\Traits\Singleton;

class Enqueue {
    use Singleton;

    protected function init() {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
        add_action('wp_enqueue_scripts', [$this, 'dequeue_gutenberg'], 90);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_bootstrap']);
        add_action('wp_enqueue_scripts', [$this, 'disable_dashicons'], 100);
    }

    public function enqueue_assets() {
        // Enqueue the compiled and minified CSS file
        wp_enqueue_style(
            'echo-theme-style',
            get_stylesheet_directory_uri() . '/assets/css/style.min.css', // Update to your compiled CSS path
            ['bootstrap'], // Optional: If you have other dependencies like Bootstrap
            filemtime(get_stylesheet_directory() . '/assets/css/style.min.css'), // Use the minified version for caching
            'all'
        );
    }

    public function enqueue_bootstrap() {
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

    public function disable_dashicons() {
        if (!is_admin() && !current_user_can('edit_posts')) {
            wp_dequeue_style('dashicons');
        }
    }
}
