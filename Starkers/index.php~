<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
get_header(); ?>

<?php 
$IE6 = $IE7 = $IE8 = "";
$IE6 = (ereg('MSIE 6',$_SERVER['HTTP_USER_AGENT'])) ? true : false;
    $IE7 = (ereg('MSIE 7',$_SERVER['HTTP_USER_AGENT'])) ? true : false;
    $IE8 = (ereg('MSIE 8',$_SERVER['HTTP_USER_AGENT'])) ? true : false; ?>

<div class="container">
<div class="row">

	<!-- span3 -->
	<?php get_sidebar(); ?>

	<div class="span9" style="overflow:auto;">
		<?php if($IE6=="1"||$IE7=="1"||$IE8=="1") { 
			echo "<img src=\"http://country-music-archive.com/wp-content/uploads/2013/05/Header-10-Darkened-Sepia-JPEG.jpg\" style=\"max-width:100%;\"><br /><br />"; } else { echo "<div class=\"page-header\"></div>"; 
		} ?>
		<div class="row">
			<div style="border-top: #F2E2D0 5px solid;height:240px;" class="span3 <?php if($IE6=="1"||$IE7=="1"||$IE8=="1"){ echo ""; } else { echo "buymusic"; } ?>">
				<h2>Buy music</h2>
				<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
				<p><a class="btn" href="<?php echo home_url(); ?>/country-cds/">Browse music &raquo;</a></p>
			</div><!--span3-->
			<div style="border-top: #F1F2D0 5px solid;height:240px;" class="span3 <?php if($IE6=="1"||$IE7=="1"||$IE8=="1"){ echo ""; } else { echo "archivebuddy"; } ?>">
				<h2>Become an Archive Buddy</h2>
				<p>Subscribe and each month you will receive our three latest releases, at a special price. You will be supporting the work of the archive and building a unique and diverse collection of country music treasures.</p>
				<p><a class="btn" href="<?php echo home_url(); ?>/the-archive-affiliate-scheme/">View details &raquo;</a></p>
			</div><!--span3-->
			<div style="border-top: #F2EAD0 5px solid;height:240px;" class="span3 <?php if($IE6=="1"||$IE7=="1"||$IE8=="1"){ echo ""; } else { echo "countrychattoo"; } ?>">
				<?php
				$wp_query= null;
				$wp_query = new WP_Query();
				$wp_query->query( array( 'post_type' => 'Newsletter', showposts => 1 ) );
				while (have_posts()) : the_post(); 
				echo "<h2>Read our chat</h2>";
				echo "<h5>Our founder Dave's monthly newsletter</h5>";
				$string = $post->post_content;
				$newString = substr($string, 0, 180);
				echo "<p>" . $newString . "...</p>"; ?>
				<a class="btn"  href="<?php echo get_permalink(); ?>">Read more &raquo;</a>
				<?php endwhile; ?>
			</div><!-- span3 -->
		</div><!--row-->

<!-- /span9 was here -->

	<div class="row">
		<div class="span9" style="overflow:auto;">
			<div class="hero-unit">
			<img src="http://country-music-archive.com/wp-content/uploads/2013/11/Home-Montage21.jpg" style="float:right;width:200px;margin:0 0 10px 10px;">
			<h1>Welcome to the Country Music Archive</h1>
			<?php get_sidebar( 'footer' );?>
			<div style="clear:both;"></div>
			</div><!--hero-unit -->
		</div><!--span9 -->
	</div><!--row -->

	<div class="row">
		<div class="span9" style="overflow:auto;">
			<div class="hero-unit">
			<img src="http://country-music-archive.com/wp-content/uploads/2013/11/Home-Montage21.jpg" style="float:right;width:200px;margin:0 0 10px 10px;">
			<h1>Welcome to the Country Music Archive</h1>
			<?php get_sidebar( 'footer' );?>
			<div style="clear:both;"></div>
			</div><!--hero-unit -->
		</div><!--span9 -->
	</div><!--row -->

	</div><!--span9-->

</div><!-- row -->
</div><!-- container -->


<?php get_footer(); ?>
