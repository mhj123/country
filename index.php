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

<div class="row">

	<!-- span3 -->
	<?php get_sidebar(); ?>

	<div class="span9" style="overflow:auto;">
		<div class="row" style="margin-bottom:30px;">
			<div style="border-top: #eee 5px solid;" class="introbox span3 <?php if($IE6=="1"||$IE7=="1"||$IE8=="1"){ echo ""; } else { echo "buymusic"; } ?>">
				<h2>Buy music</h2>
				<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
				<p><a class="btn" href="<?php echo home_url(); ?>/country-cds/">Browse music &raquo;</a></p>
				<div style="clear:both;"></div>
			</div><!--span3-->
			<div style="border-top: #ddd 5px solid;" class="introbox span3 <?php if($IE6=="1"||$IE7=="1"||$IE8=="1"){ echo ""; } else { echo "archivebuddy"; } ?>">
				<h2>Become an Archive Buddy</h2>
				<p>Subscribe and each month you will receive our three latest releases, at a special price. You will be supporting the work of the archive and building a unique and diverse collection of country music treasures.</p>
				<p><a class="btn" href="<?php echo home_url(); ?>/the-archive-affiliate-scheme/">View details &raquo;</a></p>
				<div style="clear:both;"></div>
			</div><!--span3-->
			<div style="border-top: #eee 5px solid;" class="introbox span3 <?php if($IE6=="1"||$IE7=="1"||$IE8=="1"){ echo ""; } else { echo "countrychattoo"; } ?>">
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
				<div style="clear:both;"></div>
			</div><!-- span3 -->
		</div><!--row-->

<!-- /span9 was here -->

	<div class="row">
		<div class="span3" style="overflow:auto;">
			<div class="hero-unit">
				<h3>Genres</h3>
		<?php wp_list_categories( array ('title_li'=>'','orderby'=>'name','hide_empty'=>1,'taxonomy'=>'genre' )) ?>

<br>
<h3>Eras</h3>
		<?php wp_list_categories( array ('title_li'=>'','orderby'=>'name','hide_empty'=>1,'taxonomy'=>'era' )) ?>
			</div>
		</div>
		<div class="span6" style="overflow:auto;">
			<div class="sub-hero-unit">
			<h3>Country Anniversaries and News</h3>
			<?php
			$wp_query= null;
			$wp_query = new WP_Query();
			$wp_query->query( array( 'post_type' => 'announcement', showposts => 4 ) );
			while (have_posts()) : the_post(); ?>
			<div style="float:left;width:90px;">
			<div style="float:left;">
			<?php $imagepath="";
			$imagepath = strip_tags( get_the_term_list($post->ID, 'imagepath', '', ', ', '')); 
			 ?>
			<?php if($imagepath!=''){ ?>
			<div style="width:70px;height:70px;padding:0;margin:0;">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<img width="70" height="70" style='float:left;border: 1px solid #bbb;' src="<?php echo $imagepath; ?>"/>
				</a>
			</div>
			<br>
			<?php } 
			else { ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(array(70,70));?></a>
			<br>
			<?php } ?>
			</div>
			</div>

			<?php echo "<b>".get_the_time('F j, Y')."</b>"; ?>

			<?php if(time() - strtotime(get_the_time('F j, Y'))<86400) { 
				echo "&nbsp;<span class='label label-info'>On this day!</span>"; 
				} 
				else { 
					echo ""; 
				} 
				?>
			
			<?php 

			$string = $post->post_content;
			$newString = substr($string, 0, 150);
			echo "<p>" . $newString . "... "; 
			?>
			<a style="float:right;" href="<?php echo the_permalink(); ?>">See more &raquo;</a></p>

			<?php
			if( ($wp_query->current_post + 1) < ($wp_query->post_count) ) {
			echo("<div style='clear:both;'></div><hr>");
			} 
			?>
			<?php endwhile; ?>
			<br><br>
			<a style="float:left;" href="<?php echo get_site_url(); ?>/announcements/">See all Country Anniversaries and News</a>
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