<?php
/**
 * Set content width for the theme
 */
if ( !isset( $content_width ) ) {
    $content_width = 700;
}

/**
 * bit-note after setup theme
 */
function bit_note_setup()
{
    // Register header menu
    register_nav_menus( array(
    		'primary' 	=> __( 'Header Menu'),
    ) );

    // Make the theme translation ready
    load_theme_textdomain( 'bit-note', get_template_directory() . '/lang' );

    add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'bit_note_setup' );

/**
 * Register widgets area
 */
function bit_note_widgets_init()
{
    register_sidebar(
        array (
        'name'             => __('Sidebar Right Widgets Area', 'bit-note'),
        'id'             => 'sidebar-right-widgets',
        'before_widget' => '<div id="%1$s" class="panel panel-default sidebar-widget %2$s" >',
        'after_widget'     => "</div>",
        'before_title'     => '<div class="panel-heading sidebar-widget-title"><h4>',
        'after_title'     => '</h4></div>',
        )
    );

    register_sidebar(
        array (
        'name'             => __('Footer Left Widget Area', 'bit-note'),
        'id'             => 'footer-left-widget',
        'before_widget' => '<div id="%1$s" class="panel panel-default footer-widget %2$s" >',
        'after_widget'     => "</div>",
        'before_title'     => '<div class="panel-heading footer-widget-title"><h4>',
        'after_title'     => '</h4></div>',
        )
    );

    register_sidebar(
        array (
        'name'             => __('Footer Center Left Widget Area', 'bit-note'),
        'id'             => 'footer-center-left-widget',
        'before_widget' => '<div id="%1$s" class="panel panel-default footer-widget %2$s" >',
        'after_widget'     => "</div>",
        'before_title'     => '<div class="panel-heading footer-widget-title"><h4>',
        'after_title'     => '</h4></div>',
        )
    );

    register_sidebar(
        array (
        'name'             => __('Footer Center Right Widget Area', 'bit-note'),
        'id'             => 'footer-center-right-widget',
        'before_widget' => '<div id="%1$s" class="panel panel-default footer-widget %2$s" >',
        'after_widget'     => "</div>",
        'before_title'     => '<div class="panel-heading footer-widget-title"><h4>',
        'after_title'     => '</h4></div>',
        )
    );

    register_sidebar(
        array (
        'name'             => __('Footer Right Widget Area', 'bit-note'),
        'id'             => 'footer-right-widget',
        'before_widget' => '<div id="%1$s" class="panel panel-default footer-widget %2$s" >',
        'after_widget'     => "</div>",
        'before_title'     => '<div class="panel-heading footer-widget-title"><h4>',
        'after_title'     => '</h4></div>',
        )
    );
}
add_action( 'widgets_init', 'bit_note_widgets_init' );

/**
 * Add styles
 */
