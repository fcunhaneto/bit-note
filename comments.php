<?php
/**
 * The Bit Note template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="bit-note-comment-form">
	<?php
	if ( comments_open() ) {
		// if commnets are open we show form
		bit_note_comment_form ();
	} else if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'bit-note' ); ?></p>
	<?php
	}
	?>
</div>

<div id="comments" class="comments-area">
	<?php
	// Start to show commnets
	if ( have_comments() ) : ?>
		<h4 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( __( 'One Reply to &ldquo;%s&rdquo;', 'bit-note' ), get_the_title() );
			} else {
				printf(	__( '%1$s Replies to &ldquo;%2$s&rdquo;', 'bit-note' ), $comments_number, get_the_title() );
			}
			?>
		</h4>

		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'walker' => new Bit_Note_Walker_Comment(),
					'avatar_size' => 48,
					'style'       => 'ul',
					'short_ping'  => true,
					'reply_text'  => __( 'Reply', 'bit-note' ),
					'reverse_top_level' => true,
					'format' => 'html5'
				) );
			?>
		</ul>

	<?php
		the_comments_pagination();
	endif;
	?>
</div>
