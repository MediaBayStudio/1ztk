<section class="enjoy-sect sect-green-bg container"<?php echo $section_id ?>>
  <h2 class="enjoy-sect__title sect-title sect-title-underline"><?php echo $section['title'] ?></h2>
  <ul class="enjoy-sect__links enjoy-links"> <?php
    foreach ( $section['links'] as $link ) :
      switch ( $link ) {
        case 'vk':
          $href = $vk_link;
          $src = 'icon-vk-white.svg';
          break;

        case 'instagram':
          $href = $instagram_link;
          $src = 'icon-instagram-white.svg';
          break;

        case 'youtube':
          $href = $youtube_link;
          $src = 'icon-youtube-white.svg';
          break;
         
        default:
          $href = null;
          break;
       } ?>
      <li class="enjoy-links__li">
        <a href="<?php echo $href ?>" target="_blank" class="enjoy-links__link">
          <img src="#" alt="#" data-src="<?php echo $template_directory . '/img/' . $src ?>" class="enjoy-links__img lazy">
        </a>
      </li> <?php
    endforeach ?>
  </ul>
</section> <?php
unset( $section_id, $li ) ?>