function bit_note_enqueue_style()
{
    // Add google fonts Lato, "Patua One", Roboto, "PT Serif".
    wp_register_style( 'google_font', 'https://fonts.googleapis.com/css?family=Lato|Patua+One|Roboto|PT+Serif' );
    wp_enqueue_style( 'google_font' );

    // Add bit-note bootstrap style.
    wp_register_style( 'bootstrap_style', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style('bootstrap_style');

    // Add theme style.
    wp_register_style( 'theme_style', get_template_directory_uri() . '/style.css',  array( 'bootstrap_style' ) );
    wp_enqueue_style('theme_style');

    // Add navbar-header style.
    wp_register_style( 'navbar_header_style', get_template_directory_uri() . '/css/navbar-header.css', array( 'bootstrap_style' ) );
    wp_enqueue_style( 'navbar_header_style' );

    // Add bit-note style.
    wp_register_style( 'bit-note_style', get_template_directory_uri() . '/css/bit-note-style.css', array( 'bootstrap_style', 'navbar_header_style' ) );
    wp_enqueue_style( 'bit-note_style' );
}
add_action( 'wp_enqueue_scripts', 'bit_note_enqueue_style' );

/**
 * Add scripts
 */
function bit_note_enqueue_script()
{

    if ( !is_admin() ) {
        /*
         * Replaces jquery wordpress by google jquery via cdn.
         */
        wp_deregister_script( 'jquery' );
        wp_register_script( 'google_jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '', true );
        wp_enqueue_script('google_jquery');


        // Add theme script
        wp_register_script( 'bit-note_script', get_template_directory_uri() . '/js/bit-note.js', array( 'google_jquery' ), '1.0', true );
        wp_enqueue_script( 'bit-note_script' );

        // Add bootstrap script.
        wp_register_script( 'bootstrap_script', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'google_jquery', 'bit-note_script' ), '', true );
        wp_enqueue_script( 'bootstrap_script' );

        if ( is_single() || is_page() ) {
            // Ajaxfy comments
            wp_register_script( 'ajaxcomments', get_template_directory_uri() . "/js/ajaxcomments.js", array( 'google_jquery' ), '', true );
            wp_enqueue_script( 'ajaxcomments' );

            // Ajaxfy comment reply
            wp_enqueue_script( 'comment-reply' );
        }

        /**
         *  Add HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries.
         */
        wp_enqueue_script( 'ie_lt_html5shiv', "https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js" );
        wp_script_add_data( 'ie_lt_html5shiv', 'conditional', 'lt IE 9' );
        wp_enqueue_script( 'ie_lt_respond', "https://oss.maxcdn.com/respond/1.4.2/respond.min.js" );
        wp_script_add_data( 'ie_lt_respond', 'conditional', 'lt IE 9' );
    }
}
add_action( 'wp_enqueue_scripts', 'bit_note_enqueue_script', 10 );

/**
 * Replace the wordpress excerpt
 *
 * @param string $text
 * @return string
 */
function bit_note_the_excerpt($text) {
	global $post;
	if ( '' == $text ) {
		$text = get_the_content( '' );
		$text = apply_filters( 'the_content', $text );
		$text = str_replace( ']]>', ']]>', $text );
		$text = strip_tags( $text );
		$excerpt_length = 40;
		$words = explode( ' ', $text, $excerpt_length + 1 );
		if ( count( $words ) > $excerpt_length ) {
			array_pop( $words );
			array_push( $words, '...' );
			$text = implode( ' ', $words );
		}
	}
	return $text . '&hellip;&nbsp;<a href="' . get_permalink() . '" > '. __( 'Continue&nbsp;reading&nbsp;&nbsp;', 'bit-note' ) . '<span class="glyphicon glyphicon-hand-right"></span></a>';
}
remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );
add_filter( 'get_the_excerpt', 'bit_note_the_excerpt' );

/**
 * Create a array for pass to comment_form
 */
function bit_note_comment_form()
{
    $post_id = get_the_ID();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html_req = ( $req ? " required='required'" : '' );
    $commenter = wp_get_current_commenter();
    $current_user = wp_get_current_user();
    $user_identity = $current_user->display_name;
    $required_text =  __( 'Name and email are required.', 'bit-note' );

    $fields =  array(

        'author' =>
        '<div class="form-group">' .
        '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
        '" size="30"' . $aria_req . ' placeholder="'. __('name', 'bit-note') . '" /></div>',

        'email' =>
        '<div class="form-group">' .
        '<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) .
        '" size="30"' . $aria_req . ' placeholder="'. __('email', 'bit-note') . '" /></div>',

        'url' =>
        '<div class="form-group"><label for="url">' . __( 'Website', 'bit-note' ) . '</label>' .
        '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
        '" size="30" placeholder="'. __( 'url', 'bit-note' ) . '" /></div>',
    );

    $args = array(
        'id_form'           => 'commentform',
        'class_form'      	=> 'comment-form',
        'id_submit'         => 'submit',
        'class_submit'      => 'submit btn btn-primary',
        'name_submit'       => 'submit',
        'title_reply'       => __( 'Leave a Comment', 'bit-note' ),
        'label_submit'      => __( 'Comment', 'bit-note' ),
        'format'            => 'html5',


        'title_reply_before'   => '<h4 id="reply-title" class="comment-reply-title">',
        'title_reply_after'    => '</h4>',

        'comment_field' =>  '<div class="form-group"><textarea id="comment" name="comment" rows="3" aria-required="true" placeholder="' . __( "Your comment", "bit-note" ). '">' .
        '</textarea></div>',

        'must_log_in' => '<p class="must-log-in">' .
        sprintf(
            __( 'You must be <a href="%s">logged in</a> to post a comment.', 'bit-note' ),
            wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
        ) . '</p>',

        'logged_in_as' => '<p class="logged-in-as">' .
        sprintf(
            __( 'Logged in as', 'bit-note') . '&nbsp;<a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">' . __('Log out?', 'bit-note' ) . '</a>',
            admin_url( 'profile.php' ),
            $user_identity,
            wp_logout_url( apply_filters('the_permalink', get_permalink() ) )
        ) . '</p>',

        'comment_notes_before' => '<p class="comment-notes">' . $required_text . '<br>' . __('Your email address will not be published.', 'bit-note') . '</p>',

        'fields' => apply_filters( 'comment_form_default_fields', $fields ),
    );
    comment_form( $args, $post_id );
}

