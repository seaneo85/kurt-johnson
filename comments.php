<div class="comments">
	<?php if (post_password_required()) : ?>
	<p><?php _e( 'Post is password protected. Enter the password to view any comments.', 'automotive' ); ?></p>
</div>

	<?php return; endif; ?>

<?php if (have_comments()) : ?>

	<h3 id="comments-number"><?php comments_number(); ?></h3>

	<ul class="comments_list">
		<?php 
		$args = array("type"         => "comment",
					  "callback"     => "automotive_comments",
					  "avatar_size"  => 180,
					  "end-callback" => null,
					  "per_page"     => 5);
		
		wp_list_comments($args); ?>
	</ul>
    
    <ul class="pagination">
    <?php
	
	$pages = paginate_comments_links(array(
		'prev_text' => __('<i class="fa fa-angle-left"></i>'),
		'next_text' => __('<i class="fa fa-angle-right"></i>'),
		'echo'		=> false,
		'type'		=> 'array',
		'current'   => ( get_query_var( 'cpage' ) ) ? get_query_var( 'cpage' ) : 1
	)); 
	
	if(!empty($pages)){
		foreach($pages as $page){
			echo "<li>" . $page . "</li>";
		}
	}
	?>
	</ul>
    
<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

	<p><?php _e( 'Comments are closed here.', 'automotive' ); ?></p>

<?php endif; ?>

<?php automotive_commentform(); ?>

</div>
