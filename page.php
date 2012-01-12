<?php get_header(); ?>

<div id="inner">

	<?php include_once('ad-top.php'); ?>

	<div id="content">
		<?php
		if ( have_posts() ) {
			
			while ( have_posts() ) {
				the_post();
				?>
				<div class="entry" id="post-<?php the_ID(); ?>">
					<h1><?php the_title(); ?></h1>
					<p>
						<?php the_content('Read the rest of this entry &raquo;'); ?>
					</p>
				</div>
				<?php
				edit_post_link('Edit this entry.', '<p>', '</p>');
			}
			
		}
		?>
	</div>
</div>

<?php get_footer(); ?>