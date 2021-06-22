<?php get_header(); ?>
		<section class="col-md-9 col-sm-12 eqheight-class eqheight-class fix-margin" role="main">
			<?php get_template_part( 'template-parts/content' ); ?>
			<?php bit_note_posts_nav_link(); ?>
		</section>
		<?php get_sidebar( 'right' ); ?>
		<?php get_footer(); ?>
