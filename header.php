<!DOCTYPE html>
<html <?php language_attributes(); ?>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

  <?php // Load our CSS ?>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
  <meta name="title" content="Heyross, designer, animator and developer" />
  <meta name="description" content="Heyross is Ross Butcher, a 14 year advertising veteran. Skills include design, art direction, branding, animation, front-end development, WordPress, Shopify, online media design, web banner production" />
  <link rel="image_src" href="http://rossbutcher.ca/heyross-screenshot.png" />

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!--  -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63178339-1', 'auto');
  ga('send', 'pageview');

</script>
<!--  -->
<header>
  <div class="container">
    <div class="navContainer clearfix">
      <div class="navName clearfix">
        <h1 alt="<?php bloginfo( 'name' ); ?>">
            <?php bloginfo( 'name' ); ?>
        </h1>
      </div>
      <div class="social clearfix">
        <div class="social_btns linkedIn">
          <a href="http://ca.linkedin.com/in/heyrossbutcher" target="blank" title="LinkedIn" alt="LinkedIn">
          <i class="fa fa-linkedin-square"></i></a>
        </div>
        <div class="social_btns twitter">
          <a href="https://twitter.com/rossbutcher" target="blank" title="Twitter" alt="Twitter">
          <i class="fa fa-twitter-square"></i></a>
        </div>
        <!-- <div class="social_btns gitHub">
          <a href="https://github.com/heyrossbutcher" target="blank" title="GitHub" alt="GitHub">
          <i class="fa fa-github-square"></i></a>
        </div> -->
      </div>
    </div>

    <!-- <?php wp_nav_menu( array(
      'container' => false,
      'theme_locations' => 'primary'
    )); ?> -->
  </div> <!-- /.container -->
</header><!--/.header-->

