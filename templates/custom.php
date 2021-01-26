<?php /* Template Name: Custom */  
get_header();
?>
<section class="hero">
    <div class="container">
      <div class="row">
        <div id="heroLeft" class="row__col">
          <img src="<?php echo get_field('hero_left_image'); ?>" alt="hero1">
        </div>
        <div id="heroRight" class="row__col">
          <img src="<?php echo get_field('hero_right_image'); ?>" alt="hero2">
        </div>
      </div>
      <div id="heroBottom" class="row">
        <img src="<?php echo get_field('hero_bottom_image'); ?>" alt="hero3">
        <a id="cta" class="cta" href="<?php echo get_field('hero_cta')['link']; ?>"><?php echo get_field('hero_cta')['text']; ?></a>
      </div>
    </div>
  </section>
  <section class="description bg-green">
    <div class="container">
      <h2><?php the_field('desc_title'); ?></h2>
      <div class="wrap">
        <main>
          <div class="content">
            <div class="content__text"><?php the_field('desc_text'); ?>
            </div>
            <div class="points">
              <?php 
                $items = get_field('desc_points');
                if( $items ) {
                  foreach( $items as $item ) { ?>

                  <h6 class="item">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/check.svg" alt="check">
                    <?php echo $item['label']; ?>
                  </h6>

                    <?php
                  }
                } 
              ?>
            </div>
            <?php
              if(get_field('show_videos_section') == 'Yes') { ?>
                <div class="content__examples">
                  <h2><?php the_field('videossection__title'); ?></h2>
                </div>
                <?php
                  $videos = get_field('vimeography_gallery_shortcode');
                  echo do_shortcode( $videos ); ?>
                <?php 
              } 
            ?>

            <?php   
              if(get_field('show_photos_section') == 'Yes') { ?>
                <div class="content__examples">
                  <h2><?php the_field('photos_section__title'); ?></h2>
                </div>
                <?php
                  $photos = get_field('photos_gallery_shortcode');
                  echo do_shortcode( $photos ); ?>
                <?php 
              } 
            ?>
          </div>
        </main>
        <!-- <sidebar class="sidebar">
          <h4>Kitos paslaugos:</h4>
          <?php
            wp_nav_menu(
              array(
                'theme_location' => 'menu-2',
                'container'=> false,
              )
            );
          ?>
        </sidebar> -->
      </div>
    </div>
  </section>
<?php 
get_footer();
?>