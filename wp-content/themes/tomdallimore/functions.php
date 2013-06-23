<?php

add_theme_support( 'menus' );

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '<aside>',
		'after_widget' => '</aside>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
));

add_post_type_support('page', 'excerpt');

function post_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>

			<p class="comment-meta">
				<?php printf( __( '%s' ), sprintf( '%s', get_comment_author_link() ) ); ?>
    
                <a class="comment-date" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                    <?php printf( __( '%1$s' ), get_comment_date() ); ?>
                </a> 
                
                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
                <?php endif; ?>
            </p>
		</div>

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
	</div>

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>

	<li class="post pingback">
		<p><?php _e( 'Pingback:' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)' ), ' ' ); ?></p>
	<?php

		break;
	endswitch;
}

// Custom functions 

// Tidy up the <head> a little. Full reference of things you can show/remove is here: http://rjpargeter.com/2009/09/removing-wordpress-wp_head-elements/
remove_action('wp_head', 'wp_generator');// Removes the WordPress version as a layer of simple security 

add_theme_support('post-thumbnails');

function improved_trim_excerpt($text) { // Fakes an excerpt if needed
  global $post;
  if ( '' == $text ) {
    $text = get_the_content('');
    $text = apply_filters('the_content', $text);
    $text = str_replace('\]\]\>', ']]&gt;', $text);
    $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
    $text = strip_tags($text, '<p>');
    $excerpt_length = 100;
    $words = explode(' ', $text, $excerpt_length + 1);
    if (count($words)> $excerpt_length) {
      array_pop($words);
      array_push($words, '<br/><br/><a href="'. get_permalink($post->ID) . '">Continue reading....</a>');
      $text = implode(' ', $words);
    }
  }
return $text;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt');

function my_comment_form( $args = array(), $post_id = null ) {
        global $user_identity, $id;
 
        if ( null === $post_id )
                $post_id = $id;
        else
                $id = $post_id;
 
        $commenter = wp_get_current_commenter();
 
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $fields =  array(
                'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . '</label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />' . ( $req ? '<span class="required">*</span>' : '' ) .
                            '</p>',
                'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . '</label><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />' . ( $req ? '<span class="required">*</span>' : '' ) .
                            '</p>',
                'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label>' .
                            '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
        );
 
        $required_text = sprintf( ' ' . __('Required fields are marked %s'), '<span class="required">*</span>' );
        $defaults = array(
                'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
                'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
                'must_log_in'          => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
                'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
                'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) . '</p>',
                'comment_notes_after'  => '<p class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ), ' <code>' . allowed_tags() . '</code>' ) . '</p>',
                'id_form'              => 'commentform',
                'id_submit'            => 'submit',
                'class_submit'         => 'submit',
                'title_reply'          => __( 'Leave a Reply' ),
                'title_reply_to'       => __( 'Leave a Reply to %s' ),
                'cancel_reply_link'    => __( 'Cancel reply' ),
                'label_submit'         => __( 'Post Comment' ),
        );
 
        $args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );
 
        ?>
                <?php if ( comments_open() ) : ?>
                        <?php do_action( 'comment_form_before' ); ?>
                        <div id="respond">
                                <h2 id="reply-title"><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?></h2>
                                <?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
                                        <?php echo $args['must_log_in']; ?>
                                        <?php do_action( 'comment_form_must_log_in_after' ); ?>
                                <?php else : ?>
                                        <form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>">
                                                <?php do_action( 'comment_form_top' ); ?>
                                                <?php if ( is_user_logged_in() ) : ?>
                                                        <?php echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>
                                                        <?php do_action( 'comment_form_logged_in_after', $commenter, $user_identity ); ?>
                                                <?php else : ?>
                                                        <?php echo $args['comment_notes_before']; ?>
                                                        <?php
                                                        do_action( 'comment_form_before_fields' );
                                                        foreach ( (array) $args['fields'] as $name => $field ) {
                                                                echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
                                                        }
                                                        do_action( 'comment_form_after_fields' );
                                                        ?>
                                                <?php endif; ?>
                                                <?php echo apply_filters( 'comment_form_field_comment', $args['comment_field'] ); ?>
                                                <?php echo $args['comment_notes_after']; ?>
                                                <p class="form-submit">
                                                        <input name="submit" type="submit" class="btn btn-info" id="<?php echo esc_attr( $args['id_submit'] ); ?>" class="<?php echo esc_attr( $args['class_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" />
                                                        <?php comment_id_fields(); ?>
                                                </p>
                                                <?php do_action( 'comment_form', $post_id ); ?>
                                        </form>
                                <?php endif; ?>
                        </div><!-- #respond -->
                        <?php do_action( 'comment_form_after' ); ?>
                <?php else : ?>
                        <?php do_action( 'comment_form_comments_closed' ); ?>
                <?php endif; ?>
        <?php
}
?>