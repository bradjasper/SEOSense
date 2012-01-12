<?php get_header(); ?>

<div id="inner">

	<?php include_once('ad-top.php'); ?>

	<div id="content">
		<?php
		if ( have_posts() ) {
			
			the_post();
			?>
			<div class="entry" id="post-<?php the_ID(); ?>">

				<div class="ad-right">
					<?php include 'ad-single.php'; ?>
				</div>

				<h1><?php the_title(); ?></h1>
				<p>
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</p>

				<?php
				edit_post_link('Edit this entry.', '<p>', '</p>');
				?>
				<div id="extra">
					<strong><?php the_title(); ?></strong> was posted by <?php the_author(); ?>
					on <?php the_date(); ?> at <?php the_time(); ?>.
					It was categorized in <?php the_category(', '); ?>.
					There have been <?php comments_number('no comments', '1 comment', '% comments') ?>.
				</div>

			</div>
			<?php
			
		}

		comments_template();

		?>
	</div>
</div>

<?php get_footer(); ?>