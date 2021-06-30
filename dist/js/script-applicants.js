document.addEventListener('DOMContentLoaded', function() {

//=include ../blocks/header/header.js

(function() {
  let menuInitDropdownLinks = function() {
    initDropdownLinks(qa('.menu__nav-list .has-submenu', menu.menu));
    menu.menu.removeEventListener('menubeforeopen', menuInitDropdownLinks);
  };

  menu.menu.addEventListener('menubeforeopen', menuInitDropdownLinks);
})()

//=include ../blocks/applicants-hero/applicants-hero.js

//=include ../blocks/index-steps/index-steps.js

//=include ../blocks/applicants-start/applicants-start.js

;
(function() {
  let faqList = q('.faq'),
    faqHdrClass = '.faq__question',
    clickTragetClasses = [
      'faq__question',
      'faq__question-text'
    ],
    faqItemClass = '.faq__item';

  if (faqList) {
    let faqBlocks = faqList.children,
      dropdownText = function(element) {

        if (!element) {
          for (var i = faqBlocks.length - 1; i >= 0; i--) {
            faqBlocks[i].style.maxHeight = q(faqHdrClass, faqBlocks[i]).scrollHeight + 'px';
          }
          return;
        }

        let parent = element.closest(faqItemClass),
          activeElement = q('.active', faqList);


        if (parent) {
          parent.classList.add('active');
          parent.style.maxHeight = parent.scrollHeight + 'px'
        }

        if (activeElement) {
          activeElement.classList.remove('active');
          activeElement.style.maxHeight = q(faqHdrClass, activeElement).scrollHeight + 'px';
        }

      };

    dropdownText();

    windowFuncs.resize.push(dropdownText);

    faqList.addEventListener('click', function() {
      let target = event.target;

      if (clickTragetClasses.some(className => target.classList.contains(className))) {
        dropdownText(target);
      }
      
    });

  }
})();

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

// thanksPopup.openPopup();

// if (media('(max-width:1023.98px)')) {
//   initDropdownLinks(qa('.ftr__nav-list .has-submenu'));
// }

});