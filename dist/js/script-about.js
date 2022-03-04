document.addEventListener('DOMContentLoaded', function() {

//=include ../blocks/header/header.js

(function() {
  let menuInitDropdownLinks = function() {
    initDropdownLinks(qa('.menu__nav-list .has-submenu', menu.menu));
    menu.menu.removeEventListener('menubeforeopen', menuInitDropdownLinks);
  };

  menu.menu.addEventListener('menubeforeopen', menuInitDropdownLinks);
})()

//=include ../blocks/about-hero/about-hero.js

//=include ../blocks/index-principles/index-principles.js

;
(function() {
  let section = q('.about-gallery-sect');

  section.addEventListener('lazyloaded', function() {
    let slideSelector = '.gallery__item',
      slider = q('.about-gallery-sect__list', section),
      counter = q('.gallery__counter', section),
      slides = qa(slideSelector, section),
      $slider = $(slider),
      arrowSvg = '<svg class="arrow__svg" width="23" height="8" viewBox="0 0 23 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.646446 3.64644C0.451185 3.84171 0.451185 4.15829 0.646446 4.35355L3.82843 7.53553C4.02369 7.73079 4.34027 7.73079 4.53553 7.53553C4.7308 7.34027 4.7308 7.02369 4.53553 6.82843L1.70711 4L4.53553 1.17157C4.7308 0.976309 4.7308 0.659727 4.53553 0.464464C4.34027 0.269202 4.02369 0.269202 3.82843 0.464464L0.646446 3.64644ZM23 3.5L1 3.5L1 4.5L23 4.5L23 3.5Z" fill="currentColor"/></svg>',
      buildSlider = function() {
        if (media('(min-width:767.98px)') && slides.length < 3) {
          if (SLIDER.hasSlickClass($slider)) {
            SLIDER.unslick($slider);
          }
        } else {
          if (SLIDER.hasSlickClass($slider)) {
            return;
          }
          $slider.slick({
            infinite: false,
            appendArrows: $('.gallery__nav'),
            slide: slideSelector,
            prevArrow: SLIDER.createArrow('teachers__prev', arrowSvg),
            nextArrow: SLIDER.createArrow('teachers__next', arrowSvg),
            mobileFirst: true,
            draggable: false,
            responsive: [{
              breakpoint: 767.98,
              settings: {
                slidesToShow: 2
              }
            }]
          });
        }
      },
      link = document.createElement('link'),
      script = document.createElement('script'),
      loadedResources = 0;

    link.rel = 'stylesheet';
    link.href = templateDirectory + '/css/fancybox.min.css';
    script.src = templateDirectory + '/js/fancybox.min.js';

    $slider.on('init reInit afterChange', function(e, slick, currentSlide, nextSlide) {
      let number = (currentSlide ? currentSlide : 0) + 1;
      counter.innerHTML = '<span class="gallery__counter-current slider-counter-current">0' + number + '</span> / 0' + (slick.slideCount - slick.options.slidesToShow + slick.options.slidesToScroll);
    });

    [link, script].forEach(function(resource) {
      resource.addEventListener('load', function() {
        loadedResources++;
        if (loadedResources === 2) {
          $('.gallery__item[data-fancybox="gallery"]').fancybox({
            beforeClose: function(e, instance, slide) {
              if (slides.length && slides.length > 1) {
                $slider.slick('slickGoTo', e.currIndex);
              }
            },
            buttons: [
              'share',
              'zoom',
              'fullScreen',
              'close'
            ]
          });
          buildSlider();
          windowFuncs.resize.push(buildSlider);
        }
      });
      document.head.appendChild(resource);
    });
  });

})();

//=include ../blocks/about-docs/about-docs.js

;
(function() {
  let teachersSlider = q('.about-teachers-sect__teachers'),
    $teachersSlider = $(teachersSlider),
    slidesSelector = '.teachers__teacher',
    slides = qa(slidesSelector, teachersSlider),
    counter = q('.teachers__counter', teachersSlider),
    arrowSvg = '<svg class="arrow__svg" width="23" height="8" viewBox="0 0 23 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.646446 3.64644C0.451185 3.84171 0.451185 4.15829 0.646446 4.35355L3.82843 7.53553C4.02369 7.73079 4.34027 7.73079 4.53553 7.53553C4.7308 7.34027 4.7308 7.02369 4.53553 6.82843L1.70711 4L4.53553 1.17157C4.7308 0.976309 4.7308 0.659727 4.53553 0.464464C4.34027 0.269202 4.02369 0.269202 3.82843 0.464464L0.646446 3.64644ZM23 3.5L1 3.5L1 4.5L23 4.5L23 3.5Z" fill="currentColor"/></svg>',
    buildTeachersSlider = function() {
      if (media('(min-width:767.98px)') && slides.length < 4) {
        if (SLIDER.hasSlickClass($teachersSlider)) {
          SLIDER.unslick($teachersSlider);
        }
        // если ширина экрана больше 1440px и слайдов меньше 7, то слайдера не будет
      } else {
        if (SLIDER.hasSlickClass($teachersSlider)) {
          // слайдер уже создан
          return;
        }
        if (slides.length && slides.length > 1) {
          $teachersSlider.slick({
            slide: slidesSelector,
            appendArrows: $('.teachers__nav'),
            prevArrow: SLIDER.createArrow('teachers__prev', arrowSvg),
            nextArrow: SLIDER.createArrow('teachers__next', arrowSvg),
            infinite: false,
            mobileFirst: true,
            responsive: [{
              breakpoint: 767.98,
              settings: {
                slidesToShow: 3
              }
            }]
          });
        }
      }
    };

  $teachersSlider.on('beforeChange', function(e, slick, currentSlide, nextSlide) {
    if (slides[nextSlide].classList.contains('hide')) {
      slides[nextSlide].classList.remove('hide');
      slides[nextSlide].offsetWidth;
    }
  });

  // $teachersSlider.on('init', function() {
  //   for (let i = 0, len = slides.length; i < len; i++) {
  //     let image = q('img', slides[i]),
  //       sources = qa('source', slides[i]);

  //     image.src = image.getAttribute('data-src');

  //     for (let j = 0, length = sources.length; j < length; j++) {
  //       console.log(sources[j]);
  //       sources[j].setAttribute('srcset', sources[j].getAttribute('data-srcset'));
  //     }

  //   }
  // });

  $teachersSlider.on('init reInit afterChange', function(e, slick, currentSlide, nextSlide) {
    let number = (currentSlide ? currentSlide : 0) + 1;
    counter.innerHTML = '<span class="teachers__counter-current slider-counter-current">0' + number + '</span> / 0' + (slick.slideCount - slick.options.slidesToShow + slick.options.slidesToScroll);
  });

  console.log(counter);

  buildTeachersSlider();
  windowFuncs.resize.push(buildTeachersSlider);
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