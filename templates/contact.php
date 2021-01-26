<?php /* Template Name: Contact */  
get_header();
?>
	<div id="loader" class="loader">
    <img src="<?php bloginfo('template_url'); ?>/assets/img/loader.gif" alt="loader">
  </div>
  <section class="contact-top">
    <div class="container">
      <h1><?php the_field('contact_title'); ?></h1>
      <div class="row">
        <div id="left" class="row__col">
          <div class="contact-links">
            <h3><?php echo get_field('contact_left')['contact_subtitle']; ?></h3>
            <?php 
              $items = get_field('contact_left')['contact_item'];
              if( $items ) {
                foreach( $items as $item ) { ?>

                  <a href="<?php echo $item['link']; ?>">
                    <img src="<?php echo $item['icon']; ?>" alt="<?php echo $item['label']; ?>">
                    <?php echo $item['label']; ?>
                  </a>
                  <?php
                }
              } 
            ?>
          </div>
          <div class="contact-links">
            <h3><?php echo get_field('contact_left')['social_subtitle']; ?></h3>
            <?php 
              $items = get_field('contact_left')['social_item'];
              if( $items ) {
                foreach( $items as $item ) { ?>
                  <a target="_blank" href="<?php echo $item['link']; ?>">
                    <img src="<?php echo $item['icon']; ?>" alt="<?php echo $item['label']; ?>">
                    <?php echo $item['label']; ?>
                  </a>
                  <?php
                }
              } 
            ?>
          </div>
        </div>
        <div id="middle" class="row__col">
          <div class="contact-links">
            <a target="_blank" href="https://goo.gl/maps/EGfRw7UK3aiVyvZ16">
             <img src="<?php echo get_field('contact_middle')['icon'] ?>" alt="<?php echo get_field('contact_middle')['text'] ?>">
             <?php echo get_field('contact_middle')['text'] ?>
            </a>
          </div>
          <div class="map">
          <?php echo get_field('contact_middle')['iframe'] ?>
          </div>
        </div>
        <div id="right" class="row__col">
          <div class="newsletter newsletter--small bg-red">
            <h3><?php echo get_field('right')['subtitle']; ?></h3>
           <img src="<?php echo get_field('right')['image']; ?>" alt="newsletter">
           <?php 
            $mailchimp = get_field('right')['newsletter_shortcode'];
            echo do_shortcode( $mailchimp );
          ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php 
get_footer();
?>