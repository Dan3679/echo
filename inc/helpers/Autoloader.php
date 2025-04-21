<?php
// inc/helpers/Autoloader.php

spl_autoload_register(function ($class) {
    // Define the namespace root
    $prefix = 'Echo\\';
    $base_dir = __DIR__ . '/../';  // Base directory for the theme

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // If the class doesn't start with 'Echo\\', return
        return;
    }

    // Remove the 'Echo\\' prefix to get the relative class name
    $relative_class = substr($class, $len);

    // Split the relative class into its namespace parts
    $path_parts = explode('\\', $relative_class);

    // Set default directories for different types of classes
    if (isset($path_parts[0])) {
        switch ($path_parts[0]) {
            case 'Classes':
                // For 'Echo\Classes', map to 'inc/classes/'
                $directory = 'classes';
                break;
            case 'Traits':
                // For 'Echo\Traits', map to 'inc/traits/'
                $directory = 'traits';
                break;
            case 'Helpers':
                // For 'Echo\Helpers', map to 'inc/helpers/'
                $directory = 'helpers';
                break;
            case 'VC':
                // For 'Echo\VC', map to 'inc/vc-templates/'
                $directory = 'vc-templates';
                break;
            default:
                // For other namespaces, fallback to 'classes'
                $directory = 'classes';
                break;
        }
    }

    // Convert the namespace to a file path (use proper case for class names)
    $file = $base_dir . $directory . '/' . ucfirst($path_parts[1]) . '.php';

    // If the file exists, require it
    if (file_exists($file)) {
        require $file;
    } else {
        error_log('Autoloader could not find: ' . $file);
    }
});
