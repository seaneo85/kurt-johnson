<?php get_header(); ?>
    
    <?php $sidebar       = get_post_meta(get_current_id(), "sidebar", true); 
		
		  $classes       = content_classes($sidebar);

		  $content_class = $classes[0];
		  $sidebar_class = (isset($classes[1]) && !empty($classes[1]) ? $classes[1] : ""); ?>
    
            <div class="inner-page row wp_page<?php echo (isset($sidebar) && !empty($sidebar) ? " is_sidebar" : " no_sidebar"); ?>">

            	<div class="pull-right"><?php do_action('currency_switcher', array('format' => '%name (%symbol)')); ?></div>

            	<div id="post-<?php echo get_current_id(); ?>" <?php echo "class='" . $content_class . " page-content post-entry'"; ?>>
                
            		<?php woocommerce_content(); ?>
                    
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

<?php get_footer(); ?>