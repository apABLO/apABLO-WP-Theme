<div id="sidebar">
	<ul>
		<li id="search">
			<form method="get" id="searchform" action="<?php bloginfo('home'); ?>">
				<div>
				<input type="text" value="<?php wp_specialchars($s, 1); ?>" name="s" id="s" size="15" />
				<input type="submit" id="searchsubmit" value="<?php _e('Search'); ?>" />
				</div>
			</form>
		</li>
		<?php wp_list_pages('title_li=<h2>Páginas</h2>'); ?>

		<?php wp_list_categories('title_li=<h2>Categorias</h2>'); ?>

		<li id="archives"><h2>Archivos</h2>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
		</li>

		<?php wp_list_bookmarks(); ?>

		<li id="rss-links"><h2>RSS Feeds</h2>
			<ul>
				<li><a href="<?php bloginfo('rss2_url'); ?>" title="Suscribete a los Posts!">Suscribete a los posts!</a></li>
				<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="Suscribete a los Comentarios!">Suscribete a los comentarios!</a></li>
			</ul>
		</li>
	</ul>
</div>