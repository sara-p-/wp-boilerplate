<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head>
    <?php if (is_search()) { ?>
        <meta name="robots" content="noindex, nofollow">
    <?php } ?>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
    <?php wp_head(); ?>

</head>

<body <?php body_class('body'); ?>>

    <a href="#main" class="skip-nav">Skip navigation</a>

    <header>
        <div class="wrapper">
            <a href="#" id="nav-toggle" class="nav-toggle closed">
                <span class="toggle-wrapper">
                    <span class="toggle-bar toggle-bar-1"></span>
                    <span class="toggle-bar toggle-bar-2"></span>
                    <span class="toggle-bar toggle-bar-3"></span>
                </span>
                <span class="visually-hidden">Show Main Menu</span>
            </a>
            <div class="logo-box">
                <a href="#home" class="logo">SP</a>
            </div>
            <nav class="top-menu">
                <ul class="menu main-menu">
                    <?php
                    $args = array(
                        'theme_location' => 'main-menu',
                        'container' => 'false',
                        'items_wrap' => '%3$s'
                    );
                    ?>
                    <?php wp_nav_menu($args); ?>
                </ul>
            </nav>
            <nav class="hamburger-menu">
                <div class="wrapper">
                    <div class="row">
                        <ul class="menu mobile-menu">
                            <?php
                            $args = array(
                                'theme_location' => 'main-menu',
                                'container' => 'false',
                                'items_wrap' => '%3$s'
                            );
                            ?>
                            <?php wp_nav_menu($args); ?>
                        </ul>
                        <?php if (have_rows('social', 'option')) : ?>
                            <ul class="menu social-menu">
                                <?php while (have_rows('social', 'option')) : the_row(); ?>
                                    <?php
                                    $network = get_sub_field('network');
                                    $link = get_sub_field('link');
                                    if ($link) {
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'];
                                        if ($link_target == NULL) {
                                            $link_target = '_self';
                                        }
                                    }
                                    ?>
                                    <?php if ($network == 'facebook' && $link) : ?>
                                        <li class="menu-item"><a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-facebook-f icon"></i></a></li>
                                    <?php elseif ($network == 'twitter' && $link) : ?>
                                        <li class="menu-item"><a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-twitter icon"></i></a></li>
                                    <?php elseif ($network == 'instagram' && $link) : ?>
                                        <li class="menu-item"><a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-instagram icon"></i></a></li>
                                    <?php elseif ($network == 'snapchat' && $link) : ?>
                                        <li class="menu-item"><a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-snapchat icon"></i></a></li>
                                    <?php elseif ($network == 'pinterest' && $link) : ?>
                                        <li class="menu-item"><a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-pinterest icon"></i></a></li>
                                    <?php elseif ($network == 'googleplus' && $link) : ?>
                                        <li class="menu-item"><a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-googleplus icon"></i></a></li>
                                    <?php elseif ($network == 'linkedin' && $link) : ?>
                                        <li class="menu-item"><a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-linkedin-in icon"></i></a></li>
                                    <?php elseif ($network == 'youtube' && $link) : ?>
                                        <li class="menu-item"><a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-youtube icon"></i></a></li>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main>