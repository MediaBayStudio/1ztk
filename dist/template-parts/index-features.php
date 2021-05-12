<section class="features-sect sect container"<?php echo $section_id ?>>
  <h2 class="features-sect__title sect-title sect-title-underline"><?php echo $section['title'] ?></h2>
  <ul class="features-sect__list"> <?php
    foreach ( $section['list'] as $li ) : ?>
      <li class="features-sect__li">
        <img src="#" alt="#" data-src="<?php echo $li['img']['url'] ?>" class="features-sect__li-bg lazy">
        <picture class="features-sect__li-pic">
          <img src="#" alt="<?php echo $li['title'] ?>" data-src="<?php echo $li['img']['url'] ?>" class="features-sect__li-img lazy">
        </picture>
        <span class="features-sect__li-title sect-h2"><?php echo $li['title'] ?></span>
        <p class="features-sect__li-descr"><?php echo $li['descr'] ?></p>
      </li> <?php
    endforeach ?>
  </ul>
</section> <?php
unset( $section_id, $li ) ?>