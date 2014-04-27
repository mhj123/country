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
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
$imagepath = strip_tags( get_the_term_list($post->ID, 'imagepath', '', ', ', '')); 
if($imagepath!=''){
echo "<img style='float:left;margin:10px;margin-top:0;width:250px;' src='" . $imagepath . "'/>"; }
?>
<?php the_post_thumbnail(); ?>
<h1><?php echo "<b>".get_the_time('F j, Y')."</b>"; ?></h1>
<?php 
if($content = $post->post_content ) {
the_content();
}
?>
<a class="btn btn-success" href="<?php echo get_post_meta($post->ID, 'announcementlink', true);  ?>">Find music by this artist</a>
</div><!--sub-hero-unit -->

</div><!-- row-fluid -->
</div><!-- container-fluid -->
<?php endwhile; // end of the loop. ?>


<?php get_footer(); ?>