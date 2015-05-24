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
  <li><a href="<?php echo home_url(); ?>/country/country-cds/">Browse by artist name</a></li>
  <li class="active"><a href="<?php echo home_url(); ?>/country/catalogue/">Browse by catalogue no.</a></li>
  <li><a href="<?php echo home_url(); ?>/country/catalogue-by-genre/">Browse by genre</a></li>
</ul>
<div class="sub-hero-unit">
<?php
$x=50;
$offset = 0;
if(isset($_GET['part'])) 
{
    $offset =  ($_GET['part']-1) * $x; 
    $cur = $_GET['part'];
}
if ($_GET['part']==0) {
$cur = 1;

}


?>
<div class="pagination">
<ul>
<?php
$count_posts = wp_count_posts();
$published_posts = $count_posts->publish;
$y= floor($published_posts / $x);
$z= $published_posts % $x;
for ($i=0;$i<$y;$i++) {
if($cur==($i+1)){ $str=" class='active'"; } else { $str=""; }
echo "<li" . $str . "><a href='". home_url() . "/country/catalogue/?part=" . ($i+1) . "'>" . ($i * $x + 1) . " - " . (($i+1) * $x) . "</a></li>";
}
if ($z>0) {
if($cur>(int)$y){ $str=" class='active'"; } else { $str=""; }
echo "<li" . $str . "><a href='". home_url() . "/country/catalogue/?part=" . (((int)$y)+1) . "'>" . (((int)$y * $x) + 1) . ' - ' . ((((int)$y*$x)+$z)) . "</a></li>";
}
/*
echo "<br />no of posts".$published_posts;
echo "<br />increment".$x;
echo "<br />no of pages".$y;
echo "<br />remainder".$z;
echo "<br />offset".$offset;
*/
?>
</ul>
</div>


<?php $querystr = "SELECT $wpdb->posts.*, $wpdb->term_taxonomy.taxonomy, 
CONVERT($wpdb->terms.name,UNSIGNED INTEGER) AS num
FROM $wpdb->terms
INNER JOIN $wpdb->term_taxonomy ON ($wpdb->terms.term_id = $wpdb->term_taxonomy.term_id)
INNER JOIN $wpdb->term_relationships ON ($wpdb->term_taxonomy.term_taxonomy_id = $wpdb->term_relationships.term_taxonomy_id)
INNER JOIN $wpdb->posts ON ($wpdb->term_relationships.object_id = $wpdb->posts.ID)
WHERE $wpdb->term_taxonomy.taxonomy = 'reference'
AND $wpdb->posts.post_status = 'publish'
ORDER BY num ASC
LIMIT $x OFFSET $offset";
$pageposts = $wpdb->get_results($querystr, OBJECT);
?>
<?php 
if ($pageposts): ?>
 <?php global $post; ?>
 <?php foreach ($pageposts as $post): ?>
 <?php setup_postdata($post); ?>
 <?php include('listing.php'); ?>


<hr>
 <?php endforeach; ?>
 <?php else : ?>
    <h2 class="center">Not Found</h2>
    <p class="center">Sorry, but you are looking for something that isn't here.</p>
    <?php include (TEMPLATEPATH . "/searchform.php"); ?>
 <?php endif; ?>

<div class="pagination">
<ul>
<?php

for ($i=0;$i<$y;$i++) {
if($cur==($i+1)){ $str=" class='active'"; } else { $str=""; }
echo "<li" . $str . "><a href='". home_url() . "/country/catalogue/?part=" . ($i+1) . "'>" . ($i * $x + 1) . " - " . (($i+1) * $x) . "</a></li>";
}
if ($z>0) {
if($cur>(int)$y){ $str=" class='active'"; } else { $str=""; }
echo "<li" . $str . "><a href='". home_url() . "/country/catalogue/?part=" . (((int)$y)+1) . "'>" . (((int)$y * $x) + 1) . ' - ' . ((((int)$y*$x)+$z)) . "</a></li>";
}
?>
</ul>
</div>

</div>
</div>

</div>
</div>
<?php get_footer(); ?>