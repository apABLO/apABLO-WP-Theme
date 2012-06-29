<?php // Do not delete these lines
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

	/* This variable is for alternating comment background */
	$oddcomment = 'alt';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
	<h3 id="comments-count"><?php comments_number('Sin comentarios', 'Un comentario', '% comentarios' );?> en &#8220;<?php the_title(); ?>&#8221;</h3>

	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>

		<li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
			<span class="comment-gravatar"><?php echo get_avatar(get_the_author_meta('user_email'), $size = '80'); ?></span>
			<span class="comment-author"><?php comment_author_link() ?></span> dijo:
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Tu comentario esta a la espera de moderacion.</em>
			<?php endif; ?>

			<div class="comment-text"><?php comment_text() ?><div class="clear"></div></div>

			<small class="commentmetadata">Puesto el <a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('j \d\e F \d\e Y') ?> a las <?php comment_time() ?></a> <?php edit_comment_link('editar comentario','',''); ?></small>

		</li>

	<?php /* Changes every other comment to a different class */
		if ('alt' == $oddcomment) $oddcomment = '';
		else $oddcomment = 'alt';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Los comentarios estan cerrados.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<div id="respond">

<h3 id="comment-form-title">Escribe un comentario</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Debes estar <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logueado</a> para poner un comentario.</p>

</div><!-- #respond -->
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Logueado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Desconectarse de esta cuenta">Desconectarse &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small>Nombre <?php if ($req) echo _e('required'); ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small>Mail (no sera publicado) <?php if ($req) echo _e('required'); ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Website</small></label></p>

<?php endif; ?>

<p><textarea name="comment" id="comment" cols="60" rows="10" tabindex="4"></textarea></p>

<!-- <p><strong>If your comment is a support question, please post it at the <a href="http://www.wpdesigner.com/forums/" title="Support Forums">forums</a>.</strong></p> -->

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Enviar comentario" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

</div><!-- #respond -->

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
