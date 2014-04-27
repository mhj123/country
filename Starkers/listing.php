<div style="float:left;width:140px;">

<div style="float:left;">
<?php $imagepath="";
$imagepath = strip_tags( get_the_term_list($post->ID, 'imagepath', '', ', ', '')); 
 ?>
<?php if($imagepath!=''){ ?>
<div style="width:100px;height:100px;padding:0;margin:0;">
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
<img width="95" height="95" style='float:left;border: 1px solid #bbb;' src="
<?php echo $imagepath; ?>"/></a>
</div>
<br>
<?php } 
else { ?>
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(array(95,95));?></a>
<br>
<?php } ?>
</div>

<div style="clear:left;>
<span style="margin-left:10px;" class="label label-inverse">CD D <?php echo strip_tags(get_the_term_list($post->ID, 'reference', '', ', ', ''));?></span>
</div>

</div>

<div style="float:left;width:440px;">
<h4 span="country-color">
<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
<div>
<?php $introduction = get_post_meta($post->ID, 'introduction', true); 
if($introduction!=""){
echo "<p style='font-style:italic;'>" . $introduction . "</p><br />";
}
?>
<?php the_content( __( 'Continue reading &rarr;', 'twentyten' ) ); ?>
<a class="btn btn-success" href="<?php echo home_url(); ?>/cd-sales/">How to buy</a>
</div>
</div>

<div style="clear:left;">
</div>