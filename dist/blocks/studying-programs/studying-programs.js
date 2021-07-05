;(function() {
  let submitLinks = qa('.studying-program__submit-link, .studying-programs-sect__programm'),
    select = tail.select('.submit-form__select');

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
})();