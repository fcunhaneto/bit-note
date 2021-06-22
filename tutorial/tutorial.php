<?php
/**
 * Include tutorial pages (menu-order = 0) in home page loop.
 * 
 * @param basic wp-query $query
 * @return unknown
 */
function tutorial_in_home_loop( $query ) {
	if ( is_home() && $query->is_main_query() ) {
		$query->set( 'post_type', array( 'post', 'tutorial' ) );
		$query->set( 'post_parent', 0 );
	} elseif ( is_category() ) {
		$post_type = get_query_var( 'post_type' );
		if ( $post_type )
			$post_type = $post_type;
			else {
				$query->set( 'post_type', array( 'nav_menu_item', 'post', 'tutorial' ) ); // don't forget nav_menu_item to allow menus to work!
				$query->set( 'orderby', 'menu_order' );
				$query->set( 'order', 'DESC' );
			}
	}

	return $query;
}
add_filter( 'pre_get_posts', 'tutorial_in_home_loop' );

/**
 * Include tutorial pages (menu-order = 0) in rss page loop.
 * @param unknown $qv
 * @return string[]
 */
function tutorial_request( $qv ) {
	if ( isset( $qv['feed']) && !isset($qv['post_type'] ) )
		$qv['post_type'] = array( 'post', 'tutorial' );
		return $qv;
}
add_filter('request', 'tutorial_request');

/**
 * Create a browser for tutorial pages. This is included at the top of the 
 * article and at the end of the article.
 * 
 * @param post id $id
 */
function tutorial_list_page( $id ) {
	$id_p = get_post_meta( $id, 'id_p', true );
	$assunto = get_post_meta( $id_p, 'assunto', true );
	if ( $id_p ) {
		?>
		<nav class="list-tutorial correct-margin">
		<h4>Esta página é parte de uma série chamada: <?php echo $assunto; ?> </h4>
		<ol class="breadcrumb">
		<?php
		$args = array (
			'posts_per_page' => 20,
			'post_type'	=> array( 'tutorial' ),
			'order'     => 'ASC',
			'orderby'   => 'menu_order',
			'meta_key' => 'assunto',
			'meta_value' => $assunto
		);
	
		$tutorial = new WP_Query( $args );
	
		while ( $tutorial->have_posts() ) {
			$tutorial->the_post();
			$id_q = get_post_meta( get_the_ID(), 'id_p', true );
			if ($id_q == $id_p){
				if ( $id == get_the_ID() ){
		?>
					<li class="list-tutorial-disable"><?php the_title() ?></li>
		<?php
				} else {
		?>
					<li class="list-tutorial"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title() ?></a></li>
		<?php
				}
			}
		}
		?>
			</ol>
		</nav>
	<?php
		tutorial_nav( $id );
	}
}

/**
 * Create a browser for tutorial pages that is placed on the sides of the page 
 * as an arrow image.
 * 
 * @param unknown $id
 * @return boolean
 */
function tutorial_nav( $id ) {
	$assunto = get_post_meta( $id, 'assunto', true );
	$id_p = get_post_meta( $id, 'id_p', true );
	
	if($id_p != $id) {
		$menu = get_post_field( 'menu_order', $id);
		$menu_prev = $menu - 1;
		$menu_next = $menu + 1;
	} else {
		$menu= 0;
		$menu_next = $menu + 1;
	}
	
	$args = array (
		'posts_per_page' => 20,
		'post_type'	=> array( 'tutorial' ),
		'order'     => 'ASC',
		'orderby'   => 'menu_order',
		'meta_key' => 'assunto',
		'meta_value' => $assunto
	);
	
	$query = new WP_Query( $args );
	
	$count = $query->found_posts;
	$end = $count - $menu_next;
	
	while ( $query->have_posts() ) {

		$query->the_post();
		$menu_current = get_post_field( 'menu_order', $post_id);

		if ( ( $menu_current == $menu_prev ) && $menu ) {
			?>
			<div class="previous hidden-xs hidden-sm">
				<a href="<?php echo get_permalink($post_id); ?>" ><img src="<?php echo get_template_directory_uri() . '/images/previous.png'; ?>"></a>
			</div>
			<?php 
		}

		if ( $end && ( $menu_current == $menu_next ) ) {
			?>
			<div class="next hidden-xs hidden-sm">
				<a href="<?php echo get_permalink($post_id); ?>" ><img src="<?php echo get_template_directory_uri() . '/images/next.png'; ?>"></a>
			</div>
			<?php 
			return true;
		}
	}
		
}

