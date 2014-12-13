<?php get_header(); ?>
    
    <?php if (have_posts()): while (have_posts()) : the_post(); 
		
		$sidebar       = get_post_meta(get_current_id(), "sidebar", true); 
		
		$classes       = content_classes($sidebar);

		$content_class = $classes[0];
		$sidebar_class = (isset($classes[1]) && !empty($classes[1]) ? $classes[1] : ""); ?>
    
            <div class="inner-page row wp_page<?php echo (isset($sidebar) && !empty($sidebar) ? " is_sidebar" : " no_sidebar"); ?>">
            	<!-- <div class="<?php echo $content_class; ?> page-content"> -->
            	<div id="post-<?php the_ID(); ?>" <?php echo post_class($content_class . " page-content post-entry"); ?>>
                
            		<?php the_content(); ?>

					<?php wp_link_pages( array('before' => '<p class="margin-top-20">' . __( 'Pages:' ), 'after' => '</p>') ); ?>                    
            	</div>
                
                <?php // sidebar 
					if(isset($sidebar) && !empty($sidebar) && $sidebar != "none"){
						echo "<div class='" . $sidebar_class . " sidebar-widget side-content'>";
						dynamic_sidebar('blog-widget');
						echo "</div>";
					}					
				?>
            </div>
        </div>
        <!--container ends--> 
    
    <?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'automotive' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

<?php get_footer(); ?>
