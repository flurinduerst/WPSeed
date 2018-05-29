<?
/**
 * @author      Flurin Dürst
 * @version     1.6.0
 * @since       WPSeed 0.1
 */
?>
<!DOCTYPE html>
<html <? language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, initial-scale=1, user-scalable=no">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <!--=== OPEN-GRAPH TAGS ===-->
    <? wpseed_load_ogtags() ?>
    <!--=== FONTS ===-->
    <? wpseed_load_fonts() ?>
    <!--=== WP HEAD ===-->
    <? wp_head(); ?>
  </head>

  <body>
      <div class="top">
        <a href="<?= get_bloginfo('url'); ?>">
          <div class="logo"></div>
        </a>
        <button class="hamburger--squeeze" id="hamburger" type="button">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
        <nav id="nav_main" class="hiddenmobile">
          <?
            wp_nav_menu([
              'menu_class'=> false,
              'menu_id' => false,
              'container'=> false,
              'depth' => 1,
              'theme_location' => 'mainmenu'
            ]);
          ?>
        </nav>

      </div>
