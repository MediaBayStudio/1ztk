<section class="about-hero-sect sect container"<?php echo $section_id ?>>
  <div class="about-hero-sect__top">
    <div class="about-hero-sect__top-text">
      <h1 class="about-hero-sect__top-title sect-h1 sect-title-underline"><?php echo $section['title'] ?></h1> <?php
      if ( $section['descr_1'] ) : ?>
        <p class="about-hero-sect__top-descr"><?php echo strip_tags( $section['descr_1'], '<a><br><span>' ) ?></p> <?php
      endif ?>
    </div>
    <picture class="about-hero-sect__top-pic">
      <source type="image/webp" srcset="<?php echo str_replace( '.jpg', '.webp', $section['img']['url'] ) ?>">
      <img src="<?php echo $section['img']['url'] ?>" alt="#" class="about-hero-sect__top-img">
    </picture>
  </div> <?php
  if ( $section['descr_2'] ) : ?>
    <div class="about-hero-sect__bottom">
      <picture class="about-hero-sect__bottom-pic lazy">
        <img src="#" data-src="<?php echo $template_directory ?>/img/logo-three.svg" alt="#" class="about-hero-sect__bottom-img">
      </picture>
      <p class="about-hero-sect__bottom-descr"><?php echo strip_tags( $section['descr_2'], '<a><br><span>' ) ?></p>
    </div> <?php
  endif ?>
</section> <?php
unset( $section_id, $start, $slides_count ) ?>