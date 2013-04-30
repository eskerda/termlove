<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <h1><?php the_title(); ?></h1>
        <div class="entry-meta">
            <?php termlove_posted_on(); ?>
        </div>
    </header>

    <div class="content">
        <?php the_content(); ?>
    </div>

    <footer class="entry-meta">

    </footer><!-- .entry-meta -->
</article>
