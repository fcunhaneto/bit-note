<?php get_header(); ?>
		<section class="col-md-9 col-sm-12 eqheight-class eqheight-class fix-margin" role="main">
			<?php
				if ( have_posts() ) :
					get_template_part( 'template-parts/content' );
			 	else:
			?>
					<article id="post-0" <?php post_class( array( 'post-article', 'panel', 'panel-default' ) ); ?>>
						<header class="panel-heading bit-note-panel-heading article-search">
							<h2 id="header-search"><?php _e( 'Sorry we did not find what you were looking for.', 'bit-note' ); ?><h2>
						</header>
						<div class="panel-body article-search">
							<p><?php _e( 'How about performing a new search:', 'bit-note' ) ?></p>
							<?php bit_note_search_form(); ?>
							<p><?php _e( 'Or visit our ', 'bit note'); ?> <a href="<?php echo home_url()  ?>"> <?php _e('home page', 'bit-note') ?></a></p>
						</div>
					</article>
			<?php endif; ?>
		</section>
		<?php
			get_sidebar( 'right' );
			get_footer();
		?>
