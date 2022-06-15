<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="<?php echo ICL_LANGUAGE_CODE; ?>">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=10;IE=11;IE=edge;chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/dist/img/favicon/favicon.png">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/dist/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/dist/img/favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/dist/img/favicon/favicon-32x32.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/dist/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/assets/dist/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <?php wp_head(); ?>
    <script async src="//www.googletagmanager.com/gtag/js?id=<?php echo get_option('seo_google_id'); ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?php echo get_option('seo_google_id') ?>');
    </script>
    <script type="text/javascript">
        const baseDirectory = '<?php echo get_template_directory_uri(); ?>';
    </script>
    <script>
        var typeDevice;
        if (navigator.userAgent.match(/(android|iphone|ipad|blackberry|symbian|symbianos|symbos|netfront|model-orange|javaplatform|iemobile|windows phone|samsung|htc|opera mobile|opera mobi|opera mini|presto|huawei|blazer|bolt|doris|fennec|gobrowser|iris|maemo browser|mib|cldc|minimo|semc-browser|skyfire|teashark|teleca|uzard|uzardweb|meego|nokia|bb10|playbook)/gi)) {
            if ( ((screen.width  >= 480) && (screen.height >= 800)) || ((screen.width  >= 800) && (screen.height >= 480)) || navigator.userAgent.match(/ipad/gi) ) {
                typeDevice = "tablet";
            } else {
                typeDevice = "mobile";
            }
        } else {
            typeDevice = "desktop";
        }
    </script>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Header  -->
<?php
    $menu = wp_nav_menu([
        'theme_location' => 'huttopiac_nav_header',
        'depth' => 4,
        'container' => 'nav',
        'container_class' => 'main-nav -desktop',
        'container_id' => 'main-menu',
        'menu_class' => 'menu-level-0',
        'fallback_cb' => 'WP_Huttopiac_Main_Nav::fallback',
        'walker' => new WP_Huttopiac_Main_Nav(),
        'echo' => false
    ]);
    if (wp_is_mobile()) {
        echo $menu;
    }
?>
<header class="main-header">
    <div class="container-header">
        <div class="logo-huttopiac">
            <a href="<?php echo get_home_url(); ?>">
                <img src="<?php echo get_option('logo_url'); ?>" alt="<?php echo get_option('logo_alt'); ?>" />
            </a>
        </div>
        <?php
            if (!wp_is_mobile()) {
                echo $menu;
            }
        ?>
        <nav class="top-nav -mobile">
            <?php
                $languages = language_selector_menu_view();
                if (empty($languages) === false && wp_is_mobile()) {
                    echo
                    '<div class="wrapper-center-select-lang">
                        <div class="wrapper-select-lang -mobile">'
                            . $languages .
                            '</div>
                    </div>';
                }
            ?>
        </nav>
        <button id="toggler-menu-mobile" class="burger-button">
            <svg class="open">
                <title><?php echo __('Ouvrir', 'huttopiac'); ?></title>
                <use xlink:href="#burger-menu"/>
            </svg>
            <svg class="close">
                <title><?php echo __('Fermer', 'huttopiac'); ?></title>
                <use xlink:href="#close"/>
            </svg>
        </button>
    </div>
</header>
<main id="main-container">
