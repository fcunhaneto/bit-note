<?php ?>
		<header id="article-header-<?php the_ID(); ?>" class="panel-heading bit-note-panel-heading">
		<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
			<p class="author-meta hidden-sm hidden-xs">
				<span class="glyphicon glyphicon-user"></span>&nbsp;<?php the_author_posts_link(); ?>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="glyphicon glyphicon-calendar"></span>&nbsp;<time datetime="<?php echo the_time('Y-m-dTH:i'); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
			</p>
			<p class="author-meta hidden-lg hidden-md">
				<span class="glyphicon glyphicon-user"></span>&nbsp;<?php the_author_posts_link(); ?>
				&nbsp;&nbsp;&nbsp;&nbsp;
			</p>
			<p class="author-meta hidden-lg hidden-md">
				<span class="glyphicon glyphicon-calendar"></span>&nbsp;<time datetime="<?php echo the_time('Y-m-dTH:i'); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
			</p>
			<?php
				if (has_tag() ) { the_tags('<p class="tags-meta"><span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;', ', ', '</p>'); }
				if ( is_single() || is_page() ) { bit_note_social_media(); }
			?>
		</header>
