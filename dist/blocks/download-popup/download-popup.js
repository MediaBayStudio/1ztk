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