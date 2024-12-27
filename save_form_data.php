<?php
// Ensure this file is not accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Add the AJAX actions for logged-in and non-logged-in users
add_action('wp_ajax_rxmile_save_form', 'rxmile_save_form');
add_action('wp_ajax_nopriv_rxmile_save_form', 'rxmile_save_form');

function rxmile_save_form()
{
    // Verify the nonce for security
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'rxmile_nonce')) {
        wp_send_json_error(['message' => 'Invalid request.']);
        wp_die();
    }

    // Fetch the current form data from transient storage
    $form_data = get_transient('rxmile_form_data') ?: [];

    // Determine the current step
    $step = sanitize_text_field($_POST['step'] ?? '');

    if ($step) {
        switch ($step) {
            case 'step1':
                // Collect data from step 1
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
                // Handle step 2 options (checkboxes or similar)
                $form_data['options'] = isset($_POST['options']) && is_array($_POST['options'])
                    ? array_map('sanitize_text_field', $_POST['options'])
                    : [];
                break;

            case 'step3':
                // Collect payment details for step 3
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

        // Save the updated form data back to transient
        set_transient('rxmile_form_data', $form_data, HOUR_IN_SECONDS);

        // Determine the next step URL (example: ?step=step2)
        $next_step = 'step' . ((int) str_replace('step', '', $step) + 1);

        wp_send_json_success([
            'message' => 'Form data saved successfully.',
            'redirect_url' => add_query_arg('step', $next_step, home_url('/rxmile-form/')),
        ]);
    } else {
        wp_send_json_error(['message' => 'Step not provided.']);
    }

    wp_die();
}
