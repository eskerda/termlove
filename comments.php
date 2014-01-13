<?php
/**
 * The template for displaying Comments (based on TwentyEleven).
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to termlove_comment() which is
 * located in the functions.php file.
 *
 */
?>

<?php
// Strings...
// Here they are, in all their glory!

$domain = 'termlove';
$pass_req = 'This post is password protected. Enter the password to view '.
            'any comments';
$n_com_one = 'One thought on &ldquo;%2$s&rdquo;';
$n_com_more = '%1$s thoughts on &ldquo;%2$s&rdquo;';
$prev_com = __('&larr; Older Comments', $domain);
$next_com = __('Newer Comments &rarr;', $domain);
$closed_com = 'Comments are closed';

if (have_comments()) {   // Strings that make sense when there are comments..
    $n_com = get_comments_number();
    $n_com_title = _n($n_com_one, $n_com_more, $n_com, $domain);
    $n_com_title = sprintf(
        $n_com_title,
        number_format_i18n($n_com),get_the_title()
    );
}

/**
 * Neverending list of comment form arguments:
 * These are (or come from) the default parameters from WP's comment_form()
 * function. Left here for tweaking, if any
 */

$com_form_args = array(
  'id_form'           => 'commentform',
  'id_submit'         => 'submit',
  'title_reply'       => __( 'Leave a Reply' ),
  'title_reply_to'    => __( 'Leave a Reply to %s' ),
  'cancel_reply_link' => __( 'Cancel Reply' ),
  'label_submit'      => __( 'Post Comment' ),
  'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) .
    '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
    '</textarea></p>',
  'must_log_in' => '<p class="must-log-in">' .
    sprintf(
      __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
    ) . '</p>',
  'logged_in_as' => '<p class="logged-in-as">' .
    sprintf(
    __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
      admin_url( 'profile.php' ),
      $user_identity,
      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    ) . '</p>',
  'comment_notes_before' => '<p class="comment-notes">' .
    __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) .
    '</p>',
  'comment_notes_after' => '<p class="form-allowed-tags">' .
    sprintf(
      __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ),
      ' <code>' . allowed_tags() . '</code>'
    ) . '</p>',
  'fields' => apply_filters( 'comment_form_default_fields', array(
    'author' =>
      '<p class="comment-form-author">' .
      '<label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
      ( $req ? '<span class="required">*</span>' : '' ) .
      '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
      '" size="30"' . $aria_req . ' /></p>',
    'email' =>
      '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
      ( $req ? '<span class="required">*</span>' : '' ) .
      '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" size="30"' . $aria_req . ' /></p>',
    'url' =>
      '<p class="comment-form-url"><label for="url">' .
      __( 'Website', 'domainreference' ) . '</label>' .
      '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
      '" size="30" /></p>'
    )
  ),
);

?>

<?php if (post_password_required()): ?>
    <?php // The start section is included here deliberately ?>
    <section id="comments">
        <p class="nopassword"><?php _e($pass_req, $domain); ?></p>
    </section>
    <?php
        /* Stop the rest of comments.php from being processed,
        * but don't kill the script entirely -- we still have
        * to fully load the template.
        */
        return;
    ?>
<?php endif; ?>

<section id="comments">
    <?php if ( have_comments() ): ?>
        <h2><?php echo $n_com_title; ?></h2>
        <ol class="commentlist">
            <?php wp_list_comments(); ?>
        </ol>
        <?php if (get_option('page_comments') && get_comment_pages_count() > 1): ?>
        <nav id="comment-nav-below">
            <div class="nav-previous">
                <?php previous_comments_link($prev_com); ?>
            </div>
            <div class="nav-next">
                <?php next_comments_link( $next_com); ?>
            </div>
        </nav>
        <?php endif; ?>

        <?php if (!comments_open() && get_comments_number() > 0): ?>
            <p class="nocomments"><?php _e($closed_com, $domain); ?></p>
        <?php endif; ?>
    <?php endif; ?>
    <?php comment_form($com_form_args); ?>
</section>

