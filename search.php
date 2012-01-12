<?php get_header(); ?>

<div id="inner">

	<?php include_once('ad-top.php'); ?>

	<div id="content">
		<?php
		if ( have_posts() ) {

			?>
			<div id="searchhead">Search For "<?php the_search_query(); ?>"</div>
			<?php
			
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
				</div>
				<?php
			}
			
		}
		?>
	</div>
</div>

<?php get_footer(); ?>