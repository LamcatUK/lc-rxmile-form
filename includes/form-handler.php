<?php

function rxmile_form_submit()
{
    check_ajax_referer('rxmile_nonce', 'security');

    $data = $_POST['data'];

    // Process data (e.g., save to the database or send an email).
    wp_send_json_success(['message' => 'Form submitted successfully.']);
}

add_action('wp_ajax_rxmile_form_submit', 'rxmile_form_submit');
add_action('wp_ajax_nopriv_rxmile_form_submit', 'rxmile_form_submit');

function rxmile_save_form()
{
    // Verify nonce
    check_ajax_referer('rxmile_nonce', 'nonce');

    // Get form data
    if (isset($_POST['data']) && !empty($_POST['data'])) {
        parse_str($_POST['data'], $form_data);
    } else {
        error_log('No form data received or data is empty.');
    }
    // Process form data as needed
    // Example: Save to post meta or log data
    // You can use $form_data['field_name'] to access individual fields

    // Determine the next step
    $current_step = isset($_POST['step']) ? intval($_POST['step']) : 1;
    $next_step = $current_step + 1;

    // Send success response with the next step URL
    wp_send_json_success([
        'redirect_url' => add_query_arg('step', $next_step, get_permalink()),
    ]);
}
add_action('wp_ajax_rxmile_save_form', 'rxmile_save_form');
add_action('wp_ajax_nopriv_rxmile_save_form', 'rxmile_save_form');
