<?php bit_note_nav_pages() ?>
<?php while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'post-article', 'panel', 'panel-default' ) ); ?>>
		<?php get_template_part( 'template-parts/content', 'header' ); ?>
		<div class="panel-body">
			<?php the_excerpt(); ?>
		</div>
	</article>
<?php endwhile; ?>
