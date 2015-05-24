<?php
/*
Template Name: catalogue2
The 12 suggested groupings are:
 
A - B
C
D - E
F - G
H - I
J
K to M
N to Q
R
S
T
U to Z
 
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
  <li class="active"><a href="#">Browse by artiste</a></li>
  <li><a href="<?php echo home_url(); ?>/country/eras/">Browse by era</a></li>
  <li><a href="<?php echo home_url(); ?>/country/genres/">Browse by genre</a></li>
  <li><a href="<?php echo home_url(); ?>/country/catalogue/">Browse by serial no.</a></li>
</ul>
<div class="sub-hero-unit">


<?php
if(isset($_GET['letter'])) 
{
$gl = $_GET['letter'];
}
else {
$gl = 'AB';
}
$letters = str_split($gl);

?>
<p>Listed in order of first name of artist or group. Ones beginning with a number appear under the first letter of the number (eg: '4-Star' is under 'F').</p>
<div class="pagination">
<ul>
<li <?php if($gl=='AB'){echo 'class="active"';}?> ><a href="<?php echo home_url(); ?>/country/country-cds/?letter=AB">A-B</a></li>
<li <?php if($gl=='C'){echo 'class="active"';}?> ><a href="<?php echo home_url(); ?>/country/country-cds/?letter=C">C</a></li>
<li <?php if($gl=='DE'){echo 'class="active"';}?> ><a href="<?php echo home_url(); ?>/country/country-cds/?letter=DE">D-E</a></li>
<li <?php if($gl=='FG'){echo 'class="active"';}?> ><a href="<?php echo home_url(); ?>/country/country-cds/?letter=FG">F-G</a></li>
<li <?php if($gl=='HI'){echo 'class="active"';}?> ><a href="<?php echo home_url(); ?>/country/country-cds/?letter=HI">H-I</a></li>
<li <?php if($gl=='J'){echo 'class="active"';}?> ><a href="<?php echo home_url(); ?>/country/country-cds/?letter=J">J</a></li>
<li <?php if($gl=='KLM'){echo 'class="active"';}?> ><a href="<?php echo home_url(); ?>/country/country-cds/?letter=KLM">K-M</a></li>
<li <?php if($gl=='NOPQ'){echo 'class="active"';}?> ><a href="<?php echo home_url(); ?>/country/country-cds/?letter=NOPQ">N-Q</a></li>
<li <?php if($gl=='R'){echo 'class="active"';}?> ><a href="<?php echo home_url(); ?>/country/country-cds/?letter=R">R</a></li>
<li <?php if($gl=='S'){echo 'class="active"';}?> ><a href="<?php echo home_url(); ?>/country/country-cds/?letter=S">S</a></li>
<li <?php if($gl=='T'){echo 'class="active"';}?> ><a href="<?php echo home_url(); ?>/country/country-cds/?letter=T">T</a></li>
<li <?php if($gl=='UVWXYZ'){echo 'class="active"';}?> ><a href="<?php echo home_url(); ?>/country/country-cds/?letter=UVWXYZ">U-Z</a></li>


</ul>
</div>

<?php foreach($letters as $letter): ?>

<?php 
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query( array( 'alpha' => $letter, 'orderby'=> 'title', 'order' => 'ASC', 'posts_per_page' => -1 ) ); ?>

<?php while ( have_posts() ) : the_post(); ?>

 <?php include('listing.php'); ?>

<hr>

<?php endwhile; // End the loop. Whew. ?>

 <?php endforeach; ?>

<div class="pagination">
<ul>
<li <?php if($gl=='AB'){echo 'class="active"';}?> ><a href="<?php echo home_url(); ?>/country/country-cds/?letter=AB">A-B</a></li>
<li <?php if($gl=='C'){echo 'class="active"';}?> ><a href="<?php echo home_url(); ?>/country/country-cds/?letter=C">C</a></li>
<li <?php if($gl=='DE'){echo 'class="active"';}?> ><a href="<?php echo home_url(); ?>/country/country-cds/?letter=DE">D-E</a></li>
<li <?php if($gl=='FG'){echo 'class="active"';}?> ><a href="<?php echo home_url(); ?>/country/country-cds/?letter=FG">F-G</a></li>
<li <?php if($gl=='HI'){echo 'class="active"';}?> ><a href="<?php echo home_url(); ?>/country/country-cds/?letter=HI">H-I</a></li>
<li <?php if($gl=='J'){echo 'class="active"';}?> ><a href="<?php echo home_url(); ?>/country/country-cds/?letter=J">J</a></li>
<li <?php if($gl=='KLM'){echo 'class="active"';}?> ><a href="<?php echo home_url(); ?>/country/country-cds/?letter=KLM">K-M</a></li>
<li <?php if($gl=='NOPQ'){echo 'class="active"';}?> ><a href="<?php echo home_url(); ?>/country/country-cds/?letter=NOPQ">N-Q</a></li>
<li <?php if($gl=='R'){echo 'class="active"';}?> ><a href="<?php echo home_url(); ?>/country/country-cds/?letter=R">R</a></li>
<li <?php if($gl=='S'){echo 'class="active"';}?> ><a href="<?php echo home_url(); ?>/country/country-cds/?letter=S">S</a></li>
<li <?php if($gl=='T'){echo 'class="active"';}?> ><a href="<?php echo home_url(); ?>/country/country-cds/?letter=T">T</a></li>
<li <?php if($gl=='UVWXYZ'){echo 'class="active"';}?> ><a href="<?php echo home_url(); ?>/country/country-cds/?letter=UVWXYZ">U-Z</a></li>

</ul>
</div>

</div>
</div>

</div>
</div>
<?php get_footer(); ?>