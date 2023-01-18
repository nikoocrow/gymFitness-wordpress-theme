<?php

//Consultas reutilizables
require get_template_directory() . '/inc/queries.php';

//Cuando el Tema es Activado

function gymfitness_setup(){

     //Habilitar Imagenes Destacadas
     add_theme_support('post-thumbnails');
     //Titulos para SEO 
     add_theme_support('title-tag');

     //Agregar imagenes de tamaño personalizado
     add_image_size( 'square',   350, 350, true);
     add_image_size( 'portrait', 350, 724, true);
     add_image_size( 'boxes',    400, 375, true);
     add_image_size( 'medium',   700, 400, true);
     add_image_size( 'blog',     966, 644, true);

}
add_action('after_setup_theme', 'gymfitness_setup');

//MENUS DE NAVEGACION,
//SE PUEDE AGRAGAR MAS USANDO EL ARREGLO
function gymfitness_menus(){
     register_nav_menus(array(
        'menu-principal'  => __('Menú Principal', 'gymfitness'),
        'menu-principal2' => __('Menú Principal2', 'gymfitness')
     ));
}
add_action('init','gymfitness_menus');



// SCRIPTS Y STYLES AQUI
function gymfitness_scripts_styles(){

     //Normalize 
     wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');

     //SlickNav 
     wp_enqueue_style('slicknavCSS', get_template_directory_uri() . '/css/slicknav.min.css', array(), '1.0.0');

     //Google Fonts
     wp_enqueue_style('googleFonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,700;1,400&family=Raleway:wght@400;700;900&family=Staatliches&display=swap', array(), '1.0.0');

     //Lightbox css

     if(is_page('galeria')):
          wp_enqueue_style('LightBoxCSS', get_template_directory_uri() . '/css/lightbox.min.css', array(), '2.11.0');
          wp_enqueue_script('LightBoxJS', get_template_directory_uri(). '/js/lightbox.min.js', array('jquery'), '2.11.0', true);
     endif;


     wp_enqueue_script('animeJS',  'https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js', array(), '2.0.2', true);

     //Swiper CSS
     wp_enqueue_style('swiperCSS', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', array(), '8.4.5',);
     //SlickNav
     wp_enqueue_script('slickNavJS', get_template_directory_uri(). '/js/jquery.slicknav.min.js', array('jquery'), '1.0.0', true);
     //Scripts
     wp_enqueue_script('scriptsJS',  get_template_directory_uri(). '/js/scripts.js', array('jquery', 'slickNavJS'), '1.0.0', true);

     wp_enqueue_script('swiperJS', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array(), '8.4.5', true);

    
     wp_enqueue_script('scriptsJS',  get_template_directory_uri(). '/js/scripts.js', array('animeJS','swiperJS', 'jquery', 'slickNavJS'), '1.0.0', true);

    //Hoja de estilos principal
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize','googleFonts'), '1.0.0');
}
add_action('wp_enqueue_scripts', 'gymfitness_scripts_styles');


//Agrega o Define widgets

function gymfitness_widgets(){

     register_sidebar(array(

          'name'          => 'Sidebar 1',
          'id'            => 'sidebar_1', // Este ID no se puede repetir
          'before_widget' => '<div class="widget">',
          'after_widget'  => '</div>',
          'before_title'  => '<h3 class="text-center texto-primario">',
          'after_title'   => '</h3>' 

     ));


     register_sidebar(array(

          'name'          => 'Sidebar 2',
          'id'            => 'sidebar_2',
          'before_widget' => '<div class="widget">',
          'after_widget'  => '</div>',
          'before_title'  => '<h3 class="text-center texto-primario">',
          'after_title'   => '</h3>' 

     ));

}

add_action('widgets_init', 'gymfitness_widgets');


//Crear ShortCodes


function gymfitness_ubicacion_shorcode(){
   ?>
     <div class="mapa">
          <?php
                if(is_page('contacto')){
                    the_field('ubicacion');
                }
          ?>
     </div>
     <h2 class="texto-primario text-center">Formulario de Contacto</h2>
   <?php
}

add_shortcode( 'gymfitness-ubicacion', 'gymfitness_ubicacion_shorcode');

/** imagenes dinamicas como BACKGROUND */

function gymfitness_hero_imagen(){

               //Obtener el ID de la Página DE inicio
               $from_id = get_option('page_on_front');
               //Obtener la imagen
               $id_imagen = get_field('hero_imagen', $from_id);
               //obtener la ruta de la imagen
               $imagen = wp_get_attachment_image_src($id_imagen,'full')[0];
               //crear CSS
               wp_register_style('custom', false);
               wp_enqueue_style('custom');

               $imagen_destacada_css = "
               body.home .site-header{
                         background-image: linear-gradient( rgb(0 0 0 / .75), rgb(0 0 0 / .75)), url($imagen);
               }
               ";
               //inyectar CSS
               wp_add_inline_style('custom', $imagen_destacada_css);
  }
     
add_action( 'init', 'gymfitness_hero_imagen');
