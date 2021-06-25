;
(function() {
  let faqList = q('.faq'),
    faqHdrClass = '.faq__question',
    clickTragetClasses = [
      'faq__question',
      'faq__question-text'
    ],
    faqItemClass = '.faq__item';

  if (faqList) {
    let faqBlocks = faqList.children,
      dropdownText = function(element) {

        if (!element) {
          for (var i = faqBlocks.length - 1; i >= 0; i--) {
            faqBlocks[i].style.maxHeight = q(faqHdrClass, faqBlocks[i]).scrollHeight + 'px';
          }
          return;
        }

        let parent = element.closest(faqItemClass),
          activeElement = q('.active', faqList);


        if (parent) {
          parent.classList.add('active');
          parent.style.maxHeight = parent.scrollHeight + 'px'
        }

        if (activeElement) {
          activeElement.classList.remove('active');
          activeElement.style.maxHeight = q(faqHdrClass, activeElement).scrollHeight + 'px';
        }

      };

    dropdownText();

    windowFuncs.resize.push(dropdownText);

    faqList.addEventListener('click', function() {
      let target = event.target;

      if (clickTragetClasses.some(className => target.classList.contains(className))) {
        dropdownText(target);
      }
      
    });

  }
})();