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
<p><strong>Browse catalogue by <a href="<?php echo home_url();?>/country-cds">artiste</a> / <a href="<?php echo home_url();?>/eras">era</a> / <a href="<?php echo home_url();?>/genres">genre</a> / <a href="<?php echo home_url();?>/catalogue">serial no.</a></strong></p>
<hr>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="row-fluid">
        <div class="span3"> 
<?php
$imagepath = strip_tags( get_the_term_list($post->ID, 'imagepath', '', ', ', '')); 
if($imagepath!=''){
echo "<img style='float:left;margin: 0 20px 20px 0;border:1px solid #111;' src='" . $imagepath . "'/>"; }
?>
<?php the_post_thumbnail(); ?>

<div style="clear:left;>
<span style="margin: 10px;" class="label label-inverse">CD D <?php echo strip_tags(get_the_term_list($post->ID, 'reference', '', ', ', ''));?></span>
</div>

</div><!--span small-->
<div class="span9"> 

<h1><?php the_title(); ?></h1>
<?php $introduction = get_post_meta($post->ID, 'introduction', true); 
if($introduction!=""){
echo "<br><p>" . $introduction . "</p>";
}
?>

<?php if (false!=get_the_term_list($post->ID, 'genre')) { ?>

<p><strong>
Genres: <?php echo get_the_term_list($post->ID, 'genre', '', ', ', ''); ?> | Eras: <?php echo get_the_term_list($post->ID, 'era', '', ', ', ''); ?> 
</strong></p>

<?php } ?>

</div><!--span big-->
</div><!--row-fluid-->

<hr>

    <div class="row-fluid">
        <div class="span6"> 
<h3>Track listing:</h3>
 <?php 
$contentt = strip_tags(get_the_content());
$contentt = "- ".$contentt; 
$contentt = nl2br(str_replace("/", "\n - ", $contentt));
echo $contentt;
?>
<br>
<br>
<a class="btn btn-success" href="<?php echo home_url(); ?>/cd-sales/">How to buy</a>
</div>
        <div class="span6">

<?php 
    if ( get_post_meta($post->ID, 'audio1mp3', true) ) {
        echo '<h3>Listen to sample tracks:</h3>'; 
    }
    if ( get_post_meta($post->ID, 'audio1title', true) ) {
        echo '<p><strong>'.get_post_meta($post->ID, 'audio1title', true).'</strong></p>'; 
    }
    if ( get_post_meta($post->ID, 'audio1mp3', true) ) {
        echo '<audio controls="controls">
                <source src="' . get_post_meta($post->ID, 'audio1mp3', true) . '" />
                </audio>'; 
    }
    if ( get_post_meta($post->ID, 'audio2title', true) ) {
        echo "<p style='margin-top:50px;'><strong>".get_post_meta($post->ID, 'audio2title', true)."</strong></p>"; 
    }
    if ( get_post_meta($post->ID, 'audio2mp3', true) ) {
        echo '<audio controls="controls">
                <source src="' . get_post_meta($post->ID, 'audio2mp3', true) . '" />
                </audio>'; 
    }
?>
</div>
</div><!--row-fluid-->
</div><!-- sub-hero-unit -->



<?php $artist = strip_tags( get_the_term_list($post->ID, 'artist', '', ', ', '')); ?>
<?php endwhile; // end of the loop. ?>

<?php
global $wp_query;
query_posts(array('artist'=>$artist));
if ( $wp_query->post_count>1 ): ?>

<hr>
<h3>CDs by <?php echo $artist; ?></h3>
<?php while ( have_posts() ) : the_post(); ?>
<?php include('listing.php'); ?>
<hr>
<?php endwhile; // End the loop. Whew. ?>


<?php endif; // End the loop. Whew. ?>

</div><!-- sub-hero-unit -->
</div><!-- span9 -->
	
<?php get_footer(); ?>