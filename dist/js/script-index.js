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
  let heroSlider = q('.index-hero-sect__slider'),
    $heroSlider = $(heroSlider),
    slidesSelector = '.index-hero-sect__pic',
    slides = qa(slidesSelector, heroSlider),
    counter = q('.index-hero-sect__counter', heroSlider),
    arrowSvg = '<svg class="arrow__svg" width="23" height="8" viewBox="0 0 23 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.646446 3.64644C0.451185 3.84171 0.451185 4.15829 0.646446 4.35355L3.82843 7.53553C4.02369 7.73079 4.34027 7.73079 4.53553 7.53553C4.7308 7.34027 4.7308 7.02369 4.53553 6.82843L1.70711 4L4.53553 1.17157C4.7308 0.976309 4.7308 0.659727 4.53553 0.464464C4.34027 0.269202 4.02369 0.269202 3.82843 0.464464L0.646446 3.64644ZM23 3.5L1 3.5L1 4.5L23 4.5L23 3.5Z" fill="currentColor"/></svg>',
    buildHeroSlider = function() {
      if (SLIDER.hasSlickClass($heroSlider)) {
        // слайдер уже создан
        return;
      }
      if (slides.length && slides.length > 1) {
        $heroSlider.slick({
          slide: slidesSelector,
          appendArrows: $('.index-hero-sect__nav'),
          prevArrow: SLIDER.createArrow('index-hero-sect__prev', arrowSvg),
          nextArrow: SLIDER.createArrow('index-hero-sect__next', arrowSvg),
          fade: true,
          draggable: false,
          autoplay: true,
          autoplaySpeed: 3000
        });
      }

      windowFuncs.resize.push(buildHeroSlider);
    };

  $heroSlider.on('beforeChange', function(e, slick, currentSlide, nextSlide) {
    if (slides[nextSlide].classList.contains('hide')) {
      slides[nextSlide].classList.remove('hide');
      slides[nextSlide].offsetWidth;
    }
  });

  $heroSlider.on('init reInit afterChange', function(e, slick, currentSlide, nextSlide) {
    let number = (currentSlide ? currentSlide : 0) + 1;
    counter.innerHTML = '<span class="index-hero-sect__counter-current">0' + number + '</span> / 0' + (slick.slideCount - slick.options.slidesToShow + slick.options.slidesToScroll);
  });

  console.log(counter);

  buildHeroSlider();
})();

//=include ../blocks/descr/descr.js

//=include ../blocks/index-system/index-system.js

//=include ../blocks/index-features/index-features.js

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