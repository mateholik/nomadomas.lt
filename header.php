<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package adomas
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

  <?php
  $header = get_field('header', 'options');
  if( $header ): ?>

	<header>
    <div class="container container--mob-no-padding">
      <div class="wrap">
        <div class="wrap__left">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
            <img src="<?php echo esc_url( $header['logo']); ?>" alt="logo">
          </a>
          <nav class="desktop">
          <?php
            wp_nav_menu(
              array(
                'theme_location' => 'menu-1',
                'container'=> false,
              )
            );
          ?>
          </nav>
        </div>
        <div class="wrap__right">
          <div class="ctas">
            <?php 
            if( $header['contacts'] ) {
              foreach( $header['contacts'] as $item ) { ?>
                <a href="<?php echo $item['link'] ?>">
                  <img src="<?php echo $item['icon'] ?>" alt="icon">
                </a> 
              <?php 
              }
            }
            ?>
          </div>
          <div class="lang">
            <a href="<?php echo $header['language']['lt_flag_link']; ?>">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/LTU.svg" alt="LTU">
            </a>
            <a href="<?php echo $header['language']['eng_flag_link']; ?>">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/GBR.svg" alt="GBR">
            </a>
          </div>
        </div>
        <div class="ctas ctas--mob">
          <?php 
            if( $header['contacts'] ) {
              foreach( $header['contacts'] as $item ) { ?>
                <a href="<?php echo $item['link'] ?>">
                  <img src="<?php echo $item['icon'] ?>" alt="icon">
                </a> 
              <?php 
              }
            }
          ?>
        </div>
        <div id="burger" class="hamburger hamburger--vortex">
          <div class="hamburger-box">
            <div class="hamburger-inner"></div>
          </div>
        </div>
        <nav id="mobMenu" class="mobile">
          <?php
            wp_nav_menu(
              array(
                'theme_location' => 'menu-1',
                'container'=> false,
              )
            );
          ?>
          <div class="lang">
            <a href="#">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/LTU.svg" alt="flag">
            </a>
            <a href="#">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/GBR.svg" alt="GBR">
            </a>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <div class="spacer"></div>

  <?php 
    if ( get_post_type() === 'post'	) {
     ?>
     <div id="loader" class="loader">
      <img src="<?php bloginfo('template_url'); ?>/assets/img/loader.gif" alt="loader">
    </div>
     <?php
    }
  ?>

  <?php endif; ?>