<?php while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'post-article', 'panel', 'panel-default', 'panel-single' ) ); ?>>
		<?php get_template_part( 'template-parts/content', 'header' ); ?>
		<div class="panel-body">
			<?php the_content(); ?>
			<div class="tutorial-nav">
				<?php tutorial_list_page( get_the_ID() ); ?>
			</div>
			<hr class="line-separator">
			<?php comments_template(); ?>
		</div>
	</article>
<?php endwhile; ?>
