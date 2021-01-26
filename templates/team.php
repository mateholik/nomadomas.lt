<?php /* Template Name: Team */  
get_header();
?>
	<div id="loader" class="loader">
    <img src="<?php bloginfo('template_url'); ?>/assets/img/loader.gif" alt="loader">
  </div>
  <section class="team-members">
    <div class="container">
      <h1><?php the_field('team_title'); ?>
      </h1>
      <div class="flex-wrap">
        
        <?php 
          $items = get_field('team_member');
          if( $items ) {
            foreach( $items as $item ) { ?>
              <a href="<?php echo $item['link']; ?>" class="item">
                <div class="item__img">
                <img src="<?php echo $item['image']; ?>" alt="img">
                </div>
                <div class="item__name">
                <?php echo $item['name']; ?>
                </div>
                <div class="item__title"><?php echo $item['position']; ?></div>
              </a>
              <?php
            }
          } 
        ?>

      </div>
      <h2 class="sub"><?php the_field('team_subtitle'); ?></h2>
      <?php the_field('team_text'); ?>
    </div>
  </section>
<?php 
get_footer();
?>