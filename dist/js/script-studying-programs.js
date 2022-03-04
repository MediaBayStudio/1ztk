document.addEventListener('DOMContentLoaded', function() {

//=include ../blocks/header/header.js

(function() {
  let menuInitDropdownLinks = function() {
    initDropdownLinks(qa('.menu__nav-list .has-submenu', menu.menu));
    menu.menu.removeEventListener('menubeforeopen', menuInitDropdownLinks);
  };

  menu.menu.addEventListener('menubeforeopen', menuInitDropdownLinks);
})()

;(function() {
  let popupButtons = qa('.studying-program__file-link[href*="#popup"]'),
    submitLinks = qa('.studying-program__submit-link, .studying-programs-sect__programm'),
    select = tail.select('.submit-form__select'),
    popups = {};

  for (let i = 0, len = submitLinks.length; i < len; i++) {
    submitLinks[i].addEventListener('click', function(e) {
      let targetID = submitLinks[i].href.replace(/.*(?=#)/, ''),
        dataKey = submitLinks[i].getAttribute('data-key');

      if (dataKey) {
        select.options.handle('select', dataKey, '#');
      }

      scrollToTarget(e, targetID);
    });
  }

  for (let i = 0, len = popupButtons.length; i < len; i++) {
    let popupID = popupButtons[i].href.replace(/.*(?=#)/, ''),
      closeBtnSelector = popupID + ' .editor-popup__close',
      openBtnSelector = '.studying-program__file-link[href="' + popupID + '"]';

    popupButtons[i].addEventListener('click', function(e) {
      e.preventDefault();        
    });

    popups['popup-' + i] = new Popup(popupID, {
      openButtons: openBtnSelector,
      closeButtons: closeBtnSelector
    });
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

;
(function() {
  let linksSelector = '.studying-program__links > a[href$=".zip"], .steps-sect__li-descr > a[href$=".zip"], .docs__item:first-child > a, .faq__answer > a, .descr-sect__descr > a[href$=".zip"]',
    links = qa(linksSelector);

  downloadPopup = new Popup('.download-popup', {
    openButtons: linksSelector,
    closeButtons: '.download-popup__close'
  });

  // console.log(links);
  
  links.forEach(function(link) {
    link.addEventListener('click', function(e) {
      e.preventDefault();
    });
  });

  // downloadPopup.openPopup();


})();

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