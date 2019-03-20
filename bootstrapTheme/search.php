<?php get_header(); ?>

      <div class="row">
      <div class="col-md-8 col-sm-12">
       <?php  
       if(is_search()):
       	$total_results = $wp_query->found_posts;

       	echo '<h3 class="mb-3">'. sprintf(__('%s resultado(s) para o termo %s', 'BS4WP'), $total_results, get_search_query()) . '</h3>';

       endif;

       ?>

       <div class="blog-post">

       <?php if(have_posts()): while(have_posts()): the_post(); ?>

          <?php get_template_part('content', get_post_format()); ?>


        <?php endwhile; ?>



        <?php  else:
           echo "<p>Sua  busca não retornou  resultados. Use o formulário a seguir para fazer outra pesquisa</p>";
           get_search_form(); endif;?>

       </div>

       <div class="blog-pagination mb-5">
             <?php next_posts_link(' Mais antigos'); ?><?php previous_posts_link('Mais novos')?>
          </div>



      </div>
        
        <?php get_sidebar(); ?>

      </div>


<?php get_footer(); ?>