/**
 * Move the textarea field comment form to bottom
 *
 * @param comment fields $fields
 * @return comment fields
 */
function bit_note_comment_field( $fields )
{
    $fields['url']= '';
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'bit_note_comment_field' );

/**
 * Function Bsimple Search
 */
function bit_note_search_form() {
	?>
	<form class="form-inline form-search" role="search" method="get" action="<?php home_url ( '/' ); ?>" >
    	<div class="input-group  search-404">
            <span id="search" class="input-group-addon"><span class=" glyphicon glyphicon-search"></span></span>
    		<input class="form-control" type="text" value="" name="s" id="s" aria-describedby="search" placeholder=""/>
    	</div>
        <div class="input-group">
            <input type="submit" class="btn btn-primary btn-sm" value="<?php _e( 'Search', 'bit-note' ) ?>" />
        </div>
	</form>
<?php
}

/**
 * Bit Note replace Wordpress function posts_nav_link()
 */
function bit_note_posts_nav_link() {
    ?>
    <nav class="next_previous">
        <?php posts_nav_link('&nbsp;', '&nbsp;', __( '&laquo;&nbsp;Older Posts', 'bit-note' ) ) ?>
        &nbsp;&bull;&nbsp;
        <?php posts_nav_link('&nbsp;', __( 'New Posts&nbsp;&raquo;', 'bit-note' ), '&nbsp;' ) ?>
    </nav>
    <?php
}

/**
 * Bit Note replace Wordpress functions previous_post_link() and next_post_link()
 */
function bit_note_next_previous_post_link() {
    ?>
    <nav class="next_previous">
        <?php previous_post_link('%link', __( '&laquo;&nbsp;Previous Post', 'bit-note' ) ); ?> &bull;
        <?php next_post_link('%link', __( 'Next Post&raquo;&nbsp;', 'bit-note' ) ); ?>
    </nav>
    <?php
}

/**
 * Bit Note replaces Wordpress functions before_post_link () and next_post_link ()
 * with images that appear on the sides of pages.
 */
function bit_note_nav_single() {
	if ( get_previous_post() ) {
	?>
	<div class="previous hidden-xs hidden-sm">
		<?php previous_post_link( '%link', '<img src="' . get_template_directory_uri() . '/images/previous.png' . '"/>' ); ?>
	</div>
	<?php
	}
	if ( get_next_post()) {
	?>
	<div class="next hidden-xs hidden-sm">
		<?php next_post_link( '%link', '<img src="' . get_template_directory_uri() . '/images/next.png' . '"/>' ); ?>
	</div>
	<?php
	}
}


/**
 * Bit Note replaces Wordpress functions before_posts_link () and next_posts_link ()
 * with images that appear on the sides of pages.
 */
function bit_note_nav_pages() {
	if ( get_next_posts_link() ) {
	?>
	<div class="previous hidden-xs hidden-sm">
		<?php next_posts_link('<img src="' . get_template_directory_uri() . '/images/previous.png' . '"/>' ); ?>
	</div>
	<?php
	}
	if ( get_previous_posts_link() ) {
	?>
	<div class="next hidden-xs hidden-sm">
		<?php previous_posts_link( '<img src="' . get_template_directory_uri() . '/images/next.png' . '"/>' ); ?>
	</div>
	<?php
	}
}

require_once get_template_directory() . '/inc/wp-bootstrap-navwalker.php';
require_once get_template_directory() . '/inc/bit-note-walker-comment.php';
require_once get_template_directory() . '/inc/bit-note-social-media.php';
require_once get_template_directory() . '/tutorial/tutorial.php';
require_once get_template_directory() . '/tutorial/Tutorial-Widget.php';
