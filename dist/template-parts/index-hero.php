<section class="index-hero-sect sect container"<?php echo $section_id ?>>
  <div class="index-hero-sect__text">
    <h1 class="index-hero-sect__title sect-h1"><?php echo $section['title'] ?></h1> <?php
    if ( $section['descr'] ) : ?>
      <p class="index-hero-sect__descr"><?php echo $section['descr'] ?></p> <?php
    endif;
    if ( $section['btn'] ) : ?>
      <button type="button" class="index-hero-sect__btn btn btn-blue" id="hero-btn" data-scroll-target=".index-contacts-sect__title" onclick="scrollToTarget(event)"><?php echo $section['btn'] ?></button> <?php
    endif ?>
  </div>
  <div class="index-hero-sect__slider"> <?php
  $slides_count = count( $section['images'] );

  create_picture( 'index-hero-sect', $section['images'][0], false );

  if ( $slides_count > 1 ) {
    $start = 1;
    for ( $i = $start; $i < $slides_count; $i++ ) {
      create_picture( 'index-hero-sect', $section['images'][ $i ], true, '', true, 'hide' );
    } 
  } ?>
    <div class="index-hero-sect__nav">
      <div class="index-hero-sect__counter"></div>
    </div>
  </div>
</section> <?php
unset( $section_id, $start, $slides_count ) ?>