<div id="sidebar">
	<h3>Pages</h3>
	<ul>
		<?php wp_list_pages('title_li='); ?>
	</ul>
	<h3>Categories</h3>
	<ul>
		<?php wp_list_cats('title_li=&show_count=1'); ?>
	</ul>
	<h3>Blogs I Read</h3>
	<ul>
		<?php wp_list_bookmarks('categorize=0&title_li='); ?>
	</ul>
	<h3>Archives</h3>
	<ul>
		<?php wp_get_archives(''); ?>
	</ul>
	<h3>Site Links</h3>
	<ul>
		<?php wp_register(); ?>
		<li><?php wp_loginout(); ?></li>
		<?php wp_meta(); ?>
	</ul>
</div>