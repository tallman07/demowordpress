<?php
/**
 * The template for displaying Comments.
 *
 *
 * @subpackage Medical Center
 * @since Medical Center
 */
?>
<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p><?php _e( 'This post is password protected. Enter the password to view any comments.', 'medical_center' ); ?></p>
	<?php return;
	endif;
	if ( have_comments() ) : ?>
		<h3 id="comments-title">
			<?php printf( _n( __( 'One thought on', 'medical_center' ) . ' &ldquo;%2$s&rdquo;', '%1$s ' . __( 'thoughts on', 'medical_center' ) . ' &ldquo;%2$s&rdquo;', get_comments_number(), 'medical_center' ), 
			number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?>
		</h3>
		<ul class="commentlist"><?php wp_list_comments( array( 'callback' => 'mdclcntr_comment' ) ); ?></ul>
		<div class="navigation">
			<div class="alignleft"><?php previous_comments_link(); ?></div>
			<div class="alignright"><?php next_comments_link(); ?></div>
		</div><!-- .navigation -->
	<?php else : /* This is displayed if there are no comments so far */ 
		if ( comments_open() ) :
			/* If comments are open, but there are no comments. */
		else : /* Comments are closed */
		endif;
	endif;
	comment_form(); ?>
</div><!-- #comments -->