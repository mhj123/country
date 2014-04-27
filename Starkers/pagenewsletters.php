<?php
/*
Template Name: newsletters
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
<h1>Country chat</h1>
<?php
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query( array( 'post_type' => 'Newsletter', showposts => -1 ) );
while (have_posts()) : the_post(); 
echo "<h4>" . $post->post_title . "</h4><br />";
$string = $post->post_content;
$newString = substr($string, 0, 500);
echo $newString . "... "; ?>
<a href="<?php echo get_permalink(); ?>">Read the newsletter</a>
<hr>
<br />
<?php endwhile;?>
<?php if (  $the_query->max_num_pages > 1 ) : ?>
				<?php next_posts_link( __( '&larr; Older posts', 'twentyten' ) ); ?>
				<?php previous_posts_link( __( 'Newer posts &rarr;', 'twentyten' ) ); ?>
<?php endif; ?>

</div>
</div>

</div>
</div>
<?php get_footer(); ?>