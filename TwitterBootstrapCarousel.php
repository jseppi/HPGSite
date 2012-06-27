<?php

	$postID = get_the_id();
	$num = -1; 
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
			$attachmentthumbsrc = wp_get_attachment_image_src( $image->ID, "medium" ); 
			$img_title = $image->post_title;
			$img_caption = $image->post_excerpt;
			$img_desc = $image->post_content;
			$imagelocs[] = array( 
				"full" => $attachmenturl, 
				"thumb" => $attachmentthumbsrc[0], 
				"title" => $img_title, 
				"caption" => $img_caption,
				"desc" => $img_desc,
				"width" => $attachmentthumbsrc[1], 
				"height" => $attachmentthumbsrc[2]
			); 
		} 	
	} 

	$build = "<div id='main-carousel' class='carousel slide'>";
	$build .= "<div class='carousel-inner'>";

	$first = true;
	foreach ($imagelocs as $imageloc){
		if ($first) {
			$build .= "<div class='item active'>";
			$first = false;
		}
		else {
			$build .= "<div class='item'>";
		}

		$build .= "<img src='{$imageloc['full']}' alt='{$imageloc['title']}'/>";
		$build .= "<div class='carousel-caption'>";
		$build .= "<h4>{$imageloc['title']}</h4>";
		$build .= "<p>{$imageloc['caption']}</p>"; #or should use desc instead?
		$build .= "</div>"; #end carousel-caption

		$build .= "</div>"; #end item
		
	}


	$build .= "</div>"; //end carousel-inner
	$build .= "<a class='carousel-control left' href='#main-carousel' data-slide='prev'>&lsaquo;</a>";
	$build .= "<a class='carousel-control right' href='#main-carousel' data-slide='next'>&rsaquo;</a>";
	$build .= "</div>"; //end main-carousel

	echo $build;
	
	
}

?>