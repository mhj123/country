<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>
<div class="span3">
<div class="intro-message">
<div class="archive-image">
</div>
<div class="intro-text">

	<h4>Welcome to<br>the home of traditional and rare country music!</h4>
</div>
	<div class="fb-like-box" data-href="https://www.facebook.com/pages/The-Country-Music-Archive/215464675277954?fref=ts" data-height="90" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="false" data-show-border="false"></div>
	<div style="clear:both;"></div>	
</div><!-- well-->

<div class="well sidebar">
<h3>New releases</h3>
<?php
$my_query = new WP_Query(array(showposts=>3));
$introduction = "";
while ($my_query->have_posts()) : $my_query->the_post(); ?>

<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( array(50,50) );?></a>
<?php echo "<a href='".get_permalink()."'><p style='margin-bottom:0;'>" . $post->post_title;
if(get_post_meta($post->ID, 'audio1mp3', true)) {
echo "&nbsp;<i class='icon-volume-up'></i>";
}
echo "</p></a>";

/* $string = $post->post_content; */
$introduction = get_post_meta($post->ID, 'introduction', true); 
if($introduction!=""){
if(strlen($introduction)>200) {
$newString = substr($introduction, 0, 70);
echo $newString . "... " . "<a href='". get_permalink() . "'>more info</a>"; 
}
else {
echo $introduction;
}
}
?>
<div style="clear:both;"></div>
<?php
if( ($my_query->current_post + 1) < ($my_query->post_count) ) {
echo("<div style='clear:both;'></div><hr>");
} 
?>
<?php endwhile; ?>
<?php wp_reset_query(); ?>
</div><!-- well-->

</div><!-- span3 -->