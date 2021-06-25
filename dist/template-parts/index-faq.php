<section class="index-faq-sect sect container"<?php echo $section_id ?>>
  <h2 class="index-faq-sect__title sect-title sect-title-underline"><?php echo $section['title'] ?></h2>
  <ul class="index-faq-sect__list faq"> <?php
    foreach ( $section['faq'] as $li ) : ?>
      <li class="faq__item">
        <div class="faq__question"><span class="faq__question-text"><?php echo $li['q'] ?></span><span class="faq__question-cross"></span></div>
        <p class="faq__answer"><?php echo $li['a'] ?></p>
      </li> <?php
    endforeach ?>
  </ul>
</section>