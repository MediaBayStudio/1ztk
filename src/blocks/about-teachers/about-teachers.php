<section class="about-teachers-sect sect container"<?php echo $section_id ?>>
  <h2 class="about-teachers-sect__title sect-title sect-title-underline"><?php echo $section['title'] ?></h2>
  <p class="about-teachers-sect__descr"><?php echo $section['descr'] ?></p>
  <div class="about-teachers-sect__teachers teachers">
    <div class="teachers__nav slider-nav">
      <div class="teachers__counter slider-counter"></div>
    </div> <?php
    foreach ( $section['teachers'] as $teacher ) : ?>
      <div class="teachers__teacher">
        <picture class="teacher__pic lazy">
          <source type="image/webp" srcset="#" data-srcset="<?php echo str_replace( '.jpg', '.webp', $teacher['img']['url'] ) ?>">
          <img src="#" alt="#" data-src="<?php echo $teacher['img']['url'] ?>" class="teacher__img">
        </picture>
        <span class="teacher__title"><?php echo $teacher['title'] ?></span>
        <p class="teacher__descr"><?php echo $teacher['descr'] ?></p>
        <a href="mailto:<?php echo $teacher['email'] ?>" class="teacher__email"><?php echo $teacher['email'] ?></a>
      </div>

      <div class="teachers__teacher">
        <picture class="teacher__pic lazy">
          <source type="image/webp" srcset="#" data-srcset="<?php echo str_replace( '.jpg', '.webp', $teacher['img']['url'] ) ?>">
          <img src="#" alt="#" data-src="<?php echo $teacher['img']['url'] ?>" class="teacher__img">
        </picture>
        <span class="teacher__title"><?php echo $teacher['title'] ?></span>
        <p class="teacher__descr"><?php echo $teacher['descr'] ?></p>
        <a href="mailto:<?php echo $teacher['email'] ?>" class="teacher__email"><?php echo $teacher['email'] ?></a>
      </div>
      
      <div class="teachers__teacher">
        <picture class="teacher__pic lazy">
          <source type="image/webp" srcset="#" data-srcset="<?php echo str_replace( '.jpg', '.webp', $teacher['img']['url'] ) ?>">
          <img src="#" alt="#" data-src="<?php echo $teacher['img']['url'] ?>" class="teacher__img">
        </picture>
        <span class="teacher__title"><?php echo $teacher['title'] ?></span>
        <p class="teacher__descr"><?php echo $teacher['descr'] ?></p>
        <a href="mailto:<?php echo $teacher['email'] ?>" class="teacher__email"><?php echo $teacher['email'] ?></a>
      </div> <?php
    endforeach ?>
  </div>
</section>