<?php
/**
 * The template for displaying all pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>
 
    <h1> Find Us </h1> 
	<div class="maps">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2887.2088544306284!2d-79.39997868583967!3d43.6438228610574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b34ded41454b3%3A0x648b029428613f49!2sRED+Academy+Toronto!5e0!3m2!1sen!2sca!4v1503932189328" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	
	</div>

	<h2> We take camping very seriously</h2>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

 <?php //get_sidebar(); ?>
<?php get_footer(); ?>
