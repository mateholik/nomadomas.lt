<?php /* Template Name: Archive */  

get_header();

$args = array(
  'post_type'      => 'post',
  'posts_per_page' => -1
);

$query = new WP_Query($args);
?>


<div id="loader" class="loader">
  <img src="<?php bloginfo('template_url'); ?>/assets/img/loader.gif" alt="loader">
</div>

<section class="blog-archive">
    <div class="container">
      <h1>Straipsniai</h1>
      <div class="flex-wrap">

        <?php
        add_filter( 'the_title', 'max_title_length');
        if ( $query->have_posts() ) : 
          while ( $query->have_posts() ) : $query->the_post();?>

            <a href="<?php the_permalink(); ?>" class="item">
              <div class="wrapper">
                <h3 class="item__title">
               
                <?php echo the_title(); ?>
                </h3>
                <div class="item__wrap">
                  <div class="item__img">
                    <!-- <img src="assets/img/blog_thumb.jpeg" alt="thumb"> -->
                    <?php echo get_the_post_thumbnail( $post_id, 'post-thumb' ); ?>
                  </div>
                  <div class="item__content">
                    <p class="item__text">
                      <?php echo get_excerpt(); ?>
                    </p>
                    <!-- <span class="item__date">Paskelbta: 18 spalio, 2020.</span> -->
                    <span class="item__date">
                      <?php the_time('F d, Y'); ?>,	&nbsp;
                      <?php the_author(); ?>
                    </span>
                    <div class="cta">Plačiau</div>
                  </div>
                </div>
              </div>
            </a>

          <?php endwhile; 

        else :?>
            <!-- <?php get_template_part( 'template-parts/content', 'none' );?> -->
          
            <?php  echo 'nera postu'; ?>
        <?php endif; 
        remove_filter( 'the_title', 'max_title_length');
        ?>

    </div>
  </div>
</section>

<?php 
get_footer();
?>