;(function() {

  let itemsWithSubmenu = qa('.ftr__nav-li.has-submenu');

  for (let i = 0, len = itemsWithSubmenu.length; i < len; i++) {
    let pageLink = q('.nav-link[href^="h"]', itemsWithSubmenu[i]),
      otherLinks = qa('.nav-link[href^="#"', itemsWithSubmenu[i]),
      hrefBody = pageLink.href;

    for (let j = 0, jlen = otherLinks.length; j < jlen; j++) {
      let hash = otherLinks[j].href.replace(/.+(?=#)/, '');
      otherLinks[j].href = hrefBody + hash;
    }
  }

})();