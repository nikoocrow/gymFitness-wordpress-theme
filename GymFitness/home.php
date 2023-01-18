<?php get_header(); ?>

        <main class="seccion contenedor">
            <ul class="lista-clases">
                <?php

                    while(have_posts()): 
                        the_post();
                        get_template_part('template-parts/blog');
                    endwhile;    
                ?>
            </ul>
            <?php
                the_posts_pagination();
            ?>
        </main>
<?php get_footer(); ?>