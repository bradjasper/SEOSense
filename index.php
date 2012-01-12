<?php get_header(); ?>

<div id="inner">

	<?php include_once('ad-top.php'); ?>

	<div id="content">
		<?php
		if ( have_posts() ) {

			$numPosts = 0;
			
			while ( have_posts() ) {
				the_post();
				?>
				<div class="entry" id="post-<?php the_ID(); ?>">
					<h1>
						<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
					</h1>
					<span>
						Posted in <?php the_category(', ');
						echo(" - ");
						comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;');
						?>
					</span>
					<p>
						<?php the_content('Read the rest of this entry &raquo;'); ?>
					</p>

					<br clear="all" />
				</div>
				<?php

				betweenPosts(++$numPosts);
			}
			
		}
		?>
			
		<div id="prevnext">
			<div class="left"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="right"><?php previous_posts_link('Next Entries &raquo;') ?></div>
			<br clear="all" />
		</div>

	</div>
</div>

<?php get_footer(); ?>