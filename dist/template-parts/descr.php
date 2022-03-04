<section class="descr-sect descr-sect-<?php echo $section['view'] ?> sect container"<?php echo $section_id ?>>
  <h2 class="descr-sect__title sect-title sect-title-underline"><?php echo $section['title'] ?></h2> <?php
  $start = 0;
  if ( $section['view'] === '1' ) :
    $start = 1 ?>
    <p class="descr-sect__descr"><?php echo $section['descr'][0]['p'] ?></p> <?php
  endif;
  if ( is_front_page() ) : ?>
    <!-- <video src="<?php #echo $template_directory ?>/video/profession.mp4" class="descr-sect__pic" controls autoplay></video> -->
    <iframe class="descr-sect__pic" src="https://www.youtube.com/embed/TWlg9_vmp7c?autoplay=1&amp;mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> <?php
  else :
    create_picture( 'descr-sect', $section['img'] );
  endif;
  for ( $i = $start, $len = count( $section['descr'] ); $i < $len; $i++) : ?>
    <p class="descr-sect__descr"><?php echo $section['descr'][ $i ]['p'] ?></p> <?php
  endfor ?>
</section> <?php
unset( $section_id, $start ) ?>