<?php
/*
Template Name: catalogue-by-genre
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
  <li><a href="<?php echo home_url(); ?>/country/eras/">Browse by era</a></li>
  <li class="active"><a href="#">Browse by genre</a></li>
  <li><a href="<?php echo home_url(); ?>/country/catalogue/">Browse by serial no.</a></li>
</ul>

<div class="sub-hero-unit">
<p>Country music genres are notoriously difficult to define and it is difficult (impossible!) to get expert consensus. Also, some artistes move freely across different styles of music or even create a hybrid genre of their own. Anyway we have had a go (or to be more precise, the webmaster has!); defined 20 genres and then assigned each CD to one  - or more genres. This is not set in stone and suggestions for improvement are very welcome!</p>
<br>
<?php wp_tag_cloud( array ( 'taxonomy' => 'genre', 'separator' => '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;' ) ); ?>

</div>
</div>

</div>
</div>
<?php get_footer(); ?>