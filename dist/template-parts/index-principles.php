<section class="principles-sect sect-green-bg container lazy" data-src="#"<?php echo $section_id ?>>
  <h2 class="principles-sect__title sect-title sect-title-underline"><?php echo $section['title'] ?></h2>
  <ul class="principles-sect__list"> <?php
    foreach ( $section['list'] as $li ) : ?>
      <li class="principles-sect__li">
        <img src="#" alt="<?php echo $li['title'] ?>" data-src="<?php echo $li['img']['url'] ?>" class="principles-sect__li-img lazy">
        <div class="principles-sect__li-text">
          <span class="principles-sect__li-title sect-h2"><?php echo $li['title'] ?></span>
          <p class="principles-sect__li-descr"><?php echo $li['descr'] ?></p>
        </div>
      </li> <?php
    endforeach ?>
  </ul>
</section> <?php
unset( $section_id, $li ) ?>