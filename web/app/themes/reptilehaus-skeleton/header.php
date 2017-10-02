<?php
global $post;
// set the post views if is a single page
$set_views = is_singular() ? setPostViews($post->ID) : '';
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<head itemscope itemtype="http://schema.org/WebSite">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="format-detection" content="telephone=no">    
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="author" href="<?php echo THE_REPTILE_THEME_URL; ?>/humans.txt" />
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel='stylesheet' id='default-css'  href='<?php echo get_stylesheet_directory_uri(); ?>/assets/css/style.min.css' type='text/css' media='all' />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php // http://www.favicomatic.com/done ?>
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />    
    <?php wp_head(); ?>	
    <?php // get_template_part('partials/legacy', 'browsers'); ?>
    <?php if('RH_ENVIRONMENT' != "DEV"): ?>
      <script type="text/javascript">
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','__gaTracker');
        __gaTracker('create', '<?php echo GOOGLE_ANALYTICS ?>', 'auto');
        __gaTracker('set', 'forceSSL', true);
        __gaTracker('require', 'displayfeatures');
        __gaTracker('send','pageview');
      </script>
    <?php endif; ?>

</head>

<body <?php body_class('reptilehaus'); ?>  itemscope itemtype="http://schema.org/WebPage">

<header id="global-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
    <div class="container"> 
        <p id="logo" class="h1" itemscope itemtype="http://schema.org/Organization">
            <a href="<?php echo THE_REPTILES_HAUS; ?>" rel="nofollow"><?php bloginfo('name'); ?></a>
        </p>
        <nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement"></nav>
    </div>
</header>

<section id="page-wrapper">
    <div id="containment"> 
        <main role="main" itemscope itemprop="mainContentOfPage">