<?php get_header(); ?>
		<section class="col-md-9 col-sm-12 eqheight-class eqheight-class fix-margin" role="main">
			<?php tutorial_list_page( get_the_ID() ); ?>
			<?php get_template_part( 'template-parts/content', 'tutorial' ); ?>
		</section>
		<?php
			get_sidebar( 'right' );
		 	get_footer();
		?>
