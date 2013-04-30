<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <h1>
            <?php 
                $title = esc_attr( sprintf( __( 'Permalink to %s', 'termlove' ), 
                                        the_title_attribute( 'echo=0' ) ) 
                );
            ?>
            <a href="<?php the_permalink(); ?>" title="<?php echo $title; ?>" rel="bookmark" class="custom">
                <?php the_title(); ?>
            </a>
        </h1>
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
