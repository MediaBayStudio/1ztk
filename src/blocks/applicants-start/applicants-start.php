<section class="applicants-start-sect sect container lazy" data-src="#"<?php echo $section_id ?>>
  <picture class="applicants-start-sect__pic lazy">
    <source type="image/webp" srcset="#" data-srcset="<?php echo $template_directory ?>/img/applicants-start-img.webp">
    <img src="#" alt="#" data-src="<?php echo $template_directory ?>/img/applicants-start-img.jpg" class="applicants-start-sect__img">
  </picture>
  <div class="applicants-start-sect__text">
    <h2 class="applicants-start-sect__title sect-title sect-title-underline"><?php echo $section['title'] ?></h2> <?php
    echo do_shortcode( '[contact-form-7 id="' . $section['form']->ID . '" html_class="applicants-start-sect__form" html_id="applicants-form"]' ) ?>
  </div>
</section>