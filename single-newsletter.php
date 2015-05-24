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
<h1>Country Chat - <?php the_title(); ?></h1>
<?php the_content(); ?>
<?php endwhile; // end of the loop. ?>

</div><!--sub-hero-unit -->

<div class="sub-hero-unit">

<?php rewind_posts(); ?>
<h2>All Country Chat newsletters</h2>
<?php
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query( array( 'post_type' => 'newsletter', showposts => -1 ) );
while (have_posts()) : the_post(); 
echo "<h4>" . $post->post_title . "</h4><br />";
$string = $post->post_content;
$newString = substr($string, 0, 200);
echo $newString . "... "; 
?>
<a href="<?php echo get_permalink(); ?>">Read the newsletter</a>
<hr>
<br />
<?php endwhile;?>
<?php if (  $the_query->max_num_pages > 1 ) : ?>
				<?php next_posts_link( __( '&larr; Older posts', 'twentyten' ) ); ?>
				<?php previous_posts_link( __( 'Newer posts &rarr;', 'twentyten' ) ); ?>
<?php endif; ?>

</div>

</div><!-- row-fluid -->
</div><!-- container-fluid -->


<?php get_footer(); ?>