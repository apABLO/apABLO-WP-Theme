<?php get_header(); ?>

<div id="content">
	<?php if (have_posts()) : ?>
		<div class="navigation"><?php next_post_link('&laquo;&laquo; %link'); ?> &nbsp; <?php previous_post_link('%link &raquo;&raquo;'); ?></div>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post">
			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<div class="entry-date"><?php the_time('j \d\e F \d\e Y'); ?></div>
			<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
				<?php edit_post_link('Editar', '<p>', '</p>'); ?>
			</div>
			<div class="entry-meta">Escrito por <?php the_author(); ?>. Puesto en <?php the_category(', '); ?>.</div>
		</div>
		<?php endwhile;?>
		<div class="navigation"><?php next_post_link('&laquo;&laquo; %link'); ?> &nbsp; <?php previous_post_link('%link &raquo;&raquo;'); ?></div>
	<?php else: ?>
		<div class="post">
			<div class="entry-content">
				<p>No se encontro ningun post.</p>
			</div>
		</div>
	<?php endif;?>
	<div id="comments">
		<!-- comentarios -->
		<?php comments_template(); ?>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>