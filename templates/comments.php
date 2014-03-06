<?php
  if (post_password_required()) {
    return;
  }

 if (have_comments()) : ?>
  <section id="comments">
    <h3><?php printf(_n('One Response to &ldquo;%2$s&rdquo;', '%1$s Responses to &ldquo;%2$s&rdquo;', get_comments_number(), 'roots'), number_format_i18n(get_comments_number()), get_the_title()); ?></h3>

    <ol class="comment-list">
      <?php wp_list_comments(array('walker' => new Roots_Walker_Comment)); ?>
    </ol>

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
    <nav>
      <ul class="pagination">
        <?php if (get_previous_comments_link()) : ?>
          <li class="left"><?php previous_comments_link(__('&larr; Older comments', 'roots')); ?></li>
        <?php endif; ?>
        <?php if (get_next_comments_link()) : ?>
          <li class="right"><?php next_comments_link(__('Newer comments &rarr;', 'roots')); ?></li>
        <?php endif; ?>
      </ul>
    </nav>
    <?php endif; ?>

    <?php if (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
    <div data-alert class="alert-box warning">
      <?php _e('Comments are closed.', 'roots'); ?>
    </div>
    <?php endif; ?>
  </section><!-- /#comments -->
<?php endif; ?>

<?php if (!have_comments() && !comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
  <section id="comments">
    <div data-alert class="alert-box warning">
      <?php _e('Comments are closed.', 'roots'); ?>
    </div>
  </section><!-- /#comments -->
<?php endif; ?>

<?php if (comments_open()) : ?>
  <section id="respond">
    <h3><?php comment_form_title(__('Leave a Reply', 'roots'), __('Leave a Reply to %s', 'roots')); ?></h3>
    <p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
    <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
      <p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'roots'), wp_login_url(get_permalink())); ?></p>
    <?php else : ?>
      <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
        <?php if (is_user_logged_in()) : ?>
          <p>
            <?php printf(__('Logged in as <a href="%s/wp-admin/profile.php">%s</a>.', 'roots'), get_option('siteurl'), $user_identity); ?>
            <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php __('Log out of this account', 'roots'); ?>"><?php _e('Log out &raquo;', 'roots'); ?></a>
          </p>
        <?php else : ?>
          <div class="columns">
            <label for="author"><?php _e('Name', 'roots'); if ($req) _e(' (required)', 'roots'); ?></label>
            <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" <?php if ($req) echo 'aria-required="true"'; ?>>
          </div>
          <div class="columns">
            <label for="email"><?php _e('Email (will not be published)', 'roots'); if ($req) _e(' (required)', 'roots'); ?></label>
            <input type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" <?php if ($req) echo 'aria-required="true"'; ?>>
          </div>
          <div class="columns">
            <label for="url"><?php _e('Website', 'roots'); ?></label>
            <input type="url" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>">
          </div>
        <?php endif; ?>
        <div class="columns">
          <label for="comment"><?php _e('Comment', 'roots'); ?></label>
          <textarea name="comment" id="comment" style="height: 140px;" aria-required="true"></textarea>
        </div>
        <div class="columns">
          <input name="submit" class="button" type="submit" id="submit" value="<?php _e('Submit Comment', 'roots'); ?>"></p>
        </div>
        <?php comment_id_fields(); ?>
        <?php do_action('comment_form', $post->ID); ?>
      </form>
    <?php endif; ?>
  </section><!-- /#respond -->
<?php endif; ?>
