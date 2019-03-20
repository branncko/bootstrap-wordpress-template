<?php get_header();?>

<div class="row">

        <div class="col-md-8 col-sm-12">
          
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <h3 class="mb-3"><?php  the_title();?></h3>
            <div class="row">
              <?php the_content(); ?>
            </div>
          <? endwhile; endif;?>
        </div>

        <?php get_sidebar(); ?>

      </div>

<?php get_footer();?>