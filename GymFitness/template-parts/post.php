<?php while(have_posts()): the_post();?>
 
    <h1 class="text-center texto-primario"><?php the_title(); ?></h1>
    <?php
      if(has_post_thumbnail()):
            the_post_thumbnail('blog', array('class' => 'imagen-destacada'));
            // else:
            //   echo "--No hay imagen destacada--";
       endif;
    ?>      

    <div class="meta-info">
            <p class="meta">
                <span>Por: </span>
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                    <?php  echo get_the_author_meta('display_name') ?>
                </a>
            </p>
            <p class="meta">
                <span>Fecha: </span>
                <?php the_time(get_option('date_format')); ?>
            </p>
               <!-- <div class="categorias">
                  <p class="categoria">
                        <span>Categoria: </span>
                        <?php the_category(); ?>
                </p>
            </div>-->
    </div>
    <p><?php the_content(); ?></p>
<?php endwhile; ?>