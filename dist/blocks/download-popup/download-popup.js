;
(function() {
  let links = qa('.docs__item:first-child > a, .faq__answer > a, .descr-sect__descr > a[href$=".zip"]');

  downloadPopup = new Popup('.download-popup', {
    openButtons: '.docs__item:first-child > a, .faq__answer > a, .descr-sect__descr > a[href$=".zip"]',
    closeButtons: '.download-popup__close'
  });

  console.log(links);
  
  links.forEach(function(link) {
    link.addEventListener('click', function(e) {
      e.preventDefault();
    });
  });

  // downloadPopup.openPopup();


})();