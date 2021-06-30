<section class="contacts-hero-sect container">
  <h1 class="contacts-hero-sect__title sect-h1"><?php echo $section['title'] ?></h1>
  <p class="contacts-hero-sect__descr sect-title-underline"><?php echo $section['descr'] ?></p>
  <div class="contacts-hero-sect__bottom">
    <div class="contacts-hero-sect__contacts">
      <span class="contacts-hero-sect__contacts-title">Контакты</span>
      <a href="tel:<?php echo $tel_dry ?>" class="contacts-hero-sect__tel contact-link contact-link-tel-green"><?php echo $tel ?></a>
      <a href="mailto:<?php echo $email ?>" class="contacts-hero-sect__email contact-link contact-link-email-green"><?php echo $email ?></a>
    </div>
    <div class="contacts-hero-sect__map" id="contacts-hero-map" data-zoom="<?php echo $zoom ?>" data-coords="<?php echo $coords ?>"></div>
    <div class="contacts-hero-sect__route-block">
      <span class="contacts-hero-sect__route-title">Как добраться</span>
      <a href="<?php echo $address_link ?>" class="contacts-hero-sect__address contact-link contact-link-address-green"><?php echo $address ?></a>
      <p class="contacts-hero-sect__route"><?php echo $section['route'] ?></p>
    </div>
    <div class="contacts-hero-sect__places-block">
    <span class="contacts-hero-sect__places-block-title">Ближайшие достопримечатльности</span> <?php
      foreach ( $section['places'] as $place ) : ?>
        <div class="contacts-hero-sect__place">
          <span class="contacts-hero-sect__place-ittle"><?php echo $place['title'] ?></span>
          <p class="contacts-hero-sect__place-descr"><?php echo $place['descr'] ?></p>
        </div> <?php
      endforeach ?>
    </div>
  </div>
</section>
<script>
  var contactsMap;

  function ymapsOnload() {
    let mapBlockId = 'contacts-hero-map',
      mapBlock = document.querySelector('#' + mapBlockId),
      mapAddress = document.querySelector('.contacts-hero-sect__address', mapBlock.parentElement).textContent,
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
</script>
<script defer src="https://api-maps.yandex.ru/2.1/?apikey=82596a7c-b060-47f9-9fb6-829f012a9f04&lang=ru_RU&onload=ymapsOnload"></script>