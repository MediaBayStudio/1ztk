<section class="steps-sect sect-lightgreen-bg container lazy" data-src="#"<?php echo $section_id ?>>
  <h2 class="steps-sect__title sect-title sect-title-underline"><?php echo $section['title'] ?></h2>
  <ul class="steps-sect__list"> <?php
    foreach ( $section['list'] as $li ) : ?>
      <li class="steps-sect__li"><p class="steps-sect__li-descr"><?php echo strip_tags( $li['descr'], '<a><br><span>' ) ?></p></li> <?php
    endforeach ?>
  </ul>
  <div class="steps-sect__note">
    <span class="steps-sect__note-title"><?php echo $section['note']['title'] ?></span>
    <p class="steps-sect__note-text"><?php echo $section['note']['descr'] ?></p>
  </div>
</section> <?php
unset( $section_id, $li ) ?>