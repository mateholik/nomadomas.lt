<?php /* Template Name: Homepage */  
get_header();
?>
	<div id="loader" class="loader">
    <img src="<?php bloginfo('template_url'); ?>/assets/img/loader.gif" alt="loader">
  </div>
  
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
  <section id="about" class="about" style="background-color: <?php the_field('about_background_color'); ?>">
    <div class="container">
      <h2><?php echo get_field('about_title'); ?></h2>
      <div class="flex-wrap">
      <?php 
        $items = get_field('about_item');
        if( $items ) {
          foreach( $items as $item ) { ?>
            <div class="item">
              <div class="item__icon">
                <img src="<?php echo $item['icon']; ?>" alt="<?php echo $item['label']; ?>">
              </div>
              <h3 class="item__title">
                <?php echo $item['label']; ?>
              </h3>
              <div class="test">
              <?php echo $item['text']; ?>
              </div>
            </div>
            <?php
          }
        } 
      ?>
      </div>
    </div>
  </section>

  <section id="services" class="services" style="background-color: <?php the_field('services_background_color'); ?>">
    <div class="container">
      <h2 id="servicesHeader"><?php echo get_field('services_title'); ?></h2>
      <div class='text'><?php echo get_field('services_text'); ?>
      </div>
      <div class="flex-wrap">
        <?php 
          $items = get_field('services_item');
          if( $items ) {
            foreach( $items as $item ) { ?>

              <a href="<?php echo $item['link']; ?>" class="item">
                <div class="wrapper">
                  <h5 class="item__title"><?php echo $item['label']; ?></h5>
                  <div class="item__img">
                    <img src="<?php echo $item['icon']; ?>" alt="<?php echo $item['label']; ?>">
                  </div>
                  <div class="item__content">
                    <?php echo $item['text']; ?> 
                    <button><?php echo $item['button_text']; ?> </button>
                  </div>
                </div>
              </a>

              <?php
            }
          } 
        ?>
      </div>
    </div>
  </section>

  <section class="newsletter" style="background-color: <?php the_field('news_background_color'); ?>">
    <div class="container">
      <div class="row">
        <div class="row__col left">
          <img src="<?php echo get_field('news_image'); ?>" alt="newsletter">
        </div>
        <div class="row__col">
          <h2><?php echo get_field('news_title'); ?></h2>
          <div class="right">
            <p><?php echo get_field('news_text'); ?></p>
            <?php 
              $mailchimp = get_field('mailchimp_shortcode');
              echo do_shortcode( $mailchimp );
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="whyUs" class="whyus bg-green" style="background-color: <?php the_field('us_background_color'); ?>">
    <div class="container">
      <h2>
      <?php the_field('us_title'); ?>
      </h2>
      <div class="flex-wrap">
        <?php 
          $items = get_field('us_items');
          if( $items ) {
            foreach( $items as $item ) { ?>

              <div class="item">
                <div class="wrapper">
                  <div class="item__img">
                    <img src="<?php echo $item['icon']; ?>" alt="icon">
                  </div>
                  <div class="item__content">
                    <h5><?php echo $item['label']; ?></h5>
                    <?php echo $item['text']; ?>
                  </div>
                </div>
              </div>

              <?php
            }
          } 
        ?>
      </div>
    </div>
  </section>

  <section class="partners">
    <div class="container">
      <h2><?php the_field('partners_title'); ?></h2>
      <div class="flex-wrap">
        <?php 
          $items = get_field('partners_logos');
          if( $items ) {
            foreach( $items as $item ) { ?>
              <div class="item">  
                <img src="<?php echo $item['url']; ?>" alt="partner logo">
              </div>
              <?php
            }
          } 
        ?>
      </div>
    </div>
  </section>

<?php 
get_footer();
?>