<?php

namespace Echo\Classes;

use Echo\VC\HeadlineSection;
class VCTemplateLoader {
    use \Echo\Traits\Singleton;

    protected function init() {
        add_action('vc_before_init', [$this, 'register_templates']);
        add_shortcode('headline_section', [new HeadlineSection(), 'render']);
    }

    public function register_templates() {
        (new HeadlineSection())->map();
        // Add more as needed
    }
}
