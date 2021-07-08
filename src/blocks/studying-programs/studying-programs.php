<?php

  if ( $section['manual'] ) {
    $programms = $section['programms'];
  } else {
    $programms = get_posts( [
      'post_type' => 'studying_program',
      'numberposts' => -1,
      'order' => 'ASC'
    ] );
  }

  $hero_sect = '';
  $blocks = '';
  $popups = '';
  $select = '<select name="select" class="submit-form__select" form="submit-form">';

  $i = 1;
  $j = 0;
  foreach ( $programms as $programm ) {
    $programm_fields = get_fields( $programm->ID );
    $programm_img_url = get_the_post_thumbnail_url( $programm->ID );
    $programm_img = '<picture class="studying-program__pic lazy">';
    $programm_full_title = $programm->post_title . ( $programm_fields['opt_text'] ? ' ' . $programm_fields['opt_text'] : '' );

    $section_classes = [
      'studying-program',
      'container',
      'sect'
    ];

    if ( $j === 0 || $j % 3 === 0 ) {
      // Для каждой первой итерации
      $section_classes[] = 'image-right';
    } else if ( $j === 1 || ($j - 1) % 3 === 0 ) {
      // Для каждой второй итерации
      $section_classes[] = 'image-left';
    } else if ( $j === 2 || ($j + 1) % 3 === 0 ) {
      // Для каждой третьей итерации
      $section_classes[] = 'image-right-small';
    }

    switch ( $programm_fields['type'] ) {
      case 'file_is_uploaded':
        $file_url = $programm_fields['file']['url'];
        break;
      case 'link':
        $file_url = $programm_fields['file_link']['url'];
        break;
      case 'popup':
        $file_url = '#popup-' . $i;
        $popups .= '
        <div class="editor-popup popup" id="popup-' . $i . '">
          <div class="editor-popup__cnt popup__cnt">
            <button type="button" class="editor-popup__close">
              <svg width="21" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 20" class="editor-popup__close-svg"><path stroke="currentColor" d="M20.4455.353553L1.35359 19.4454M19.7384 19.4455L.646481.353591" class="editor-popup__close-path"/></svg>
            </button>
            <h2 class="editor-popup__title">Список предметов для перезачета</h2>' .
              $programm_fields['popup_cnt'] . '
          </div>
        </div>';
        break;
    }

    if ( $programm_fields['type'] ) {
      if ( $programm_fields['file'] ) {
        $file_url = $programm_fields['file']['url'];
      }
    } else {
      $file_url = $programm_fields['file_link']['url'];
    }

    if ( $file_url ) {
      if ( $programm_fields['file_link'] ) {
        $target_blank = ' target="_blank"';
      } else {
        $target_blank = '';
      }
      $file_link = '<a href="' . $file_url . '" class="btn btn-ol studying-program__file-link"' . $target_blank . '>' . $programm_fields['title'] . '</a>';
    }

    if ( $programm_img_url ) {
      $programm_img .= '<source type="image/webp" srcset="#" data-srcset="' . str_replace( '.jpg', '.webp', $programm_img_url ) . '"><img src="#" alt="#" data-src="' . $programm_img_url . '" class="studying-program__img"></picture>';
    } else {
      $programm_img_url = $template_directory . '/img/logo-three.svg';
      $programm_img .= '<img src="#" alt="#" data-src="' . $programm_img_url . '" class="studying-program__img"></picture>';

      $section_classes[] = 'empty-image';
    }

    $hero_sect .= '<a href="#' . $programm->post_name . '" class="studying-programs-sect__programm"><span class="studying-programs-sect__programm-number">0' . $i . '</span><p class="studying-programs-sect__programm-text">' . $programm_full_title . '</p></a>';

    $select .= '<option value="' . $programm_full_title . '">' . $programm_full_title . '</option>';

    $blocks .= '<section class="' . join( ' ', $section_classes ) . '" id="' . $programm->post_name . '"><h2 class="studying-program__title sect-title sect-title-underline">' . $programm->post_title . '</h2>' . $programm_img . '<div class="studying-program__text"><p class="studying-program__descr" data-number="0' . $i . '">' . $programm_fields['text'] . '</p><div class="studying-program__links"><a href="#submit-sect" class="btn btn-blue studying-program__submit-link" data-key="' . $programm_full_title . '">' . $programm_fields['btn_text'] . '</a>' . $file_link . '</div></div></section>';
    
    $i++;
    $j++;

    unset(
      $programm_full_title,
      $programm_fields,
      $programm_img_url,
      $section_classes
    );
  }

  $select .= '</select>';
  echo $popups;
 ?>
<section class="studying-programs-sect sect container"<?php echo $section_id ?>>
  <h1 class="studying-programs-sect__title sect-h1 sect-title-underline"><?php echo $section['title'] ?></h1>
  <p class="studying-programs-sect__descr"><?php echo $section['descr'] ?></p>
  <div class="studying-programs-sect__programms"> <?php
    echo $hero_sect ?>
  </div>
</section> <?php
echo $blocks ?>
<section class="submit-sect container sect-lightgreen-bg" id="submit-sect">
  <div class="submit-sect__left">
    <h2 class="submit-sect__title sect-title sect-title-underline"><?php echo $section['form_title'] ?></h2>
    <p class="submit-sect__descr"><?php echo $section['form_descr'] ?></p>
    <div class="submit-form-wrap lazy" data-src="#"> <?php
      echo $select;
      echo do_shortcode( '[contact-form-7 id="' . $section['form']->ID . '" html_class="submit-form" html_id="submit-form"]' ) ?>
    </div>
  </div>
  <div class="submit-sect__right">
    <span class="submit-sect__right-title">Контакты</span>
    <a href="tel:<?php echo $tel_dry ?>" class="contact-link contact-link-tel-green submit-sect__tel"><?php echo $tel ?></a>
    <a href="mailto:<?php echo $email ?>" class="contact-link contact-link-email-green submit-sect__email"><?php echo $email ?></a>
    <a href="<?php echo $address_link ?>" target="_blank" class="contact-link contact-link-address-green submit-sect__address"><?php echo $address ?></a>
  </div>
</section>