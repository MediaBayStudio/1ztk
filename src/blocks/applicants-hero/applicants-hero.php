<section class="applicants-hero-sect container"<?php echo $section_id ?>>
  <h1 class="applicants-hero-sect__title sect-h1 sect-title-underline"><?php echo $section['title'] ?></h1>
  <picture class="applicants-hero-sect__pic">
    <source type="image/webp" srcset="<?php echo str_replace( '.jpg', '.webp', $section['img']['url'] ) ?>">
    <img src="<?php echo $section['img']['url'] ?>" alt="#" class="applicants-hero-sect__img">
  </picture>
  <p class="applicants-hero-sect__descr"><?php echo $section['descr'] ?></p>
</section>