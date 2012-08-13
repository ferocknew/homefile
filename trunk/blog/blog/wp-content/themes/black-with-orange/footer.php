			</div>
	</div>

	<div class="footer">
		<div>
			<?php wp_nav_menu( array('fallback_cb' => 'blog_page_menu', 'container' => false, 'menu' => 'secondary', 'depth' => '1', 'theme_location' => 'secondary', 'link_before' => '', 'link_after' => '') ); ?>
			<p><?php bloginfo('name');?></p>
			<p class="powered"><?php _e('Powered by', 'black_with_orange'); ?> <a href="http://ugesi.de/">Ugesi</a>. Powered by <a href="http://wordpress.org/">WordPress</a>. </p>
			<?php wp_footer(); ?>
		</div>
	</div>
	<?php wp_footer(); ?>
</body>
</html>