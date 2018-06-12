<?
/**
 * @author      Flurin Dürst
 * @version     1.7.0
 * @since       WPSeed 0.1
 */
?>
<!DOCTYPE html>
<html <? language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, initial-scale=1">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <? WPSeed_gtm('head') ?>
    <!--=== OPEN-GRAPH TAGS ===-->
    <? WPSeed_ogtags() ?>
    <!--=== PRELOAD FONTS ===-->
    <? WPSeed_preload_fonts() ?>
    <!--=== WP HEAD ===-->
    <? wp_head(); ?>
  </head>

  <body>
    <? WPSeed_gtm('body') ?>

    <header>

      <nav>

        <a href="<?= get_bloginfo('url'); ?>">
          <div class="logo"></div>
        </a>

        <!-- DESKTOP NAV -->
          <?
            // make sure there's a menu placed at 'mainmenu' or a div will be created by WP
            wp_nav_menu([
              'menu_class'=> 'hidden_mobile',
              'menu_id' => 'menu_main',
              'container'=> false,
              'depth' => 1,
              'theme_location' => 'mainmenu'
            ]);
          ?>
        <!-- </nav> -->

        <!-- MOBILE NAV (BURGER) -->
        <button class="hamburger--squeeze" id="hamburger" type="button">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>

      </div>

    </header>
