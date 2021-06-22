<?php get_header(); ?>
<div id="eqheight-id" class="container">
	<div class="row">
		<div class="eqheight-class espiral"></div>
		<section class="col-md-9 col-sm-12 eqheight-class eqheight-class fix-margin" role="main">
			<article <?php post_class(array( 'post-article', 'panel', 'panel-default', 'fix-first-article-margin-top')); ?>>
				<header class="panel-heading bit-note-panel-heading article-search">
					<h2 id="header-404">404 <small>error</small><h2>
				</header>
				<div class="panel-body article-search">
					<p><?php _e('Sorry we could not find the page you were looking for.', 'bsimple')?><p>
					<p><?php _e( 'How about performing a search:', 'bit-note' ) ?></p>
					<?php bit_note_search_form(); ?>
				</div>
			</article>
		</section>
		<?php get_sidebar('right'); ?>
		<?php get_footer(); ?>
