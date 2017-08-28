<?php
/**
 * The template for displaying all pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>


	<div class="about-banner">
	<?php $img = get_banner(); ?>
	<img class="bg" src= <?php echo $img; ?>>   </div>
	</div>
	</div>

	<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'template-parts/content', 'page' ); ?>
	<h1> This is my about page </h1>
	<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>



	<?php 
	/*
	$image = get_field( 'banner' );
	if ( !empty( $image ) ) { ?>
	<div class="banner" style="background-image:url('<?php echo $image['url']; ?>');">
	<?php }
	?>
	</div>
	</div>



	<?php //get_sidebar(); ?>
	<?php get_footer(); ?>


