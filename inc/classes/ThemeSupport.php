<?php
namespace Echo\Classes;

use Echo\Traits\Singleton;

class ThemeSupport {
    use Singleton;

    protected function init() {
        add_action('after_setup_theme', [$this, 'setup_theme']);
    }

    public function setup_theme() {
        // Let WordPress manage the document title
        add_theme_support('title-tag');

        // Enable support for post thumbnails (featured images)
        add_theme_support('post-thumbnails');

        // Enable support for HTML5 markup
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script'
        ]);

        // Add support for custom logo
        add_theme_support('custom-logo', [
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
        ]);

        // Support for custom background
        add_theme_support('custom-background', [
            'default-color' => '#ffffff',
        ]);

        // Add support for selective refresh in Customizer
        add_theme_support('customize-selective-refresh-widgets');

        // Optional: Enable wide/full alignments in Gutenberg editor
        add_theme_support('align-wide');

        // Optional: Add editor styles (if you want your SCSS styles in the editor too)
        // add_editor_style('assets/css/main.min.css');
    }
}