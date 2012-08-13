
<?php
	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<!-- You can start editing here. -->
<div class="comments">
	<?php if ( ! comments_open() & is_single() )  : ?><p><?php _e( 'Comments are currently closed.', 'black_with_orange' ); ?></p><?php endif; ?>

	<?php if ($comments) : ?>
		<h3><?php comments_number(__('No Responses', 'black_with_orange'), __('One Response', 'black_with_orange'), '% '.__('Responses', 'black_with_orange') );?> to &#8220;<?php the_title(); ?>&#8221;</h3>
		<ul class="commentlist">
		<?php wp_list_comments(); ?>
		</ul>
	 <?php else : // this is displayed if there are no comments so far ?>
			<?php if ( comments_open() ) : ?>
			<!-- If comments are open, but there are no comments. -->
		 <?php else : // comments are closed ?>
			<!-- If comments are closed. -->
		<?php endif; ?>
	<?php endif; ?>

	<p><?php paginate_comments_links(); ?></p>
	<?php if ( comments_open() ) : ?><?php comment_form(); ?><?php endif; // if you delete this the sky will fall on your head ?>
</div>