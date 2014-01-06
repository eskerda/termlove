<div class="header-container">
    <header id="main">
        <div class="description">
            <?php
                $gravatar_hash = md5(get_option('gravatar_blog_email')); ?>
            <img id="avatar" src="http://gravatar.com/avatar/<?php echo $gravatar_hash; ?>?s=100"/>
            <h2>
                <a class="custom" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php bloginfo('name'); ?>
                </a>
            </h2>
            <p><?php bloginfo( 'description' ); ?></p>
        </div>
        <?php
            $args = array(
                'theme_location'  => 'header-menu',
                'container'       => 'nav',
                'items_wrap'      => '<ul>%3$s</ul>',
                'depth'           => 0
            );
        ?>
        <?php wp_nav_menu( $args ); ?>
    </header>
</div>
