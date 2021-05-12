<section class="index-contacts-sect sect-lightgreen-bg container lazy" data-src="#">
  <h2 class="index-contacts-sect__title sect-title sect-title-underline"><?php echo $section['title'] ?></h2> <?php
  echo do_shortcode( '[contact-form-7 id="' . $section['form']->ID . '" html_class="index-contacts-sect__form"]' ) ?>
  <div class="index-contacts__bottom"<?php echo $section_id ?>>
    <div class="index-contacts__contacts">
      <span class="index-contacts__title sect-h2">Контакты</span>
      <a href="tel:<?php echo $tel_dry ?>" class="tel index-contacts__tel"><?php echo $tel ?></a>
      <a href="mailto:<?php echo $email ?>" class="email index-contacts__email"><?php echo $email ?></a>
      <a href="<?php echo $address_link ?>" target="_blank" class="address index-contacts__address"><?php echo $address ?></a>
    </div>
    <div id="index-contacts-map" class="lazy" data-src="#" data-zoom="<?php echo $zoom ?>" data-coords="<?php echo $coords ?>"></div>
  </div>
</section>
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
        iconImageHref: templateDirectoryUri + '/img/icon-geo.svg',
        iconImageSize: [30, 30]
      });

      contactsMap.geoObjects.add(geoIcon);
    });
  }
</script> <?php
unset( $section_id, $li ) ?>