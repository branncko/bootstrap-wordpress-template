

<?php 

//adicionar suportes

function bs4wp_theme_support() {
   add_theme_support('title-tag');
   add_theme_support('post-formats', array('aside', 'image'));
   add_theme_support('custom-logo');
}

add_action('after_setup_theme', 'bs4wp_theme_support');

//Prevenir erro na tag title

if(!function_exists('wp_render_title_tag')) {
    function bs4wp_render_title() {
    	?>
    	<title><?php  wp_title('|', true, 'right');?></title>
    	<?php 
    }

    add_action('wp_head', 'bs4wp_render_title');
}


//Registra o bootstrap nav walker

require_once get_template_directory(). '/class-wp-bootstrap-navwalker.php';


// Registrar os menus 

register_nav_menus(array(
   'principal' => __('menu principal', 'bs4wp')
));


//Definir as miniaturas dos posts

add_theme_support('post-thumbnails');
set_post_thumbnail_size(1280,  720, true);


// Definir o tamanho do resumo

 add_filter('excerpt_length', function($length) {
 	return 50;
 });


//btn btn-outline-my-color-5


 // definir a paginação

 add_filter('next_posts_link_attributes', 'posts_link_attributes');

 add_filter('previous_posts_link_attributes', 'posts_link_attributes');

 function posts_link_attributes() {
 	return 'class="btn btn-outline-my-color-5"';
 }

 // Definir sidebar


 register_sidebar(
 	array(
      'name' => 'Barra Lateral',
      'id' => 'sidebar',
      'before_widget' => '<div class="card mb-4">',
      'after_widget' => '</div> </div>',
      'before_title' => '<h5 class="card-header">',
      'after_title' => '</h5> <div class="card-body">'
 	));

// Definir  área de busca
 register_sidebar(
  array(
      'name' => 'Busca',
      'id' => 'busca',
      'before_widget' => '<div class="blog-search">',
      'after_widget' => '</div>',
      'before_title' => '<h5>',
      'after_title' => '</h5>',
      
  ));

 // Ativar o formulário de contato

 function theme_queue_js(){
  if((!is_admin()) && is_singular() && comments_open() && get_option('thread_comments')) wp_enqueue_script('comment-reply');
 }

 add_action('wp_print_scripts', 'theme_queue_js');

 //Personaliszar  os comentários

 function format_comment($comment, $args, $depth) {

  $GLOBALS['comment'] - $comment; ?>

  <div <?php comment_class('ml-4')?> id="comment<?php comment_ID(); ?>">

    <div class="card mb-3">
      <div class="card-body">
        <div class="comment-intro">
          <h5 class="card-title"></h5><?php  printf(__('%s'), get_comment_author_link()); ?></h5>
          <h6 class="card-subtitle mb-3 text-muted"> comentou em <?php printf(__('%1$s'), get_comment_date('d/m/y'), get_comment_time('h:i:s'));   ?></h6>
      </div>
      <?php comment_text(); ?>
      <div class="reply">
        <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
      </div>
    </div>
  </div>

    <?php

 }


 //criar  tipo de post para o banner


 function create_post_type() {


    register_post_type('banners',
      array(
        'labels' => array('name' => __('banners'),
          'singular_name' => __('banners')),
        'supports' => array(
          'title', 'editor', 'thumbnail'
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-images-alt2',
        'rewrite' => array('slug' => 'banners')
      ));
 }


 //iniciar o tipo de post

 add_action('init', 'create_post_type');



 //   adicionar personalização

 require get_template_directory(). '/inc/customizer.php';
  
?>




