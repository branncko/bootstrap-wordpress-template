<?php /* Template name: Barra a esquerda */?>

<?php get_header();?>

<div class="row">

	 <?php get_sidebar(); ?>


        <div class="col-md-6 col-sm-12">
          
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <h3 class="mb-3"><?php  the_title();?></h3>
            <div class="row">
              <?php the_content(); ?>
            </div>
          <? endwhile; endif;?>
        </div>

      </div>

<?php get_footer();?>