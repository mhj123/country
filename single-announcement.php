<?php
/**
 * The Template for displaying all single posts.
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
<p><strong><a href="<?php echo home_url();?>/announcements/">See all Country Anniversaries and News</a></strong></p>
<hr>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="row-fluid">
        <div class="span3"> 
<?php
$imagepath = strip_tags( get_the_term_list($post->ID, 'imagepath', '', ', ', '')); 
if($imagepath!=''){
echo "<img style='float:left;margin:10px;margin-top:0;width:250px;' src='" . $imagepath . "'/>"; }
?>
<?php the_post_thumbnail(); ?>
</div><!-- span3 -->

<div class="span9"> 


<h1><?php echo "<b>".get_the_time('F j, Y')."</b>"; ?></h1>

<?php 
if(false != get_the_term_list($post->ID, 'artist'))
{
$artist = strip_tags( get_the_term_list($post->ID, 'artist') ); 
echo "<h2>".$artist."</h2>";
} else {
$artist = "null";
}
?>


<?php 
if($content = $post->post_content ) {
the_content();
}
?>

<?php if( false != get_post_meta($post->ID, 'announcementlink', true))
{ ?>
<a class='btn btn-success' href="<?php echo get_post_meta($post->ID, 'announcementlink', true); ?>">Find an Archive CD by this artist</a>
<?php
}
?>

</div><!-- span9 -->

</div><!-- row-fluid -->
</div><!--sub-hero-unit -->



<?php endwhile; // end of the loop. ?>

<?php wp_reset_query(); ?>
<?php
global $wp_query;
query_posts(array('artist'=>$artist, 'post_type' => 'post'));
if ( $wp_query->post_count>1 ): ?>

<hr>
<h3>CDs by <?php echo $artist; ?></h3>
<?php while ( have_posts() ) : the_post(); ?>
<?php include('listing.php'); ?>
<hr>
<?php endwhile; // End the loop. Whew. ?>


<?php endif; // End the loop. Whew. ?>

</div><!-- row-fluid -->
</div><!-- container-fluid -->

<?php get_footer(); ?>