<?php get_header(); ?>
<?php get_sidebar(); ?>
<div class="main-container">
    <main>
        <?php if (is_single()): ?>
            <?php $template = 'content-single'; ?>
        <?php else: ?>
            <?php $template = 'content'; ?>
        <?php endif; ?>
        <?php if (have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( $template, get_post_format() ); ?>
            <?php endwhile; ?>
        <?php endif; ?>
        <nav id="pagination">
            <ul>
                <?php if (is_single()): ?>
                    <li class="future"><?php next_post('%','', 'yes'); ?></li>
                    <li class="past"><?php previous_post('%', '', 'yes'); ?></li>
                <?php else: ?>
                    <li class="future"><?php previous_posts_link('Newer stuff'); ?></li>
                    <li class="past"><?php next_posts_link('Old stuff'); ?></li>
                <?php endif; ?>
            </ul>
        </nav>
        <?php if(is_single()): ?>
            <?php comments_template('', true); ?>
        <?php endif; ?>
    </main>
</div>
<?php get_footer(); ?>
