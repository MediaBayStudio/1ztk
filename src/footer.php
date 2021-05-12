      <?php
        global 
          $site_url,
          $template_directory,
          $tel,
          $tel_dry,
          $email,
          $address,
          $address_link ?>
      <footer class="ftr container lazy" data-src="#">
      <a href="<?php echo $site_url ?>" class="ftr__logo"><img src="#" alt="Логотип" data-src="<?php echo $template_directory ?>/img/logo-ftr.png" class="ftr__logo-img lazy"></a> <?php 
        wp_nav_menu( [
          'theme_location'  => 'header_menu',
          'container'       => 'nav',
          'container_class' => 'ftr__nav',
          'menu_class'      => 'ftr__nav-list',
          'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
        ] ) ?>
        <div class="ftr__contacts">
          <span class="ftr__contacts-title">Контакты</span>
          <a href="tel:<?php echo $tel_dry ?>" class="tel ftr__tel"><?php echo $tel ?></a>
          <a href="mailto:<?php echo $email ?>" class="email ftr__email"><?php echo $email ?></a>
          <a href="<?php echo $address_link ?>" target="_blank" class="address ftr__address"><?php echo $address ?></a>
        </div>
        <div class="ftr__copyright">
          <span class="ftr__copy">&copy;&nbsp;<?php echo date( 'Y' ) ?>&nbsp;чпоу&nbsp;<q>первый санкт&#8209;петербургский зуботехнический колледж</q></span>
          <a href="<?php echo $site_url ?>/policy.pdf" target="_blank" title="Посмотреть политику конфиденциальности" class="ftr__policy">Политика конфиденциальности</a>
        </div>
        <div class="ftr__dev">Дизайн и разработка – <a href="https://media-bay.ru" target="_blank" class="ftr__dev-link" title="Перейти на сайт разработчика">media bay</a></div>
      </footer>
      <div id="fake-scrollbar"></div> <?php
      require 'template-parts/thanks-popup.php';
      wp_footer() ?>
    </div>
  </body>
</html>