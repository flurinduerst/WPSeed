<?
/**
 * @author      Flurin Dürst
 * @version     1.3
 * @since       WPSeed 0.1
 */
?>
<!DOCTYPE html>
<html <? language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, initial-scale=1, user-scalable=no">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <!--===== OPEN-GRAPH TAGS =====-->
    <meta property="og:title" content="<? bloginfo('name'); ?>">
    <meta property="og:description" content="<? bloginfo('description'); ?>">
    <meta property="og:url" content="<? bloginfo('url'); ?>">
    <meta property="og:image" content="<? bloginfo('template_url') ?>/dist/images/ogimg.jpg">
    <meta property="og:image:width" content="">
    <meta property="og:image:height" content="">
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
          <ul>
          <? $frontPageID = get_option('page_on_front') ?>
          <? wp_list_pages([
      				'depth' => 1,
      				'sort_column' => 'menu_order',
      				'title_li' => '',
      				'exclude' => $frontPageID
      			]);
          ?>
          </ul>
        </nav>
      </div>
