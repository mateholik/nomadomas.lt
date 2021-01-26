<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package adomas
 */

?>

  <?php
   $footer_sections = get_field('footer_sections');

    if($footer_sections['paslaugos_lt'] == 'Yes') { ?>
      <section class="recommend bg-blue">
        <div class="container">
          <a target="_blank" href="https://paslaugos.lt/blogas/google-ads-adwords-reklama-paslaugos-lt-puslapiui">
            Mus rekomenduoja
            <img src="<?php bloginfo('template_url'); ?>/assets/img/paslaugos.svg" alt="paslaugos">
          </a>
        </div>
      </section> 
      <?php
    } 

  

    if($footer_sections['show_form'] == 'Yes') { ?>
        <section id="contact" class="contact">
          <div class="container">
            <div class="title-image">
              <img src="<?php echo get_field('footer', 'options')['form_title_image']; ?>" alt="image">
            </div>
            <?php echo do_shortcode('[hf_form slug="contact-form"]') ?>
            
          </div>
        </section>
      <?php
     } 
  ?>


  <?php
  $footer = get_field('footer', 'options');
  if( $footer ): ?>
  <footer>
    <div class="top">
      <div class="container">
        <div class="row">
          <div class="row__col">
            <img src="<?php echo $footer['logo'] ?>" alt="logo">
          </div>
          <div class="row__col contact-links">
            <?php 
            if( $footer['contacts'] ) {
              foreach( $footer['contacts'] as $item ) { ?>
                <a href="<?php echo $item['link'] ?>">
                  <img src="<?php echo $item['icon'] ?>" alt="icon">
                  <?php echo $item['label'] ?>
                </a>
              <?php 
              }
            }
            ?>
          </div>
          <div class="row__col">
          <?php echo $footer['text'] ?>
          </div>
        </div>
      </div>
    </div>
    <div class="bottom">
      <div class="container">
        <div class="wrap">
          <div class="text"><?php echo $footer['bottom']['text'] ?></div>
          <div class="icons-social">
            <?php 
            if( $footer['bottom']['socials'] ) {
              foreach( $footer['bottom']['socials'] as $item ) { ?>
                <a target="_blank" href="<?php echo $item['link'] ?>">
                  <img src="<?php echo $item['icon'] ?>" alt="linkedin">
                </a>
              <?php 
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <?php endif; ?>


<?php wp_footer(); ?>

</body>
</html>
