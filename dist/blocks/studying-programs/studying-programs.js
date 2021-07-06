;(function() {
  let popupButtons = qa('.studying-program__file-link[href*="#popup"]'),
    submitLinks = qa('.studying-program__submit-link, .studying-programs-sect__programm'),
    select = tail.select('.submit-form__select'),
    popups = {};

  for (let i = 0, len = submitLinks.length; i < len; i++) {
    submitLinks[i].addEventListener('click', function(e) {
      let targetID = submitLinks[i].href.replace(/.*(?=#)/, ''),
        dataKey = submitLinks[i].getAttribute('data-key');

      if (dataKey) {
        select.options.handle('select', dataKey, '#');
      }

      scrollToTarget(e, targetID);
    });
  }

  for (let i = 0, len = popupButtons.length; i < len; i++) {
    let popupID = popupButtons[i].href.replace(/.*(?=#)/, ''),
      closeBtnSelector = popupID + ' .editor-popup__close',
      openBtnSelector = '.studying-program__file-link[href="' + popupID + '"]';

    popupButtons[i].addEventListener('click', function(e) {
      e.preventDefault();        
    });

    popups['popup-' + i] = new Popup(popupID, {
      openButtons: openBtnSelector,
      closeButtons: closeBtnSelector
    });
  }

})();