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
<!--
<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img style="margin:0 auto 10px auto;display:block;"  src="http://www.mj-pm.co.uk/country/wp-content/uploads/2013/04/new-banner.jpg" /></a>
-->
<div class="well" id="sidebar">
<h4 style="margin-bottom:2px;">Menu</h4>
<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
<!--
<ul style="list-style: none; font-size: 16px; font-color: #900;margin-left:0px;">
<li><a style="color:#900;font-weight:bold;" href="<?php echo site_url(); ?>">Home</a></li>
<li><a style="color:#900;font-weight:bold;" href="http://www.mj-pm.co.uk/country/cd-sales/">CD Sales</a></li>			
<li><a style="color:#900;" href="http://www.mj-pm.co.uk/country/catalogue/">Browse the catalogue</a></li>
<li><a style="color:#900;" href="http://www.mj-pm.co.uk/country/newsletters/">Previous newsletters</a></li>
<li><a style="color:#900;" href="http://www.mj-pm.co.uk/country/directors/">Directors</a></li>
<li><a style="color:#900;" href="http://www.mj-pm.co.uk/country/reference-library/">Services</a></li>	
<li><a style="color:#900;" href="http://www.mj-pm.co.uk/country/contact-us/">Contact us</a></li>
<li><a style="color:#900;" href="http://www.mj-pm.co.uk/country/the-country-music-archive-project/">About BACM</a></li>
</ul>
-->
<hr>
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div><label class="screen-reader-text" for="s">Find an artist or song</label>
        <input type="text" value="" name="s" id="s" style="width:170px;"/>
        <input type="submit" id="searchsubmit" value="Search" />
    </div>
</form>
<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

			<ul class="xoxo">
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</ul>

<?php endif; ?>
<div class="fb-like-box" data-href="https://www.facebook.com/pages/The-Country-Music-Archive/215464675277954?fref=ts" data-width="230" data-height="90" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="false" data-show-border="false"></div>
<br>
</div><!-- well-->

<div class="well sidebar">
<h4>This month's new releases!</h4>
<?php
$my_query = new WP_Query(array(showposts=>3));
$introduction = "";
while ($my_query->have_posts()) : $my_query->the_post(); ?>

<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( array(50,50) );?></a>
<?php echo "<a href='".get_permalink()."'><p style='margin-bottom:0;'>" . $post->post_title . "</p></a>";
/* $string = $post->post_content; */
$introduction = get_post_meta($post->ID, 'introduction', true); 
if($introduction!=""){
if(strlen($introduction)>200) {
$newString = substr($introduction, 0, 200);
echo $newString . "... " . "<a href='". get_permalink() . "'>more info</a>"; 
}
else {
echo $introduction;
}
}
?>




<div style="clear:both;"></div>

<hr>
<?php endwhile; ?>
<?php wp_reset_query(); ?>
</div><!-- well-->

</div><!-- span3 -->