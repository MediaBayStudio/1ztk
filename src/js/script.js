//=include components/utils.js

document.addEventListener('DOMContentLoaded', function() {
  body = document.body;

  //=include components/telMask.js

  //=include components/validateForms.js

  //=include components/menu.js

  // В основном для IE
  if (!NodeList.prototype.forEach) {
    NodeList.prototype.forEach = Array.prototype.forEach;
  }

  if (!HTMLCollection.prototype.forEach) {
    HTMLCollection.prototype.forEach = Array.prototype.forEach;
  }

  fakeScrollbar = id('fake-scrollbar');

  hdr = q('.hdr');

  burger = q('.hdr__burger', hdr);

  ftr = q('.ftr');

  [q('.menu'), hdr, ftr].forEach(function(el) {
    el.addEventListener('click', function(e) {
      if (e.target.classList.contains('nav-link') && e.target.getAttribute('href') === '#') {
        e.preventDefault();
      }
    });
  });

  menu = mobileMenu({
    menu: q('.menu'),
    menuCnt: q('.menu__cnt'),
    openBtn: burger,
    closeBtn: q('.menu__burger'),
    toRight: true,
    fade: false,
    allowPageScroll: false
  });

  // let navLinks = qa('li:not(.has-submenu) > a[href^="#"]');

  // for (let i = 0, len = navLinks.length; i < len; i++) {
  //   navLinks[i].addEventListener('click', scrollToTarget);
  // }


  sticky(hdr);

  // Инициализация lazyload
  lazy = new lazyload({
    clearSrc: true,
    clearMedia: true
  });

  window.svg4everybody && svg4everybody();

  // Добавление расчета vh на ресайз окна
  windowFuncs.resize.push(setVh);

  // Сбор событий resize, load, scroll и установка на window
  for (let eventType in windowFuncs) {
    if (eventType !== 'call') {
      let funcsArray = windowFuncs[eventType];
      if (funcsArray.length > 0) {
        windowFuncs.call(funcsArray);
        window.addEventListener(eventType, windowFuncs.call);
      }
    }
  }

  // настройки grab курсора на всех слайдерах
  // let slickLists = $('.slick-list.draggable');

  // slickLists.on('mousedown', function() {
  //   $(this).addClass('grabbing');
  // }).on('beforeChange', function() {
  //   $(this).removeClass('grabbing');
  // });

  // $(document).on('mouseup', function() {
  //   slickLists.removeClass('grabbing');
  // });
});