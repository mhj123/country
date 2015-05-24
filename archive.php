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
<h1>Browse our catalogue of country music</h1>

<ul class="nav nav-tabs">
  <li><a href="<?php echo home_url(); ?>/country/country-cds/">Browse by artiste</a></li>
  <li><a href="<?php echo home_url(); ?>/country/eras/">Browse by era</a></li>
  <li><a href="<?php echo home_url(); ?>/country/genres/">Browse by genre</a></li>
  <li><a href="<?php echo home_url(); ?>/country/catalogue/">Browse by serial no.</a></li>
</ul>
<div class="sub-hero-unit">

<?php
	/* Queue the first post, that way we know
	 * what date we're dealing with (if that is the case).
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */

$term =	$wp_query->queried_object;
echo "<h2>". $term->name. "</h2><hr>";

$args = array(	
	'orderby'=> 'title', 
	'order' => 'ASC',
	'posts_per_page' => -1
);
global $wp_query;
query_posts(
	array_merge(
		$wp_query->query,
		$args
	)
);

	if ( have_posts() ):
	?>

<?php while ( have_posts() ) : the_post(); ?>

 <?php include('listing.php'); ?>

<hr>

<?php endwhile; // End the loop. Whew. ?>

		
<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
	<?php next_posts_link( __( '&larr; Older posts', 'twentyten' ) ); ?>
	<?php previous_posts_link( __( 'Newer posts &rarr;', 'twentyten' ) ); ?>

<?php endif; ?>

<?php endif; ?>




</div>
</div>

</div>
</div>





<?php get_footer(); ?>