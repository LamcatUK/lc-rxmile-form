<?php

function rxmile_register_post_type()
{
    register_post_type('rxmile_form', [
        'labels' => [
            'name' => __('RxMile Forms', 'rxmile'),
            'singular_name' => __('RxMile Form', 'rxmile'),
        ],
        'public' => true,
        'has_archive' => false,
        'rewrite' => [
            'slug' => 'signup',
            'with_front' => false,
        ],
        'supports' => ['title'],
        'show_in_rest' => true,
    ]);
}

add_action('init', 'rxmile_register_post_type');
