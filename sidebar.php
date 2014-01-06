<?php 
    $gravatar_hash = md5(get_option('gravatar_blog_email'));
    $gravatar_url  = "http://gravatar.com/avatar/".$gravatar_hash."?s=100"
?>

<div class="header-container">
    <header id="main">
        <div class="description">
            <a class="custom" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img id="avatar" src="<?php echo $gravatar_url; ?>"/>
            </a>
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

