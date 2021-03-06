 <?php
  if ( $section['map'] ) {
    $class = '';
  } else {
    $class = ' without-map';
  } ?>
<section class="index-contacts-sect sect-lightgreen-bg container lazy<?php echo $class ?>" data-src="#"<?php echo $section_id ?>>
  <h2 class="index-contacts-sect__title sect-title sect-title-underline"><?php echo $section['title'] ?></h2> <?php
  echo do_shortcode( '[contact-form-7 id="' . $section['form']->ID . '" html_class="index-contacts-sect__form"]' ) ?>
  <div class="index-contacts__bottom"<?php echo $section_id ?>> <?php
  if ( $section['map'] ) : ?>
    <div class="index-contacts__contacts">
      <span class="index-contacts__title sect-h2">Контакты</span>
      <a href="tel:<?php echo $tel_dry ?>" class="tel index-contacts__tel"><?php echo $tel ?></a>
      <a href="mailto:<?php echo $email ?>" class="email index-contacts__email"><?php echo $email ?></a>
      <a href="<?php echo $address_link ?>" target="_blank" class="address index-contacts__address"><?php echo $address ?></a>
    </div>
    <div id="index-contacts-map" class="lazy" data-src="#" data-zoom="<?php echo $zoom ?>" data-coords="<?php echo $coords ?>"></div> <?php
  else : ?>
    <picture class="index-contacts-sect__pic lazy">
      <source type="image/webp" srcset="#" data-srcset="<?php echo $template_directory ?>/img/applicants-start-img.webp">
      <img src="#" alt="#" data-src="<?php echo $template_directory ?>/img/applicants-start-img.jpg" class="index-contacts-sect__img">
    </picture> <?php
  endif ?>
  </div>
</section> <?php
  if ( $section['map'] ) : ?>
  <script>
    var contactsMap;

    function ymapsOnload() {
      let mapBlockId = 'index-contacts-map',
        mapBlock = q('#' + mapBlockId),
        mapAddress = q('.index-contacts__address', mapBlock.parentElement).textContent,
        mapZoom = mapBlock.getAttribute('data-zoom'),
        dataCoords = mapBlock.getAttribute('data-coords').split(/, |,/),
        mapCoords = {
          a: dataCoords[0],
          b: dataCoords[1]
        };

      ymaps.ready(function() {
        contactsMap = new ymaps.Map(mapBlockId, {
          center: [mapCoords.a, mapCoords.b],
          zoom: mapZoom,
          controls: []
        }, {
          searchControlProvider: 'yandex#search'
        });
        
        let geoIcon = new ymaps.Placemark(contactsMap.getCenter(), {
          iconCaption: 'Первый Санкт-Петербургский Зуботехнический Колледж',
          hintContent: 'Первый Санкт-Петербургский Зуботехнический Колледж',
          balloonContent: mapAddress
        }, {
          iconLayout: 'default#image',
          iconImageHref: templateDirectory + '/img/icon-placement.svg',
          iconImageSize: [30, 30]
        });

        contactsMap.geoObjects.add(geoIcon);
      });
    }
  </script> <?php
endif ?>