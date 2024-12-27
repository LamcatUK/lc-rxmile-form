<?php

add_action('wp_ajax_rxmile_save_form', 'rxmile_save_form');
add_action('wp_ajax_nopriv_rxmile_save_form', 'rxmile_save_form');

function rxmile_save_form()
{
    // Verify nonce for security
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'rxmile_nonce')) {
        wp_send_json_error(['message' => 'Invalid nonce.']);
        wp_die();
    }

    // Gather existing form data from WordPress user meta or transient
    $user_id = get_current_user_id();
    $form_data_key = 'rxmile_form_data';
    $form_data = $user_id ? get_user_meta($user_id, $form_data_key, true) : get_transient($form_data_key);
    $form_data = is_array($form_data) ? $form_data : [];

    // Check the step and update form data accordingly
    $step = sanitize_text_field($_POST['step'] ?? '');
    if ($step) {
        switch ($step) {
            case 'step1':
                $form_data = array_merge($form_data, [
                    'first_name' => sanitize_text_field($_POST['firstName'] ?? ''),
                    'last_name' => sanitize_text_field($_POST['lastName'] ?? ''),
                    'company_name' => sanitize_text_field($_POST['companyName'] ?? ''),
                    'npi_number' => sanitize_text_field($_POST['npiNumber'] ?? ''),
                    'contact_email' => sanitize_email($_POST['contactEmail'] ?? ''),
                    'company_address_line1' => sanitize_text_field($_POST['companyAddressLine1'] ?? ''),
                    'company_address_line2' => sanitize_text_field($_POST['companyAddressLine2'] ?? ''),
                    'company_city' => sanitize_text_field($_POST['companyCity'] ?? ''),
                    'company_state' => sanitize_text_field($_POST['companyState'] ?? ''),
                    'company_zip' => sanitize_text_field($_POST['companyZip'] ?? ''),
                    'company_country' => sanitize_text_field($_POST['companyCountry'] ?? ''),
                    'preference' => sanitize_text_field($_POST['preference'] ?? ''),
                    'pharmcount' => sanitize_text_field($_POST['pharmcount'] ?? ''),
                ]);
                break;

            case 'step2':
                $form_data['options'] = isset($_POST['options']) && is_array($_POST['options'])
                    ? array_map('sanitize_text_field', $_POST['options'])
                    : [];
                break;

            case 'step3':
                $form_data = array_merge($form_data, [
                    'cardholder_name' => sanitize_text_field($_POST['cardholder_name'] ?? ''),
                    'card_number' => sanitize_text_field($_POST['card_number'] ?? ''),
                    'card_expiry' => sanitize_text_field($_POST['card_expiry'] ?? ''),
                    'card_cvc' => sanitize_text_field($_POST['card_cvc'] ?? ''),
                    'billing_address_line1' => sanitize_text_field($_POST['billingAddressLine1'] ?? ''),
                    'billing_address_line2' => sanitize_text_field($_POST['billingAddressLine2'] ?? ''),
                    'billing_city' => sanitize_text_field($_POST['billingCity'] ?? ''),
                    'billing_state' => sanitize_text_field($_POST['billingState'] ?? ''),
                    'billing_zip' => sanitize_text_field($_POST['billingZip'] ?? ''),
                    'billing_country' => sanitize_text_field($_POST['billingCountry'] ?? ''),
                ]);
                break;

            default:
                wp_send_json_error(['message' => 'Invalid step provided.']);
                wp_die();
        }

        // Save updated form data
        if ($user_id) {
            update_user_meta($user_id, $form_data_key, $form_data);
        } else {
            set_transient($form_data_key, $form_data, 60 * 60); // Store data for 1 hour
        }

        wp_send_json_success(['message' => 'Form data stored successfully.']);
    } else {
        wp_send_json_error(['message' => 'Step not provided.']);
    }

    wp_die();
}
