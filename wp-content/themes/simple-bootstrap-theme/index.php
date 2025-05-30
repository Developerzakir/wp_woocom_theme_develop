<?php get_header(); ?>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- blog post-->
                  

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
                                        <a class="btn btn-primary" href="<?php the_permalink(); ?>">Read more →</a>
                                    </div>
                                </div>

                            <?php 
                        }
                    }
                    
                    
                    ?>
                   
                    <!-- Pagination-->
                    <!-- <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                            <li class="page-item"><a class="page-link" href="#!">2</a></li>
                            <li class="page-item"><a class="page-link" href="#!">3</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                            <li class="page-item"><a class="page-link" href="#!">15</a></li>
                            <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                        </ul>
                    </nav> -->

                        <div id="products-new-arrivals">
                            <h3>New Arrivals</h3>
                            <?php
                                $new_arrival_limit = get_theme_mod("set_new_arrival_limit");
                                $new_arrival_columns = get_theme_mod("set_new_arrival_column");
                            ?>
                            <?php echo do_shortcode('[products limit="'.$new_arrival_limit.'" columns="'.$new_arrival_columns.'" orderby="date" class="new-arrival-custom-class"]'); ?>
                        </div>

                        <div id="products-popularity">
                            <h3>Popularity</h3>
                            <?php
                                $popularity_limit = get_theme_mod("set_popular_limit");
                                $popularity_columns = get_theme_mod("set_popular_columns");
                            ?>
                            <?php echo do_shortcode('[products limit="'.$popularity_limit.'" columns="'.$popularity_columns.'" orderby="popularity"]'); ?>
                        </div>

                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                             <?php
                               get_search_form();
                             ?>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">Web Design</a></li>
                                        <li><a href="#!">HTML</a></li>
                                        <li><a href="#!">Freebies</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">JavaScript</a></li>
                                        <li><a href="#!">CSS</a></li>
                                        <li><a href="#!">Tutorials</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>
            </div>
        </div>
     

        <?php get_footer(); ?>