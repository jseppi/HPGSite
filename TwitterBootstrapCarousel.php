<?php
/*
Plugin Name: Twitter Bootstrap Carousel
Plugin URI: 
Description: Use a shortcode in your post to signal that the attached images should be used as a carousel. Only works with hpgtheme2.
Version: 1.0.0
Author: James Seppi
Author URI: http://www.coseppi.com
License: GPL2
*/

//[carousel size="medium"]
function carousel_func( $atts ){
	extract( shortcode_atts( array(
		'size' => 'medium',
		'effect' => 'none'
	), $atts ) );
	
	$postID = get_the_id();
	$num = -1; 

	$sizes = array("thumbnail", "medium", "large", "full"); 
	if ( ! in_array( $size, $sizes ) ) { 
		$size = "medium"; 
	} 
	
	$effects = array("blind", "bounce", "clip", "drop", "explode", "fold", "highlight", "puff", "pulsate", "scale", "shake", "size", "slide"); 
	if ( ! in_array( $effect, $effects ) ) { 
		$effect = "none"; 
	} 
		
	$images = get_children( 
		array( 
			'post_parent' => $postID, 
			'post_type' => 'attachment', 
			'numberposts' => $num, 
			'order' => 'ASC', 
			'orderby' => 'ID', 
			'post_mime_type' => 'image'	
		)
	); 
	
	if ( !empty( $images ) ) { 
		// we've got some images ! 
		foreach ( $images as $image ) { 
			$attachmenturl = wp_get_attachment_url($image->ID); 
			$attachmentthumbsrc = wp_get_attachment_image_src( $image->ID, $size ); 
			$img_title = $image->post_title;
			$imagelocs[] = array( 
				"full" => $attachmenturl, 
				"thumb" => $attachmentthumbsrc[0], 
				"title" => $img_title, 
				"width" => $attachmentthumbsrc[1], 
				"height" => $attachmentthumbsrc[2]
			); 
		} 	
	} 
	
	$build = "<div id='jquery_image_carousel' "; 
	if ( $effect != "none" ) { 
		$build .= " class='jic-effect-{$effect}'"; 
	} 
	$build .= ">"; 
	$build .= "<ul>"; 
		foreach ( $imagelocs as $imageloc ) { 
			$build .= "<li><img src='{$imageloc['full']}' width='{$imageloc['width']}' height='{$imageloc['height']}' /><div class='caption'><h6>{$imageloc['title']}</h6></div></li>"; 
		} 	
	$build .= "</ul>"; 
	$build .= "<a href='#' class='jic_nav jic_previous'>Previous</a>"; 
	$build .= "<a href='#' class='jic_nav jic_next'>Next</a>";
	$build .= "</div>"; 
	
	return $build; 
}


add_shortcode( 'carousel', 'carousel_func' );