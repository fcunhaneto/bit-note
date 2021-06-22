<?php
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- title -->
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

    <?php wp_head() ?>
</head>

<body <?php body_class(); ?>>
    <div class="top hidden-xs hidden-sm" role="button"></div>
    <div class="wrap-center">
        <nav class="navbar navbar-default navbar-fixed-top fnc-nav-bar-default" role="navigation" name="navbar">
            <div class="wrap-nav">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#target-menu-header">
                                <span class="sr-only glyphicon glyphicon-menu-hamburger">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                    <a class="navbar-brand hidden-lg hidden-md" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="target-menu-header">
                        <?php echo wp_nav_menu( array(
                            'menu'              => 'primary',
                            'theme_location'    => 'primary',
                            'depth'             => 2,
                            'container'         => '',
                            'container_class'   => '',
                            'container_id'      => '',
                            'menu_class'        => 'nav navbar-nav',
                            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'            => new WP_Bootstrap_Navwalker())
                            );
                        ?>
                        <div class="navbar-form navbar-right">
                            <?php get_search_form(); ?>
                        </div>
                </div>
            </div>
        </nav>     <!-- end navbar header -->
        <header name="navbar" class="branding center-block hidden-sm hidden-xs" style="background-image: url(<?php header_image(); ?>);"role="banner">
            <hgroup>
                <h1 class="branding center-block hidden-sm hidden-xs" role="banner">
                    <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
                </h1>
                <h2 id="site-description"><?php bloginfo('description'); ?></h2>
            </hgroup>
        </header>    <!-- end brand header -->
    </div>    <!-- end header -->

    <div id="eqheight-id" class="container">
        <div class="row">
            <div class="eqheight-class espiral"></div>
            <section class="col-md-9 col-sm-12 eqheight-class eqheight-class fix-margin" role="main">
                <?php if ( !have_posts() ) : ?>
                	<article id="post-0" <?php post_class(array( 'post-article', 'panel', 'panel-default', 'fix-first-article-margin-top')); ?>>
	                    <header id="article-header-<?php the_ID(); ?>" class="panel-heading bit-note-panel-heading">
	                       	<h3><?php _e('Sorry we could not find the page you were looking for', 'bsimple')?></h3>
	                    </header>
	                    <div class="panel-body">
	                    	<h4><?php _e( 'How about performing a search', 'bit-note' ); ?></h4>
	                		<?php bsimple_search_form(); ?>
	                	</div>
	                </article>
				<?php else : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php if ( is_page() ) : ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class(array( 'post-article', 'panel', 'panel-default')); ?>>
								<?php get_template_part( 'template-parts/content', 'header' ); ?>
								<div class="panel-body">
									<?php the_content(); ?>
								</div>
								<?php bit_note_next_previous_post_link(); ?>
								<hr class="line-separator">
								<?php comments_template(); ?>
							</article>
                        <?php elseif ( is_single() ) : ?>
                           <article id="post-<?php the_ID(); ?>" <?php post_class( array( 'post-article', 'panel', 'panel-default', 'panel-single' ) ); ?>>
								<?php get_template_part( 'template-parts/content', 'header' ); ?>
								<div class="panel-body">
									<?php the_content(); ?>
									<nav class="next_previous">
										<?php previous_post_link('%link', '&laquo;&nbsp;Previous Post'); ?> &bull;
										<?php next_post_link('%link', 'Next Post&raquo;&nbsp;'); ?>
									</nav>
									<hr class="line-separator">
									<?php comments_template(); ?>
								</div>
							</article>
                        <?php else: ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class( array( 'post-article', 'panel', 'panel-default' ) ); ?>>
								<?php get_template_part( 'template-parts/content', 'header' ); ?>
								<div class="panel-body">
									<?php the_excerpt(); ?>
								</div>
							</article>
                        <?php endif; ?>
                    <?php endwhile; ?>
                    <?php
                    	if( is_single() || is_page() ) :
                    		?>
                    		<div class="previous hidden-xs hidden-sm">
								<?php previous_post_link( '%link', '<img src="' . get_template_directory_uri() . '/images/previous.png' . '"/>' ); ?>
							</div>
							<div class="next hidden-xs hidden-sm">
								<?php next_post_link( '%link', '<img src="' . get_template_directory_uri() . '/images/next.png' . '"/>' ); ?>
							</div>
							<?php
                    	else :
                    		?>
                    		<div class="previous hidden-xs hidden-sm">
								<?php next_posts_link( '<img src="' . get_template_directory_uri() . '/images/previous.png' . '"/>' ); ?>
							</div>
							<div class="next hidden-xs hidden-sm">
								<?php previous_posts_link( '<img src="' . get_template_directory_uri() . '/images/next.png' . '"/>'); ?>
							</div>
							<?php
						endif;
                    ?>
                <?php endif; ?>
            </section>    <!-- end articles -->
            <aside class="sidebar col-md-3 hidden-xs hidden-sm eqheight-class">
                <?php dynamic_sidebar('sidebar-right-widgets'); ?>
            </aside>    <!-- end sidbar -->
        </div>    <!-- end row -->
    </div>    <!-- end container -->

    <footer class="wrap-center footer-page">
        <div class="container">
            <div class="row">
                <div class="footer-left col-md-3"><?php dynamic_sidebar( 'footer-left-widget' ); ?></div>
                <div class="footer-center-left col-md-3"><?php dynamic_sidebar( 'footer-center-left-widget' ); ?></div>
                <div class="footer-center-right col-md-3"><?php dynamic_sidebar( 'footer-center-right-widget' ); ?></div>
                <div class="footer-right col-md-3"><?php dynamic_sidebar( 'footer-right-widget' ); ?></div>
            </div>
        </div>
    </footer>    <!-- end footer -->
<?php wp_footer(); ?>
</body>
</html>
