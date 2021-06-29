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