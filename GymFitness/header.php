<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class();?>>

<header class="site-header">
        <div class="contenedor">
            <div class="barra-navegacion">
                  <div class="logo">
                        <a href="<?php echo site_url('/');?>">
                            <img class="logo" src="<?php echo get_template_directory_uri();?>/img/logo.svg" alt="logo del sitio">
                        </a>
                  </div>
                  <?php
                    $args = array(
                        'theme_location' =>  'menu-principal', 
                        'container' => 'nav',
                        'container_class' => 'menu_principal'
                    );
                    wp_nav_menu($args);
                  ?>
            </div>
        </div>
        <?php if(is_front_page()){ ?>
            <div class="tag-line text-center contenedor">
                <h1 class="ml2"><?php the_field('hero_heading');?></h1>
                 <p><?php the_field('hero_texto');?></p>
            </div>
        <?php } ?>   
</header>
    
