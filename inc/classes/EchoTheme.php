<?php

namespace Echo\Classes;

use Echo\Traits\Singleton;
use Echo\Debug\TemplateIndicator;

class EchoTheme {
    use Singleton;

    protected function init() {
        Enqueue::get_instance();
        ThemeSupport::get_instance();
        RegisterMenus::get_instance();
        RegisterImageSizes::get_instance();
        SettingsPage::get_instance();
        VCTemplateLoader::get_instance();
        TemplateIndicator::get_instance();
    }
}
