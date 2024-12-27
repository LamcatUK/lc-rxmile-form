<?php

function rxmile_enqueue_scripts($hook)
{
    if (is_singular('rxmile_form')) {
        wp_enqueue_style('rxmile-style', plugin_dir_url(__FILE__) . '../assets/css/style.css');
        wp_enqueue_script('rxmile-step1', plugin_dir_url(__FILE__) . '../assets/js/step1form.js', ['jquery'], null, true);
        wp_enqueue_script('rxmile-step2', plugin_dir_url(__FILE__) . '../assets/js/step2form.js', ['jquery'], null, true);
        wp_enqueue_script('rxmile-payment', plugin_dir_url(__FILE__) . '../assets/js/paymentform.js', ['jquery'], null, true);

        // Localize script for AJAX
        wp_localize_script('rxmile-step1', 'rxmile_ajax', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('rxmile_nonce'),
        ]);
    }
}

add_action('wp_enqueue_scripts', 'rxmile_enqueue_scripts');
