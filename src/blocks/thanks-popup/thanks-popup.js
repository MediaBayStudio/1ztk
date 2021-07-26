thanksPopup = new Popup('.thanks-popup', {
  closeButtons: '.thanks-popup__close'
});

thanksPopup.addEventListener('popupbeforeopen', function() {
  let text = q('.thanks-popup__descr', thanksPopup);
  text.textContent = text.getAttribute('data-text');
});

// thanksPopup.openPopup();