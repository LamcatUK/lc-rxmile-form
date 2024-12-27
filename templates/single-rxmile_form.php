<?php
include plugin_dir_path(__FILE__) . '/header.php';

// Assuming this is the template for the form on specific pages like /signup/rx30/
$step = isset($_GET['step']) ? sanitize_text_field($_GET['step']) : 'step1'; // Default to step1

switch ($step) {
    case 'step1':
        include plugin_dir_path(__DIR__) . '/templates/step1.php';
        break;

    case 'step2':
        include plugin_dir_path(__DIR__) . '/templates/step2.php';
        break;

    case 'step3':
        include plugin_dir_path(__DIR__) . '/templates/step3.php';
        break;

    default:
        echo 'Invalid step';
        break;
}


include plugin_dir_path(__FILE__) . '/footer.php';
