<?php
/**
 * This is a preset Gutenberg-block to have a starting point for custom ACF-Blocks.
 * included in functions/functions-gutenberg.php
 * Requires ACF Version 5.8+
 *
 * @author      Flurin Dürst
 * @version     1.0.0
 * @since       WPSeed 2.0.0
 *
 *
 */



 /*==================================================================================
   Employees, Preset ACF Gutenberg Block
 ==================================================================================*/

 /* Register ACF Block
 /––––––––––––––––––––––––*/
 if( function_exists('acf_register_block') ) {

 	$result = acf_register_block(array(
 		'name'				     => 'employees',
 		'title'				     => __('Mitarbeiter'),
 		'description'		   => __('Custom Block für Mitarbeiter'),
 		'render_callback'	 => 'WPSeed_Gutenblock_Employees',
 		'category'		     => 'common', // common, formatting, layout, widgets, embed
 		'icon'			       => 'admin-users',
 		'keywords'		     => ['employee', 'mitarbeiter', 'worker']
 	));
 }

 /* Render Block
 /––––––––––––––––––––––––*/
 function WPSeed_Gutenblock_Employees() {

 	// Get Vars
 	$name = get_field('name');
 	$image = get_field('image');
 	$title = get_field('title');
 	$email = get_field('email');

  // Return HTML
 	?>
 	<div class="employee">
     <? echo wp_get_attachment_image( $image['ID'], 'thumbnail', "", ['class' => 'modernizr-of']); ?>
     <p><b><?= $name ?></b></p>
     <p><?= $title ?></p>
     <p><a href="mailto:<?= $email ?>"><?= $email ?></a></p>
   </div>
 	<?

 }
