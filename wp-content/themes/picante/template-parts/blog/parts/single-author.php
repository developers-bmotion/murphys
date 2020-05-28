<?php
/**
 * Blog Template Part for displaying single blog author
 * Share tools and Post Tags
 *
 * @package picante
 * @subpackage Blog Parts
 * @since 1.0.0
 *
 */

?>



	<?php

	global $post;

	// Detect if it is a single post with a post author
	if( isset( $post->post_author ) ) {

		$author_details = '';

		// Get author's display name 
		$display_name = get_the_author_meta( 'display_name', $post->post_author );

		// If display name is not available then use nickname as display name
		if ( empty( $display_name ) )
		$display_name = get_the_author_meta( 'nickname', $post->post_author );

		// Get author's biographical information or description
		$user_description = get_the_author_meta( 'user_description', $post->post_author );
		if( empty( $user_description ) ){
			return;
		}


		?>

		<div class="single-author">


		<?php


		// Get author's website URL 
		$user_website = get_the_author_meta('url', $post->post_author);

		// Get link to the author archive page
		$user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));
		 
		


		$author_details .= '<div class="author_wrapper">';

			// Author avatar
			$author_details .= '<div class="author_avatar">' . get_avatar( get_the_author_meta('user_email') , 100 ) . '</div>';
			// Author Bio
			$author_details .= '<div class="author_content">';

				if ( ! empty( $display_name ) )
					$author_details .= '<h3 class="author_name">' . $display_name . '</h3>';

				$author_details .= '<div class="bio">' . nl2br( $user_description ) . '</div>';

				$author_details .= '<p class="author_links"><a href="'. esc_url( $user_posts ) .'">'.esc_html_e('View all posts by', 'picante' ) .' ' . $display_name . '</a>';  

				// Check if author has a website in their profile
				if ( ! empty( $user_website ) ) {

					// Display author website link
					$author_details .= ' | <a href="' . esc_url( $user_website ) .'" target="_blank" rel="nofollow">'.esc_html_e('Website', 'picante' ).'</a></p>';

				} else { 
					// if there is no author website then just close the paragraph
					$author_details .= '</p>';
				}

			$author_details .= '</div>';

		$author_details .= '</div>';

		// Pass all this info to post content  
		echo codeless_complex_esc( $author_details );

		?>
		
		</div>
	
		<?php
	}

	?>
