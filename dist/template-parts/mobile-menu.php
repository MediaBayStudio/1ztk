<aside class="menu" style="display:none">
  <div class="menu__cnt">
    <button type="button" class="menu__burger">
      <span class="menu__burger-box">
        <span class="menu__burger-inner"></span>
      </span>
    </button>
    <a href="<?php echo $site_url ?>" class="menu__logo">
      <picture class="hdr__logo-pic lazy"> <?php
        if ( $logo_url_webp ) : ?>
          <source type="image/webp" srcset="#" data-srcset="<?php echo $logo_url_webp ?>"> <?php
        endif ?>
        <img src="#" data-src="<?php echo $logo_url ?>" alt="Логотип" class="menu__logo-img">
      </picture>
    </a> <?php
    wp_nav_menu( [
      'theme_location'  => 'header_menu',
      'container'       => 'nav',
      'container_class' => 'menu__nav',
      'menu_class'      => 'menu__nav-list',
      'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
    ] );
    echo do_shortcode( '[bvi]' ) ?>
    <a href="https://lk.1ztk-spb.ru/" class="menu__login btn btn-blue">Личный кабинет</a>
    <!-- <a href="tel:<?php #echo $tel_dry ?>" class="tel menu__tel"><?php #echo $tel ?></a> -->
    <!-- <a href="mailto:<?php #echo $email ?>" class="email menu__email"><?php #echo $email ?></a> -->
    <!-- <a href="<?php #echo $address_link ?>" target="_blank" class="address menu__address"><?php #echo $address ?></a> -->
    <div class="menu__links">
      <a href="<?php echo $vk_link ?>" traget="_blank" class="vk vk-green menu__vk"></a>
      <a href="<?php echo $instagram_link ?>" traget="_blank" class="instagram instagram-green menu__instagram"></a>
    </div>
  </div>
</aside>