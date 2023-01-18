<?php 
    while(have_posts()):
            cthe_post();
        the_title('<h1 class="text-center texto-primario">','<h1>');

        if(has_post_thumbnail()){
            the_post_thumbnail( 'full', array('class' => 'imagen-destacada'));
         }
    
       
        the_content();
    endwhile;    