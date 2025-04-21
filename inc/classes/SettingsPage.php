<?php

namespace Echo\Classes;

use Echo\Traits\Singleton;

class SETTINGS_PAGE {
    use Singleton;

    protected function init() {
        error_log('SettingsPage init called');

        wp_die('SettingsPage class initialized');  // Debugging
        // Ensure settings page is hooked into the admin menu and settings registration.
        add_action('admin_menu', [$this, 'add_settings_page']);
        add_action('admin_init', [$this, 'register_settings']);
    }

    // Create the settings page in the admin menu
    public function add_settings_page() {
        add_menu_page(
            __('Site Settings', 'echo'),
            __('Site Settings', 'echo'),
            'manage_options',
            'echo-site-settings',
            [$this, 'render_settings_page'],
            'dashicons-admin-generic',
            6
        );
    }

    // Render the settings page
    public function render_settings_page() {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e('Site Settings', 'echo'); ?></h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('echo_settings');
                do_settings_sections('echo-site-settings');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    // Register settings and fields
    public function register_settings() {
        register_setting('echo_settings', 'echo_company_address');
        register_setting('echo_settings', 'echo_facebook_url');
        register_setting('echo_settings', 'echo_footer_logo');

        // Add a section for general site info
        add_settings_section(
            'echo_main_section',
            __('General Site Info', 'echo'),
            null,
            'echo-site-settings'
        );

        // Add individual settings fields
        add_settings_field(
            'company_address',
            __('Company Address', 'echo'),
            function () {
                $value = get_option('echo_company_address');
                echo '<input type="text" name="echo_company_address" value="' . esc_attr($value) . '" class="regular-text">';
            },
            'echo-site-settings',
            'echo_main_section'
        );

        add_settings_field(
            'facebook_url',
            __('Facebook URL', 'echo'),
            function () {
                $value = get_option('echo_facebook_url');
                echo '<input type="url" name="echo_facebook_url" value="' . esc_attr($value) . '" class="regular-text">';
            },
            'echo-site-settings',
            'echo_main_section'
        );

        add_settings_field(
            'footer_logo',
            __('Footer Logo URL', 'echo'),
            function () {
                $value = get_option('echo_footer_logo');
                echo '<input type="text" name="echo_footer_logo" value="' . esc_attr($value) . '" class="regular-text">';
            },
            'echo-site-settings',
            'echo_main_section'
        );
    }
}
