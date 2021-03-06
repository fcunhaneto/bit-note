<?php while ( have_posts() ) : the_post(); ?>
	<?php bit_note_nav_single(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'post-article', 'panel', 'panel-default', 'panel-single' ) ); ?>>
		<?php get_template_part( 'template-parts/content', 'header' ); ?>
		<div class="panel-body">
			<?php the_content(); ?>
			<?php bit_note_next_previous_post_link(); ?>
			<hr class="line-separator">
			<?php comments_template(); ?>
		</div>
	</article>
<?php endwhile; ?>
