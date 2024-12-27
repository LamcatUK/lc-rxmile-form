<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Register ACF fields for RxMile Form
 */
function rxmile_register_acf_fields()
{
    if (function_exists('acf_add_local_field_group')) {
        // Define the fields for the RxMile Form post type
        acf_add_local_field_group([
            'key' => 'group_rxmile_form',
            'title' => 'RxMile Form Settings',
            'fields' => [
                // Header Section
                [
                    'key' => 'field_rxmile_header_title',
                    'label' => 'Header Title',
                    'name' => 'header_title',
                    'type' => 'text',
                    'default_value' => 'RxMile Registration',
                ],
                [
                    'key' => 'field_rxmile_header_partner_logo',
                    'label' => 'Partner Logo',
                    'name' => 'partner_logo',
                    'type' => 'image',
                    'return_format' => 'id',
                    'preview_size' => 'medium',
                    'library' => 'all',
                    'instructions' => 'Optional logo for the partner.',
                ],
                [
                    'key' => 'field_rxmile_header_partner_alt',
                    'label' => 'Partner Logo Alt Text',
                    'name' => 'partner_alt',
                    'type' => 'text',
                    'instructions' => 'Alt text for the partner logo.',
                    'conditional_logic' => [
                        [
                            [
                                'field' => 'field_rxmile_header_partner_logo',
                                'operator' => '!=empty',
                            ],
                        ],
                    ],
                ],
                // Step 1 Fields
                [
                    'key' => 'field_rxmile_step1_title',
                    'label' => 'Step 1 Title',
                    'name' => 'step1_title',
                    'type' => 'text',
                    'default_value' => 'Welcome to the future of seamless solutions!',
                ],
                [
                    'key' => 'field_rxmile_step1_intro',
                    'label' => 'Step 1 Introduction',
                    'name' => 'step1_intro',
                    'type' => 'text',
                    'default_value' => 'You\'re just a few steps away from joining the network that\'s transforming pharmacy delivery',
                ],
                [
                    'key' => 'field_rxmile_step1_videos',
                    'label' => 'Step 1 Videos',
                    'name' => 'step1_videos',
                    'type' => 'repeater',
                    'sub_fields' => [
                        [
                            'key' => 'field_rxmile_step1_video_title',
                            'label' => 'Video Title',
                            'name' => 'video_title',
                            'type' => 'text',
                        ],
                        [
                            'key' => 'field_rxmile_step1_video_url',
                            'label' => 'Video URL',
                            'name' => 'video_url',
                            'type' => 'url',
                        ],
                    ],
                ],
                // Step 2 Fields
                [
                    'key' => 'field_rxmile_step2_title',
                    'label' => 'Step 2 Title',
                    'name' => 'step2_title',
                    'type' => 'text',
                    'default_value' => 'Select your future features',
                ],
                [
                    'key' => 'field_rxmile_step2_intro',
                    'label' => 'Step 2 Introduction',
                    'name' => 'step2_intro',
                    'type' => 'textarea',
                    'default_value' => '<p>These features are part of <strong>The Pill<sup>TM</sup></strong> – our suite of upcoming innovations rolling out in phases starting Q1 2025.</p>
<p>While these features are not currently available in the platform, we\'re excited to hear your interest and feedback as we prioritize development throughout 2025. Sign up today to secure early access and take advantage of exclusive benefits when these features launch.</p>',
                ],
                // Step 3 Fields
                [
                    'key' => 'field_rxmile_step3_title',
                    'label' => 'Step 3 Title',
                    'name' => 'step3_title',
                    'type' => 'text',
                    'default_value' => 'Try RxMile Risk-Free',
                ],
                [
                    'key' => 'field_rxmile_step3_intro',
                    'label' => 'Step 3 Introduction',
                    'name' => 'step3_intro',
                    'type' => 'text',
                    'default_value' => 'Experience RxMile with a 30-day free trial—no upfront charges, no long-term commitment. Your card won\'t be billed until you\'ve had the chance to see the value we bring. Cancel anytime. We only succeed when you\'re happy!',
                ],
                [
                    'key' => 'field_rxmile_step3_sidebar_title',
                    'label' => 'Step 3 Sidebar Title',
                    'name' => 'step3_sidebar_title',
                    'type' => 'text',
                    'default_value' => 'Pharmacy Tier Structure Pricing',
                ],
                [
                    'key' => 'field_rxmile_step3_sidebar_features',
                    'label' => 'Sidebar Features Title',
                    'name' => 'step3_sidebar_features',
                    'type' => 'text',
                    'default_value' => 'RxMile Software Features & Support Services Included with most tiers:',
                ],
                [
                    'key' => 'field_rxmile_step3_sidebar_list',
                    'label' => 'Sidebar Feature List',
                    'name' => 'step3_sidebar_list',
                    'type' => 'textarea',
                    'default_value' => "Comprehensive Tech Support\nReal-Time Delivery Tracking\nAutomated Route Optimization\nSoftware Hosting & Maintenance\nSeamless Record Management\nDigital Signature & Proof of Delivery Storage\nPatient Communication Tools\nImage & Document Storage\nTier-Based Customization Options",
                    'instructions' => 'Enter each feature on a new line. These features will be displayed as a list in the sidebar.',
                ],

            ],
            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'rxmile_form',
                    ],
                ],
            ],
        ]);
    }
}
add_action('acf/init', 'rxmile_register_acf_fields');
