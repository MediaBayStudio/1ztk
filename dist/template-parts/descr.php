<section class="descr-sect descr-sect-<?php echo $section['view'] ?> sect container"<?php echo $section_id ?>>
  <h2 class="descr-sect__title sect-title sect-title-underline"><?php echo $section['title'] ?></h2> <?php
  $start = 0;
  if ( $section['view'] === '1' ) :
    $start = 1 ?>
    <p class="descr-sect__descr"><?php echo $section['descr'][0]['p'] ?></p> <?php
  endif;
  create_picture( 'descr-sect', $section['img'] );
  for ( $i = $start, $len = count( $section['descr'] ); $i < $len; $i++) : ?>
    <p class="descr-sect__descr"><?php echo $section['descr'][ $i ]['p'] ?></p> <?php
  endfor ?>
</section> <?php
unset( $section_id, $start ) ?>