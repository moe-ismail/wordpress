<?php

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>


            </header>


        <?php endif; ?>

        
        </main>

        <?php while ( have_posts() ) : the_post(); ?>
            
            <?php the_post_thumbnail() ?>
            <?php the_title() ?>



             <div class="price"> <p> <?php echo  get_field('product_price'); ?> </p> </div>
             
        
        
            
    </div>

        <?php endwhile; ?>