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
                <?php get_template_part( 'content', 'page' ); ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </main>
</div>
<?php get_footer(); ?>
