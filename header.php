<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php
if(is_page(75)){ ?>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<?php } else { ?>
<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
<?php } ?>
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 * We filter the output of wp_title() a bit -- see
	 * twentyten_filter_wp_title() in functions.php.
	 */
	wp_title( '|', true, 'right' );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_uri(); ?>" />
<link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_enqueue_script("jquery"); ?>
<?php wp_enqueue_script("/bootstrap/js/bootstrap.js"); ?>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<link href='http://fonts.googleapis.com/css?family=Gilda+Display' rel='stylesheet' type='text/css'>

</head>

<body <?php body_class(); ?> style="margin-top:10px;">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script><!--
<div class="jumbotron masthead" style="background-color:#eee;">
  <div class="container">
    <h1>British Archive of Country Music</h1>
  </div>
</div>
<h1>
		<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img style="margin: auto;display:block;"  src="http://www.mj-pm.co.uk/country/wp-content/uploads/2013/04/new-banner.jpg" /></a>
	</h1>
-->

<div class="container">

<div class="row">
	<div class="span12">
		<div class="hero-unit main-header flb">
			<div class="layer">
				<div class="row-fluid">
					<div class="span1">
					</div>
					<div class="span10">
				<h1><a href="<?php echo home_url(); ?>">The Country Music Archive</a></h1>
					</div>
					<div class="span1">

					</div>
				</div>
				<div class="row-fluid" style="margin-top:10px;">
					<div class="span9">
						<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
					</div>
					<div class="span3">
						<form role="search" method="get" action="<?php echo home_url( '/' ); ?>" class="form-search">
							<input type="search" class="input-medium search-query" placeholder="<?php echo esc_attr_x( 'Search artists or songs', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
							<input type="submit" class="btn" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>