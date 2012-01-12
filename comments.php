<?php
	// Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>

			<?php
			return;
		}
	}

?>

<!-- You can start editing here. -->

<?php
	if ($comments) {
	?>
		<h3 id="comments">
			<?php comments_number('No Comments', 'One Comments', '% Comments' );?>
			on &#8220;<?php the_title(); ?>&#8221;
		</h3>

	<ol class="commentlist">

		<?php
		foreach ($comments as $comment) {
			?>

		
			<li id="comment-<?php comment_ID() ?>">

				<div class="comment-content">
				
					<?php echo(nl2br(get_comment_text())); ?>
					
					<?php if ($comment->comment_approved == '0') { ?>
						<p><em>Your comment is awaiting moderation.</em></p>
					<?php } ?>


					<div class="comment-metadata">
						By <?php comment_author_link() ?> on 
						<a href="#comment-<?php comment_ID() ?>">
							<?php comment_date('F jS, Y') ?> at <?php comment_time() ?>
						</a><?php edit_comment_link('edit','&nbsp;-&nbsp;',''); ?>
					</div>
				</div>

				<br clear="all" />
			</li>
			<?php 
		}
		?>

	</ol>

	<?php

	} else {
		
		if ('open' == $post->comment_status) {

			?>
			<p class="nocomments">There are no comments on this entry.</p>
			<?php

		} else {
			?>
			<p class="nocomments">Comments are closed.</p>
			<?php
		}
	}
	
	if ('open' == $post->comment_status) {
		?>

		<h3 id="respond">
			Post a comment to "<?php the_title(); ?>"
		</h3>

		<?php
		if ( get_option('comment_registration') && !$user_ID ) {
			?>
			<p>You must be 
				<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a>
				to post a comment.
			</p>
			<?php
		} else {
			?>
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

			<?php if ( $user_ID ) { ?>

				<p class="comment-info"">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>

			<?php } else { ?>

				<p>
					<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
					<label for="author">
						<small>Name <?php if ($req) echo "(required)"; ?></small>
					</label>
				</p>
				
				<p>
					<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
					<label for="email">
						<small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small>
					</label>
				</p>

				<p>
					<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
					<label for="url">
						<small>Website</small>
					</label>
				</p>
			<?php 
			}
		?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

		<p>
			<textarea name="comment" id="comment" cols="55" rows="7" tabindex="4"></textarea>
		</p>

		<p>
			<input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
			<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
		</p>
		
		<?php do_action('comment_form', $post->ID); ?>

	</form>
	
	<?php
	}
}

?>