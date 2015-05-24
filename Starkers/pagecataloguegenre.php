<?php
/*
Template Name: catalogue
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
  <li>
    <a href="<?php echo home_url(); ?>/country/country-cds/">Browse by artist name
</a>
  </li>
  <li><a href="<?php echo home_url(); ?>/country/catalogue/">Browse by catalogue no.</a></li>
  <li class="active"><a href="#">Browse by genre</a></li>
</ul>
<div class="sub-hero-unit">

<h1>The catalogue by genre is under construction.</h1>

</div>
</div>

</div>
</div>
<?php get_footer(); ?>