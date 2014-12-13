<?php 
if (have_posts()): while (have_posts()) : the_post(); 
	
	echo blog_post();

endwhile; 	

wp_reset_query(); ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'automotive' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>

