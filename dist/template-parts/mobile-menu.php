<aside class="menu" style="display:none">
  <div class="menu__cnt">
    <a href="<?php echo $site_url ?>" class="hdr__logo"><img src="<?php echo $logo_url ?>" alt="Логотип" class="hdr__logo-img"></a> <?php
    wp_nav_menu( [
      'theme_location'  => 'header_menu',
      'container'       => 'nav',
      'container_class' => 'menu__nav',
      'menu_class'      => 'menu__nav-list',
      'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
    ] );
    #echo do_shortcode( '[bvi text="Версия для слабовидящих"]' ) ?>
    <a href="tel:<?php echo $tel_dry ?>" class="tel menu__tel"><?php echo $tel ?></a>
    <a href="mailto:<?php echo $email ?>" class="email menu__email"><?php echo $email ?></a>
    <a href="<?php echo $address_link ?>" target="_blank" class="address menu__address"><?php echo $address ?></a>
    <!-- <div class="menu__links">
      <a href="<?php #echo $vk_link ?>" traget="_blank" class="vk vk-green menu__vk"></a>
      <a href="<?php #echo $instagram_link ?>" traget="_blank" class="instagram instagram-green menu__instagram"></a>
    </div> -->
  </div>
</aside>