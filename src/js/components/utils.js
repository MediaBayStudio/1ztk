var
  // Размреы экранов для медиазапросов
  // mediaQueries = {
  //   's': '(min-width:575.98px)',
  //   'm': '(min-width:767.98px)',
  //   'lg': '(min-width:1023.98px)',
  //   'xl': '(min-width:1439.98px)'
  // },
  SLIDER = {
    // nextArrow: '<button type="button" class="arrow"></button>',
    // prevArrow: '<button type="button" class="arrow"></button>',
    // dot: '<button type="button" class="dot"></button>',
    hasSlickClass: function($el) {
      return $el.hasClass('slick-slider');
    },
    unslick: function($el) {
      $el.slick('unslick');
    },
    createArrow: function(className, inside) {
      className = (className.indexOf('prev') === -1 ? 'next ' : 'prev ') + className;
      return '<button type="button" class="arrow arrow-' + className + '">' + inside + '</button>';
    },
    // setImages: function(slides) {
    //   for (let i = 0, len = slides.length; i < len; i++) {
    //     let img = q('img', slides[i]);
    //     // Если элемент найден и он без display:none
    //     if (img && img.offsetParent) {
    //       img.src = img.getAttribute('data-lazy') || img.getAttribute('data-src');
    //     }
    //   }
    // }
  },
  /*
Объединение слушателей для window на события 'load', 'resize', 'scroll'
Все слушатели на окно следует задавать через него, например:
  window.resize.push(functionName)
Все ф-ии, добавленные в [] window.resize, будут заданы одним слушателем
*/
  windowFuncs = {
    load: [],
    resize: [],
    scroll: [],
    call: function(event) {
      let funcs = windowFuncs[event.type] || event;
      for (let i = funcs.length - 1; i >= 0; i--) {
        console.log(funcs[i].name);
        funcs[i]();
      }
    }
  },

  mask, // ф-я маски телефонов в поля ввода (в файле telMask.js)
  lazy,
  menu,
  burger,
  hdr,
  ftr,
  overlay,
  body,
  fakeScrollbar,
  downloadPopup,
  thanksPopup,
  // Сокращение записи querySelector
  q = function(selector, element) {
    element = element || body;
    return element.querySelector(selector);
  },
  // Сокращение записи querySelectorAll + перевод в массив
  qa = function(selectors, element, toArray) {
    element = element || body;
    return toArray ? Array.prototype.slice.call(element.querySelectorAll(selectors)) : element.querySelectorAll(selectors);
  },
  // Сокращение записи getElementById
  id = function(selector) {
    return document.getElementById(selector);
  },
  // Фикс 100% высоты экрана для моб. браузеров
  setVh = function() {
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', vh + 'px');
  },
  // Сокращение записи window.matchMedia('query').matches
  media = function(media) {
    return window.matchMedia(media).matches;
  },
  // Функция создания мобильного меню
  mobileMenu,
  // Прокрутка до элемента при помощи requestAnimationFrame
  scrollToTarget = function(e, target) {
    e.preventDefault();

    if (this === window) {
      _ = e.target;
    } else {
      _ = this;
    }

    if (target == 0) {
      target = body;
    } else {
      target = target || _.getAttribute('data-scroll-target');
    }

    if (!target && _.tagName === 'A') {
      target = q(_.getAttribute('href'));
    }

    if (target.constructor === String) {
      target = q(target);
    }

    if (!target) {
      console.warn('Scroll target not found');
      return;
    }

    menu && menu.close();

    let wndwY = window.pageYOffset,
      targetStyles = getComputedStyle(target),
      targetTop = target.getBoundingClientRect().top - +(targetStyles.paddingTop).slice(0, -2) - +(targetStyles.marginTop).slice(0, -2),
      start = null,
      V = .35,
      step = function(time) {
        if (start === null) {
          start = time;
        }

        if (Math.abs(targetTop - wndwY) > 5000) {
          V = .15;
        } else if (Math.abs(targetTop - wndwY) > 2000) {
          V = .20;
        }

        let progress = time - start,
          r = (targetTop < 0 ? Math.max(wndwY - progress / V, wndwY + targetTop) : Math.min(wndwY + progress / V, wndwY + targetTop));

        window.scrollTo(0, r);

        if (r != wndwY + targetTop) {
          requestAnimationFrame(step);
        }
      };

    requestAnimationFrame(step);
  },
  dispatchEvent = function(e, t) {
    let n;
    'function' == typeof window.CustomEvent && (n = new CustomEvent(t), e.dispatchEvent(n))
  },
  // Функция запрета/разрешения прокрутки страницы
  pageScroll = function(disallow) {
    fakeScrollbar.classList.toggle('active', disallow);
    body.classList.toggle('no-scroll', disallow);
    body.style.paddingRight = disallow ? fakeScrollbar.offsetWidth - fakeScrollbar.clientWidth + 'px' : '';
  },
  // Функция липкого элемента средствами js
  sticky = function($el, fixThresholdDir, className) {
    $el = typeof $el === 'string' ? q($el) : $el;
    className = className || 'fixed';
    fixThresholdDir = fixThresholdDir || 'bottom';

    let fixThreshold = $el.getBoundingClientRect()[fixThresholdDir] + pageYOffset,
      $elClone = $el.cloneNode(true),
      $elParent = $el.parentElement,
      fixElement = function() {
        if (!$el.classList.contains(className) && pageYOffset >= fixThreshold) {
          $elParent.appendChild($elParent.replaceChild($elClone, $el));
          $el.classList.add(className);

          window.removeEventListener('scroll', fixElement);
          window.addEventListener('scroll', unfixElement);
        }
      },
      unfixElement = function() {
        if ($el.classList.contains(className) && pageYOffset <= fixThreshold) {
          $elParent.replaceChild($el, $elClone);
          $el.classList.remove(className);

          window.removeEventListener('scroll', unfixElement);
          window.addEventListener('scroll', fixElement);
        }
      };

    $elClone.classList.add('cloned');
    fixElement();
    window.addEventListener('scroll', fixElement);
  },
  initDropdownLinks = function(links) {
    if (!links || links && !links.length) return;

    links.forEach(function(link, i) {

      let minHeight = q('.nav-link', link).offsetHeight + 'px',
        maxHeight = link.scrollHeight + 'px';

      link.style.maxHeight = minHeight;
      link.classList.add('collapse');

      link.addEventListener('click', function(e) {
        if (e.target.classList.contains('nav-link') && e.target.getAttribute('href') === '#') {
          let height = link.style.maxHeight === maxHeight ? minHeight : maxHeight,
            childs = qa('.nav-link', link);

          childs.forEach(child => child.blur());

          link.classList.toggle('collapse');
          link.style.maxHeight = height;
        }
      });

      // Оставляем первый элемент открытым
      if (i === 0) {
        link.classList.toggle('collapse');
        link.style.maxHeight = maxHeight;
      }

    });
  };