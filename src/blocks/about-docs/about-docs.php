<section class="about-docs-sect sect container"<?php echo $section_id ?>>
  <h2 class="about-docs-sect__title sect-title sect-title-underline"><?php echo $section['title'] ?></h2>
  <ul class="about-docs-sect__list docs"> <?php
    foreach ( $section['docs'] as $doc ) : ?>
      <li class="docs__item">
        <a href="<?php echo $doc['file']['link'] ?>" class="docs__item-link">
          <p class="docs__item-title"><?php echo $doc['title'] ?></p>
          <img src="#" alt="#" data-src="<?php echo $template_directory ?>/img/icon-pdf.svg" class="docs__item-icon lazy">
        </a>
      </li> <?php
    endforeach ?>
  </ul>
</section>