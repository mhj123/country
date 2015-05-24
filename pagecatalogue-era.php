<?php
/*
Template Name: catalogue-by-era
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
  <li class="active"><a href="#">Browse by era</a></li>
  <li><a href="<?php echo home_url(); ?>/country/genres/">Browse by genre</a></li>
  <li><a href="<?php echo home_url(); ?>/country/catalogue/">Browse by serial no.</a></li>
</ul>
<div class="sub-hero-unit">

<p>We defined six eras and where possible assigned each CD to its era (or to several, where there was a mix).  Corrections or suggestions for improvement are welcome!</p>
<br>
<?php wp_tag_cloud( array ( 'taxonomy' => 'era', 'separator' => '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;'  ) ); ?>


</div>
</div>

</div>
</div>
<?php get_footer(); ?>