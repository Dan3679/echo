<?php

namespace Echo\VC;

class HeadlineSection {
    public function map() {
        vc_map([
            'name' => __('Headline Section', 'echo'),
            'base' => 'headline_section',
            'category' => __('Basic Elements', 'echo'),
            'params' => [
                [
                    'type' => 'dropdown',
                    'heading' => __('Headline Level', 'echo'),
                    'param_name' => 'level',
                    'value' => [
                        'H1' => 'h1',
                        'H2' => 'h2',
                        'H3' => 'h3',
                        'H4' => 'h4',
                        'H5' => 'h5',
                        'H6' => 'h6',
                    ],
                    'std' => 'h2'
                ],
                [
                    'type' => 'textfield',
                    'heading' => __('Headline', 'echo'),
                    'param_name' => 'headline',
                ],
                [
                    'type' => 'textfield',
                    'heading' => __('Above Headline', 'echo'),
                    'param_name' => 'above_headline',
                ],
                [
                    'type' => 'textfield',
                    'heading' => __('Below Headline', 'echo'),
                    'param_name' => 'below_headline',
                ],
                [
                    'type' => 'textarea_html',
                    'heading' => __('Paragraph', 'echo'),
                    'param_name' => 'paragraph',
                ],
                [
                    'type' => 'dropdown',
                    'heading' => __('Text Alignment', 'echo'),
                    'param_name' => 'align',
                    'value' => [
                        'Left' => 'text-left',
                        'Center' => 'text-center',
                        'Right' => 'text-right',
                    ],
                    'std' => 'text-left'
                ],
            ]
        ]);
    }

    public function render($atts, $content = null) {
        $atts = shortcode_atts([
            'level' => 'h2',
            'headline' => '',
            'above_headline' => '',
            'below_headline' => '',
            'paragraph' => '',
            'align' => 'text-left',
        ], $atts, 'headline_section');

        ob_start();
        include get_template_directory() . '/templates/vc-templates/headline_section.php';
        return ob_get_clean();
    }
}
