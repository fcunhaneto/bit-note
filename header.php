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
    <?php bit_note_include_facebook_script(); ?>
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
                    <form class="navbar-form navbar-right" action="<?php home_url ( '/' ); ?>" role="search">
                        <div class="input-group">
                            <span id="search" class="input-group-addon"><span class=" glyphicon glyphicon-search"></span></span>
                		    <input class="form-control" type="text" value="" name="s" id="s" aria-describedby="search" placeholder=""/>
                        </div>
                    </form>
                </div>
            </div>
        </nav>     <!-- end navbar header -->
        <header name="navbar" class="branding hidden-sm hidden-xs" role="banner">
            <hgroup>
                <h1 class="hidden-sm hidden-xs" role="banner">
                    <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
                </h1>
                <h2><?php bloginfo('description'); ?></h2>
            </hgroup>
        </header>    <!-- end brand header -->
    </div>    <!-- end header -->
    <div id="eqheight-id" class="container">
        <div class="row">
            <div class="eqheight-class espiral"></div>
