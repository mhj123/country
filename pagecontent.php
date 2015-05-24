<?php
/*
Template Name: contentpage
*/
get_header(); ?>

<div class="container">
<div class="row">

<?php get_sidebar(); ?>

<div class="span9">

<div class="hero-unit">
<?php rewind_posts(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<h1><?php the_title(); ?></h1>
<?php the_content(); ?>
<?php endwhile;?>
</div><!--hero-unit -->

</div><!--span9 -->



</div><!-- row-fluid -->
</div><!-- container-fluid -->


<?php get_footer(); ?>