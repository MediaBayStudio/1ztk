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

//=include ../blocks/contacts-requisites/contacts-requisites.js

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

thanksPopup = new Popup('.thanks-popup', {
  closeButtons: '.thanks-popup__close'
});

thanksPopup.addEventListener('popupbeforeopen', function() {
  let text = q('.thanks-popup__descr', thanksPopup);
  text.textContent = text.getAttribute('data-text');
});

// thanksPopup.openPopup();

;(function() {

  let itemsWithSubmenu = qa('.ftr__nav-li.has-submenu');

  // itemsWithSubmenu.forEach(function(linkWithSubmenu) {
  //   let pageLink = q('.nav-link[href^="h"]', linkWithSubmenu),
  //     otherLinks = qa('.nav-link[href^="#"]', linkWithSubmenu),
  //     hrefBody = pageLink.getAttribute('href');

  //   otherLinks.forEach()
  // });

  for (let i = 0, len = itemsWithSubmenu.length; i < len; i++) {
    console.log(itemsWithSubmenu[i]);
    let pageLink = q('.nav-link[href^="h"]', itemsWithSubmenu[i]),
      otherLinks = qa('.nav-link[href^="#"]', itemsWithSubmenu[i]),
      hrefBody = pageLink.getAttribute('href');

    for (let j = 0, jlen = otherLinks.length; j < jlen; j++) {
      let hash = otherLinks[j].getAttribute('href').replace(/.+(?=#)/, '');
      // otherLinks[j].setAttribute('href', hrefBody + hash);
      otherLinks[j].href = hrefBody + hash;
    }
  }

})();

});