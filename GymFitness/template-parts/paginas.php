<?php while(have_posts()): the_post();?>
 
    <?php
      if(has_post_thumbnail()):
       the_post_thumbnail('blog', array('class' => 'imagen-destacada'));
        // else:
            //   echo "--No hay imagen destacada--";
       endif;
    ?>      
    
    <?php 

        if(get_post_type() === 'gymfitness_clases'){
         
                    $hora_inicio = get_field('hora_inicio');
                    $hora_fin    = get_field('hora_fin');
    ?>
            <p class="informacion-clases"><?php the_field('dias_clase'); ?> - <?php echo $hora_inicio . " a " .$hora_fin; ?></p>

       <?php } ?>
    <p><?php the_content(); ?></p>
<?php endwhile; ?>