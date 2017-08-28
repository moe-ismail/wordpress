<?php get_header();
?>

<h2> This is a page for the single product page </h2>

<div class="row">

<div class="col-xs-12 col-sm-8">

<article id="post-<?php the_ID();?>" <?php post_class();?>>
</article>

<div class = "display-products">
<div id="test">
<?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'template-parts/content', get_post_format() ); ?>

    <?php endwhile; // End of the loop. ?>

</div>  
<?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
  <div id="custom-bg" style="background-image: url('<?php echo $image[0]; ?>')"> 



  </div>
<?php endif; ?>

   </div>
   </div>

<?php
  
   // Declare global $more (before the loop).
global $more;
 
// Set (inside the loop) to display all content, including text below more.
$more = 1;
 
the_content();
get_footer();

