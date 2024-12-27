<?php
include plugin_dir_path(__FILE__) . '/header.php';

// Determine the current step
$current_step = isset($_GET['step']) ? sanitize_text_field($_GET['step']) : '1';

// Load the appropriate step
switch ($current_step) {
    case '1':
        include plugin_dir_path(__DIR__) . '/templates/step1.php';
        break;
    case '2':
        include plugin_dir_path(__DIR__) . '/templates/step2.php';
        break;
    case '3':
        include plugin_dir_path(__DIR__) . '/templates/step3.php';
        break;
    default:
        echo '<p>Invalid step.</p>';
}

include plugin_dir_path(__FILE__) . '/footer.php';
