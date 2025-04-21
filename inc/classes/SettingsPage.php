<?php

namespace Echo\Classes;

use Echo\Traits\Singleton;

class SettingsPage {
    use Singleton;

    protected function init() {
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
            60
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
        // Register settings for all fields
        register_setting('echo_settings', 'echo_company_info');
        register_setting('echo_settings', 'echo_footer');
        register_setting('echo_settings', 'echo_social_media');

        // Add sections for each group of fields
        add_settings_section(
            'echo_company_info_section',
            __('Company Info', 'echo'),
            null,
            'echo-site-settings'
        );

        // Add individual fields for Company Info
        add_settings_field(
            'company_name',
            __('Company Name', 'echo'),
            function () {
                $value = get_option('echo_company_info')['company_name'] ?? '';
                echo '<input type="text" name="echo_company_info[company_name]" value="' . esc_attr($value) . '" class="regular-text">';
            },
            'echo-site-settings',
            'echo_company_info_section'
        );

        add_settings_field(
            'company_address',
            __('Company Address', 'echo'),
            function () {
                $value = get_option('echo_company_info')['company_address'] ?? '';
                echo '<textarea name="echo_company_info[company_address]" class="regular-text">' . esc_textarea($value) . '</textarea>';
            },
            'echo-site-settings',
            'echo_company_info_section'
        );

        add_settings_field(
            'phone_number',
            __('Phone Number', 'echo'),
            function () {
                $value = get_option('echo_company_info')['phone_number'] ?? '';
                echo '<input type="text" name="echo_company_info[phone_number]" value="' . esc_attr($value) . '" class="regular-text">';
            },
            'echo-site-settings',
            'echo_company_info_section'
        );

        add_settings_field(
            'company_email',
            __('Company Email', 'echo'),
            function () {
                $value = get_option('echo_company_info')['company_email'] ?? '';
                echo '<input type="email" name="echo_company_info[company_email]" value="' . esc_attr($value) . '" class="regular-text">';
            },
            'echo-site-settings',
            'echo_company_info_section'
        );

        // Add section for Footer Info
        add_settings_section(
            'echo_footer_section',
            __('Footer Info', 'echo'),
            null,
            'echo-site-settings'
        );

        // Add fields for Footer Info
        add_settings_field(
            'footer_logo',
            __('Footer Logo', 'echo'),
            function () {
                $value = get_option('echo_footer')['footer_logo'] ?? '';
                echo '<input type="text" name="echo_footer[footer_logo]" value="' . esc_attr($value) . '" class="regular-text">';
            },
            'echo-site-settings',
            'echo_footer_section'
        );

        add_settings_field(
            'footer_text',
            __('Footer Text', 'echo'),
            function () {
                $value = get_option('echo_footer')['footer_text'] ?? '';
                echo '<textarea name="echo_footer[footer_text]" class="regular-text">' . esc_textarea($value) . '</textarea>';
            },
            'echo-site-settings',
            'echo_footer_section'
        );

        // Add section for Social Media Info
        add_settings_section(
            'echo_social_media_section',
            __('Social Media', 'echo'),
            null,
            'echo-site-settings'
        );

        // Add fields for Social Media Info
        add_settings_field(
            'facebook_url',
            __('Facebook URL', 'echo'),
            function () {
                $value = get_option('echo_social_media')['facebook_url'] ?? '';
                echo '<input type="url" name="echo_social_media[facebook_url]" value="' . esc_attr($value) . '" class="regular-text">';
            },
            'echo-site-settings',
            'echo_social_media_section'
        );

        add_settings_field(
            'instagram_url',
            __('Instagram URL', 'echo'),
            function () {
                $value = get_option('echo_social_media')['instagram_url'] ?? '';
                echo '<input type="url" name="echo_social_media[instagram_url]" value="' . esc_attr($value) . '" class="regular-text">';
            },
            'echo-site-settings',
            'echo_social_media_section'
        );

        add_settings_field(
            'linkedin_url',
            __('LinkedIn URL', 'echo'),
            function () {
                $value = get_option('echo_social_media')['linkedin_url'] ?? '';
                echo '<input type="url" name="echo_social_media[linkedin_url]" value="' . esc_attr($value) . '" class="regular-text">';
            },
            'echo-site-settings',
            'echo_social_media_section'
        );
    }
}
