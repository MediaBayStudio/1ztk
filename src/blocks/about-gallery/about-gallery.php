<section class="about-gallery-sect sect container lazy"<?php echo $section_id ?> data-src="#">
  <h2 class="about-gallery-sect__title sect-title sect-title-underline"><?php echo $section['title'] ?></h2>
  <div class="about-gallery-sect__list gallery">
    <div class="gallery__nav">
      <div class="gallery__counter"></div>
    </div> <?php
    foreach ( $section['gallery'] as $img ) :
      $upload_dir_link = preg_replace( '/[^\/]+$/', '', $img['url'] );
      $img_path = get_attached_file( $img['id'] );
      $img_pathinfo = pathinfo( $img_path );

      $img_webp_path = $img_pathinfo['dirname'] . DIRECTORY_SEPARATOR . $img_pathinfo['filename'] . '.webp';

      $fancybox_img_path = $img_pathinfo['dirname'] . DIRECTORY_SEPARATOR . $img_pathinfo['filename'] . '-big';

      if ( $is_webp_support ) {
        $fancybox_img_ending = '.webp';
        if ( file_exists( $img_webp_path ) ) {
          $img_webp_link = $upload_dir_link . $img_pathinfo['filename'] . '.webp';
          $img_webp_soruce = '<source type="image/webp" srcset="#" data-srcset="' . $img_webp_link . '">';
        } else {
          $img_webp_soruce = '';
        }
      } else {
        $fancybox_img_ending = '.jpg';
      }

      if ( file_exists( $fancybox_img_path . $fancybox_img_ending ) ) {
        $fancybox_img_link = $upload_dir_link . $img_pathinfo['filename'] . '-big' . $fancybox_img_ending;
      } else {
        $fancybox_img_link = $img['url'];
      } ?>
      <a href="<?php echo $fancybox_img_link ?>" class="gallery__item" data-fancybox="gallery">
        <picture class="gallery__item-pic lazy"> <?php
          echo $img_webp_soruce ?>
          <img src="#" alt="#" data-src="<?php echo $img['url'] ?>" class="gallery__item-img">
        </picture>
      </a> <?php
    endforeach ?>
  </div>
</section>