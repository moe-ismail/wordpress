		<?php
/**
 * The template for displaying all pages.
 *
 * @package RED_Starter_Theme
 */
		 get_header();
		      
		?>

		<h2>This is a single post</h2>
		<p>  ""        "</p>

		<div class="row">

		<div class="col-xs-12 col-sm-8">

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		</article>

		<div class="banner">
	<?php $img = get_banner(); ?>
	
	<img src= <?php echo $img; ?>>   </div>
	</div>
	</div>


	
<section>

<?php  
	$terms = get_terms(  'activity', array(
	'Taxonomy' => 'activity',
	'hide_empty' => 0

	) );

	// Loop for retrieving the Product->Terms ?>
    
    <div class="fp-taxonomy-container row">
        <?php
            foreach($terms as $term){ ?>
                <div class="home-taxonomy-link col">
                        <div class="taxonomy-img"><img src="<?php echo bloginfo('template_directory').'/assets/images/product-type-icons/'.$term->slug.'.svg'; ?>" /></div>
                        <div class="taxonomy-desc"><?php echo $term->description; ?></div>
                        <a href='<?php echo get_term_link($term->slug, "activity"); ?>'>
                            <button class="taxonomy-btn"><?php echo $term->name." STUFF"; ?></button>
                        </a>
                </div>
            <?php } ?>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2887.2088544256585!2d-79.39997332209131!3d43.64382286116081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b34ded41454b3%3A0x648b029428613f49!2sRED+Academy+Toronto!5e0!3m2!1sen!2sca!4v1503947386016" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    
    <footer>
    	
     <?php get_footer() ?>
    </footer>

    <div class="fp-taxonomy-container">
    <?php
    foreach ($terms as $term) {
    	# cod
    }


