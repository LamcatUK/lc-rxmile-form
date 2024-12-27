<?php

/**
 * Plugin Name: RxMile Form
 * Description: A multi-step form plugin.
 * Version: 1.0
 * Author: Your Name
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Include required files.
require_once plugin_dir_path(__FILE__) . 'includes/post-type.php';
// require_once plugin_dir_path(__FILE__) . 'includes/enqueue-scripts.php';
require_once plugin_dir_path(__FILE__) . 'includes/form-handler.php';
require_once plugin_dir_path(__FILE__) . 'includes/acf-fields.php'; // Optional if using ACF

add_filter('template_include', function ($template) {
    if (is_singular('rxmile_form')) {
        // Path to your plugin's single post template
        $plugin_template = plugin_dir_path(__FILE__) . 'templates/single-rxmile_form.php';

        // Check if the plugin template exists
        if (file_exists($plugin_template)) {
            return $plugin_template;
        }
    }
    return $template;
});


function rxmile_enqueue_scripts()
{
    if (is_singular('rxmile_form')) {
        // Enqueue your main script
        wp_enqueue_script('rxmile-plugin-script', plugin_dir_url(__FILE__) . 'assets/js/script.js', [], null, true);

        // Localize script to pass PHP data to JavaScript
        wp_localize_script('rxmile-plugin-script', 'rxmileData', [
            'ajax_url' => admin_url('admin-ajax.php'), // URL for AJAX requests
            'nonce'    => wp_create_nonce('rxmile_nonce'), // Generate a nonce
        ]);
    }
}
add_action('wp_enqueue_scripts', 'rxmile_enqueue_scripts');
