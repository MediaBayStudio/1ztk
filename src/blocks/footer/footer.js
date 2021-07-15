;(function() {

  let itemsWithSubmenu = qa('.ftr__nav-li.has-submenu');

  // itemsWithSubmenu.forEach(function(linkWithSubmenu) {
  //   let pageLink = q('.nav-link[href^="h"]', linkWithSubmenu),
  //     otherLinks = qa('.nav-link[href^="#"]', linkWithSubmenu),
  //     hrefBody = pageLink.getAttribute('href');

  //   otherLinks.forEach()
  // });

  for (let i = 0, len = itemsWithSubmenu.length; i < len; i++) {
    console.log(itemsWithSubmenu[i]);
    let pageLink = q('.nav-link[href^="h"]', itemsWithSubmenu[i]),
      otherLinks = qa('.nav-link[href^="#"]', itemsWithSubmenu[i]),
      hrefBody = pageLink.getAttribute('href');

    for (let j = 0, jlen = otherLinks.length; j < jlen; j++) {
      let hash = otherLinks[j].getAttribute('href').replace(/.+(?=#)/, '');
      // otherLinks[j].setAttribute('href', hrefBody + hash);
      otherLinks[j].href = hrefBody + hash;
    }
  }

})();