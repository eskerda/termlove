<?php

$title = esc_attr(
    sprintf(__('Permalink to %s', 'termlove'),the_title_attribute('echo=0'))
);

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <h1>
            <a href="<?php the_permalink(); ?>" title="<?php echo $title; ?>" rel="bookmark" class="custom">
                <?php the_title(); ?>
            </a>
        </h1>
        <div class="entry-meta">
            <?php termlove_posted_on(); ?>
            <?php if (!post_password_required() && (comments_open() || get_comments_number())): ?>
                    <span class="comments-link">
                        <?php comments_popup_link( __('Leave a comment'), __('1 Comment'), __('% Comments')); ?>
                    </span>
            <?php endif; ?>
        </div>
    </header>

    <div class="content">
        <?php if (has_post_thumbnail()): ?>
            <div class="thumbnail">
                <?php the_post_thumbnail( ); ?>
            </div>
        <?php endif; ?>
        <?php the_content(); ?>
    </div>

    <footer class="entry-meta">

    </footer><!-- .entry-meta -->
</article>
