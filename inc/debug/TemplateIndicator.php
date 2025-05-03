<?php

namespace Echo\Debug;

use Echo\Traits\Singleton;

class TemplateIndicator {
    use Singleton;

    protected function init() {
        add_action('admin_bar_menu', [$this, 'show_template_in_admin_bar'], 100);
    }

    public function show_template_in_admin_bar($wp_admin_bar) {
        if (!is_admin() && is_user_logged_in() && current_user_can('edit_theme_options')) {
            global $template;
            $template_file = basename($template);

            // Check for custom page templates
            if (is_singular()) {
                $custom_template = get_post_meta(get_the_ID(), '_wp_page_template', true);

                if ($custom_template && $custom_template !== 'default') {
                    $template_file = $custom_template;
                }
            }

            $wp_admin_bar->add_node([
                'id'    => 'template-info',
                'title' => 'Template: ' . esc_html($template_file),
                'meta'  => ['title' => 'Currently loaded template file'],
            ]);
        }
    }
}
