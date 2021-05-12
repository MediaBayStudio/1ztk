<section class="system-sect sect sect-green-bg container"<?php echo $section_id ?>>
  <h2 class="system-sect__title sect-title sect-title-underline"><?php echo $section['title'] ?></h2>
  <ul class="system-sect__list"> <?php
    foreach ( $section['list'] as $li ) : ?>
      <li class="system-sect__li"><p class="system-sect__li-text"><?php echo $li['li'] ?></p></li> <?php
    endforeach ?>
  </ul>
</section> <?php
unset( $section_id, $li ) ?>