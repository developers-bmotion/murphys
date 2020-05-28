<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$menus = codeless_js_object_to_array( $menus ); 

$the_query = new WP_Query( array( 'post__in' => $menus, 'post_type' => 'restaurant_menu', 'posts_per_page' => 9999 ) );

?>

<div class="cl_menu_tabbed <?php echo esc_attr( $this->generateClasses('.cl_menu_tabbed') ) ?> cl-element" <?php $this->generateStyle('.cl_menu_tabbed', '', true) ?> >
	<div class="white-bg"></div>
	<div class="container">
		<div class="row">
			<div class="single-menu-container col-sm-6">
				<?php
			                                
			    // Loop counter
			    $i = 0;
			    codeless_loop_counter($i);

			    // Start loop
			    if ( is_object($the_query) && $the_query->have_posts() ) :
			    	
				    while ( $the_query->have_posts() ) : $the_query->the_post();
				        
				        codeless_loop_counter(++$i);
				        $active = '';

				        if( $i == 1 )
				        	$active = 'active';
				                                    
				        ?>

				        <div class="single-menu <?php echo esc_attr( $active ) ?>" id="cl_single_menu_<?php echo esc_attr( get_the_ID() ) ?>">

				        	<?php 

				        		$content 	= get_the_content();

								echo apply_filters('the_content', $content );

				        	?>
				            
				        </div>

				        <?php
				            
				    // End loop
				   endwhile; 
				     wp_reset_postdata();

				endif;
			    
			    ?>
			</div><!-- .single-menu-container -->


			<div class="tabs-container col-sm-4 col-sm-offset-2">
				<?php
			                                
			    // Loop counter
			    $i = 0;
			    codeless_loop_counter($i);
			    

			    $the_query = new WP_Query( array( 'post__in' => $menus, 'post_type' => 'restaurant_menu', 'posts_per_page' => 9999999 ) );                            
			    // Start loop
			    if ( is_object($the_query) && $the_query->have_posts() ) :
			    	while ( $the_query->have_posts() ) : $the_query->the_post();
			        
			        codeless_loop_counter(++$i);

			        $active = '';

				    if( $i == 1 )
				        $active = 'active';
			                                  
			        ?>

			        <div class="single-menu-tab <?php echo esc_attr($active) ?>" data-id="<?php echo esc_attr( get_the_ID() ) ?>">

			        	<?php 

			        		$excerpt 	= get_the_excerpt();
			        		$title  	= get_the_title();
			        		$img		= wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

			        	?>
			        	<img src="<?php echo esc_url( $img[0] ) ?>" alt="<?php esc_attr_e( 'Menu Tab', 'picante' ) ?>" />
			        	<div class="desc">
			        		<h3><a href="#"><?php echo esc_html( $title ) ?></a></h3>
			        		<p><?php echo esc_html( $excerpt ) ?></p>
			        	</div>
			        	
			           

			        </div>

			        <?php
			            
			    // End loop
			    	endwhile; 

			   		wp_reset_postdata();

			   	endif;
			    
			    ?>
			</div>
		</div>
	</div>

</div><!-- .cl_menu_tabbed -->