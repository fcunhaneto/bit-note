<?php get_header(); ?>
		<section class="col-md-9 col-sm-12 eqheight-class eqheight-class fix-margin" role="main">
			<?php get_template_part( 'template-parts/content', 'single' ); ?>
		</section>
		<?php
			get_sidebar( 'right' );
			get_footer();
		?>
