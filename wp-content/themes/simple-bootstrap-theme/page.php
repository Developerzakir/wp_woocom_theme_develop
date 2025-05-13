<?php get_header(); ?>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
              
                  

                    <?php

                    if(have_posts()){
                        while(have_posts()){
                            the_post();

                            ?>

                                <div class="card mb-4">
                                    <a href="#!">
                                       <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('large', ['class' => 'card-img-top', 'alt' => get_the_title()]); ?>
                                        <?php else : ?>
                                            <img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="No image available">
                                        <?php endif; ?>
                                    </a>

                                    <div class="card-body">
                                        <div class="small text-muted"><?php echo get_the_date(); ?></div>
                                        <h2 class="card-title"><?php the_title(); ?></h2>
                                        <p class="card-text"><?php the_content(); ?></p>
                                       
                                    </div>
                                </div>

                            <?php 
                        }
                    }
                    
                    
                    ?>
                   
               
               
             
            </div>
        </div>
     

        <?php get_footer(); ?>