		<?php get_sidebar(); ?>

		<br clear="all" />

		<div id="header">
			<div class="left">
				<a href="<?php echo get_option('home'); ?>/">
					<?php bloginfo('name'); ?>
				</a>
				<span>
					<?php bloginfo('description'); ?>
				</span>
			</div>

			<div id="header-extras">
				<a href="<?php bloginfo('rss2_url'); ?>">
					<img src="<?php bloginfo('template_url'); ?>/images/feed-icon-28x28.png" />
				</a>
				<?php require_once TEMPLATEPATH . '/searchform.php'; ?>
			</div>
		</div>

		<div id="footer">
			<span class="left">
				&copy; <?php bloginfo('name'); ?>
			</span>
			<span class="right">
				<a href="http://www.bradjasper.com" title="Web Development">SEOsense by Brad Jasper</a>
			</span>
		</div>

		
	</div>
</body>
</html>