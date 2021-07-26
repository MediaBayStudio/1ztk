;
(function() {
  let links = qa('.docs__item-link:first-child, .faq__answer > a, .descr-sect__descr > a');

  downloadPopup = new Popup('.download-popup', {
    openButtons: '.docs__item-link:first-child, .faq__answer > a, .descr-sect__descr > a',
    closeButtons: '.download-popup__close'
  });
  
  links.forEach(function(link) {
    link.addEventListener('click', function(e) {
      e.preventDefault();
    });
  });

  // downloadPopup.openPopup();


})();