<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
session_start();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <div class="container-xl d-flex flex-wrap gap-2 justify-content-between">
            <div class="header__logo">
                <img src="<?= plugin_dir_url(__DIR__) ?>assets/img/rxmile-logo.svg" alt="RxMile" width=386 height=97>
            </div>
            <?php
            if (get_field('partner_logo') ?? null) {
            ?>
                <div class="header__partners">
                    <h3 class="text-end">Preferred Partners Of</h3>
                    <div class="d-flex flex-wrap gap-2 justify-content-center align-items-center">
                        <?= wp_get_attachment_image(get_field('partner_logo'), 'large', false, array('alt' => get_field('partner_alt') ?? null)) ?>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </header>
    <main>
        <div class="container-xl pb-5">