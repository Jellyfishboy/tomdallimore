<?php

add_theme_support( 'menus' );

add_post_type_support('page', 'excerpt');
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
    $excerpt_length = 150;
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
                        <div class="twocol"></div>
                        <div class="tencol last">
                            <div id="respond">
                                    <h1 id="reply-title"><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?></h1>
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
                                                            <input name="submit" type="submit" class="btn btn-success" id="<?php echo esc_attr( $args['id_submit'] ); ?>" class="<?php echo esc_attr( $args['class_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" />
                                                            <?php comment_id_fields(); ?>
                                                    </p>
                                                    <?php do_action( 'comment_form', $post_id ); ?>
                                            </form>
                                    <?php endif; ?>
                            </div><!-- #respond -->
                        </div>
                        <?php do_action( 'comment_form_after' ); ?>
                <?php else : ?>
                        <?php do_action( 'comment_form_comments_closed' ); ?>
                <?php endif; ?>
        <?php
}
function td_comment($comment, $args, $depth) {
   $comment = $GLOBALS['comment'];
   $email = (string)$GLOBALS['comment']->comment_author_email; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
      <div class="twocol comment-author vcard">
        <?php if ( has_gravatar($email) ) {
            echo get_avatar($comment,$size='75',$default='<path_to_url>' ); ?>
        <?php } else { ?>
            <?php echo has_gravatar($GLOBALS['comment']->comment_author_email); ?>
            <img src="<?php echo bloginfo('template_directory'); ?>/assets/img/gentleman_avatar.jpg" class="avatar photo">
        <?php } ?> 
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
      <?php endif; ?>

      <div class="tencol comment-meta commentmetadata last">
        <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
        <time><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></time>
        <?php edit_comment_link(__('(Edit)'),'  ','') ?>
        <?php comment_text() ?>
        <i class="fa-caret-left"></i>
        <i class="fa-caret-up"></i>
      </div>

      
     </div>
<?php
        } 
        add_filter('new_royalslider_skins', 'new_royalslider_add_custom_skin', 10, 2);
        function new_royalslider_add_custom_skin($skins) {
              $skins['tomd'] = array(
                   'label' => 'The custom skin',
                   'path' => get_bloginfo('template_directory') . '/assets/css/tomd.css'  // get_stylesheet_directory_uri returns path to your theme folder
              );
              return $skins;
        }
?>
<?php

    function has_gravatar($email_address) {
        // Build the Gravatar URL by hasing the email address
        $url = 'http://www.gravatar.com/avatar/' . md5( strtolower( trim ( $email_address ) ) ) . '?d=404';
        // Now check the headers...
        $headers = @get_headers( $url );

        // If 200 is found, the user has a Gravatar; otherwise, they don't.
        return preg_match( '|200|', $headers[0] ) ? true : false;
    }
    //Making jQuery Google API
    function modify_jquery() {
        if (!is_admin()) {
            // comment out the next two lines to load the local copy of jQuery
            wp_deregister_script('jquery');
            wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js', false, '1.8.1');
            wp_enqueue_script('jquery');
        }
    }
    add_action('init', 'modify_jquery');

?>