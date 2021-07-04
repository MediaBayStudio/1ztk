document.addEventListener('DOMContentLoaded', function() {

//=include ../blocks/header/header.js

(function() {
  let menuInitDropdownLinks = function() {
    initDropdownLinks(qa('.menu__nav-list .has-submenu', menu.menu));
    menu.menu.removeEventListener('menubeforeopen', menuInitDropdownLinks);
  };

  menu.menu.addEventListener('menubeforeopen', menuInitDropdownLinks);
})()

//=include ../blocks/studying-programs/studying-programs.js

//=include ../blocks/index-enjoy/index-enjoy.js

thanksPopup = new Popup('.thanks-popup', {
  closeButtons: '.thanks-popup__close'
});

// thanksPopup.openPopup();

;(function() {

  let itemsWithSubmenu = qa('.ftr__nav-li.has-submenu');

  for (let i = 0, len = itemsWithSubmenu.length; i < len; i++) {
    let pageLink = q('.nav-link[href^="h"]', itemsWithSubmenu[i]),
      otherLinks = qa('.nav-link[href^="#"', itemsWithSubmenu[i]),
      hrefBody = pageLink.href;

    for (let j = 0, jlen = otherLinks.length; j < jlen; j++) {
      let hash = otherLinks[j].href.replace(/.+(?=#)/, '');
      otherLinks[j].href = hrefBody + hash;
    }
  }

})();

});