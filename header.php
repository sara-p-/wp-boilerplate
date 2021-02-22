<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<?php 	$template_directory = get_template_directory_uri(); ?>

<head>
    <?php if (is_search()) { ?>
        <meta name="robots" content="noindex, nofollow">
    <?php } ?>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
    <?php wp_head(); ?>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $template_directory; ?>/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $template_directory; ?>/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $template_directory; ?>/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo $template_directory; ?>/assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo $template_directory; ?>/assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>

<body <?php body_class('body'); ?>>

    <a href="#main" class="skip-nav">Skip navigation</a>

    <?php if(is_front_page(  )) : ?>
        <div class="loading-screen active"></div>
    <?php endif; ?>

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
                        <?php include( locate_template('./blocks/components/social-menu.php') ); ?>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main>