document.addEventListener('DOMContentLoaded', function() {

//=include ../blocks/header/header.js

(function() {
  let menuInitDropdownLinks = function() {
    initDropdownLinks(qa('.menu__nav-list .has-submenu', menu.menu));
    menu.menu.removeEventListener('menubeforeopen', menuInitDropdownLinks);
  };

  menu.menu.addEventListener('menubeforeopen', menuInitDropdownLinks);
})()

//=include ../blocks/contacts-hero/contacts-hero.js

;(function() {
  mapBlock = id('index-contacts-map');

  if (mapBlock) {
    let ymapsInit = function() {
      let tag = document.createElement('script');

      tag.setAttribute('src', 'https://api-maps.yandex.ru/2.1/?apikey=82596a7c-b060-47f9-9fb6-829f012a9f04&lang=ru_RU&onload=ymapsOnload');
      body.appendChild(tag);

      mapBlock.removeEventListener('lazyloaded', ymapsInit);

    };

    mapBlock.addEventListener('lazyloaded', ymapsInit);
  }
})();

//=include ../blocks/index-enjoy/index-enjoy.js

// if (media('(max-width:1023.98px)')) {
//   initDropdownLinks(qa('.ftr__nav-list .has-submenu'));
// }

});