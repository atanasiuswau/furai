<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" <?php language_attributes(); ?>> <![endif]-->
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title('|', true, 'right'); ?></title>

  <?php wp_head(); ?>

  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
</head>
