<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<div class="container">
<div class="row">
<?php get_sidebar(); ?>
<!--
<h3>Popular artists available on CD</h3><?php wp_tag_cloud( array ( 'taxonomy' => artist ) ); ?>
<h3>Popular subgenres</h3><?php wp_tag_cloud( array ( 'taxonomy' => category ) ); ?>
-->    
<div class="span9">
<div class="sub-hero-unit">
<h1>Country News & Announcements</h1>
<?php
	/* Queue the first post, that way we know
	 * what date we're dealing with (if that is the case).
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */


	if ( have_posts() ):
		while ( have_posts() ): 
		the_post(); ?>

			
			<div style="float:left;width:120px;">
			<div style="float:left;">
				<?php $imagepath="";
				$imagepath = strip_tags( get_the_term_list($post->ID, 'imagepath', '', ', ', '')); 
				 ?>
				<?php if($imagepath!=''){ ?>
				<div style="width:100px;height:100px;padding:0;margin:0;">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<img width="95" height="95" style='float:left;border: 1px solid #bbb;' src="<?php echo $imagepath; ?>"/></a>
				</div>
				<br>
				<?php } 
				else { ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(array(95,95));?></a>
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
			
			<?php echo "<p>" . $post->post_content . "</p>"; ?>
			<a style="float:right;" href="<?php echo get_post_meta($post->ID, 'announcementlink', true);  ?>">See more &raquo;</a>
			<?php
			if( ($wp_query->current_post + 1) < ($wp_query->post_count) ) {
			echo("<div style='clear:both;'></div><hr>");
			} 
			?>



<?php endwhile; ?>

				<div style="clear:both;"></div>


<?php endif; ?>
		




</div>
</div>

</div>
</div>





<?php get_footer(); ?>