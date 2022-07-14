      <?php
        global 
          $site_url,
          $template_directory,
          $logo_url_webp,
          $logo_url,
          $tel,
          $tel_dry,
          $email,
          $address,
          $address_link ?>
      <footer class="ftr container lazy" data-src="#">
        <a href="<?php echo $site_url ?>" class="ftr__logo">
          <picture class="ftr__logo-pic"> <?php
            if ( $logo_url_webp ) : ?>
              <source type="image/webp" srcset="<?php echo $logo_url_webp ?>"> <?php
            endif ?>
            <img src="<?php echo $logo_url ?>" alt="Логотип" class="ftr__logo-img">
          </picture>
        </a> <?php 
        wp_nav_menu( [
          'theme_location'  => 'footer_menu',
          'container'       => 'nav',
          'container_class' => 'ftr__nav',
          'menu_class'      => 'ftr__nav-list',
          'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
        ] ) ?>
        <!-- <div class="ftr__contacts">
          <span class="ftr__contacts-title">Контакты</span>
          <a href="tel:<?php #echo $tel_dry ?>" class="tel ftr__tel"><?php #echo $tel ?></a>
          <a href="mailto:<?php #echo $email ?>" class="email ftr__email"><?php #echo $email ?></a>
          <a href="<?php #echo $address_link ?>" target="_blank" class="address ftr__address"><?php #echo $address ?></a>
        </div> -->
        <div class="ftr__bottom">
          <a href="<?php echo $site_url ?>/policy.pdf" target="_blank" title="Посмотреть политику конфиденциальности" class="ftr__policy">Политика конфиденциальности</a>
          <p class="ftr__copyright">&copy;&nbsp;<?php echo date( 'Y' ) ?>&nbsp;ЧПОУ&nbsp;<q>Первый Санкт&#8209;Петербургский Зуботехнический Колледж</q></p>
          <div class="ftr__dev">Дизайн и разработка – <a href="https://media-bay.ru" target="_blank" class="ftr__dev-link" title="Перейти на сайт разработчика">media bay</a></div>
        </div>
      </footer>
      <div id="fake-scrollbar"></div> <?php
      require 'template-parts/thanks-popup.php';
      require 'template-parts/download-popup.php';
      wp_footer() ?>
    </div>

    
    <script>
          (function(w,d,u){
                  var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
                  var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
          })(window,document,'https://cdn-ru.bitrix24.ru/b18212930/crm/site_button/loader_5_nj286l.js');
    </script>
  </body>
</html>