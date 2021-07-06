;(function() {

  let itemsWithSubmenu = qa('.ftr__nav-li.has-submenu');

  for (let i = 0, len = itemsWithSubmenu.length; i < len; i++) {
    let pageLink = q('.nav-link[href^="h"]', itemsWithSubmenu[i]),
      otherLinks = qa('.nav-link[href^="#"]', itemsWithSubmenu[i]),
      hrefBody = pageLink.getAttribute('href');

      console.log(hrefBody);

    for (let j = 0, jlen = otherLinks.length; j < jlen; j++) {
      let hash = otherLinks[j].getAttribute('href').replace(/.+(?=#)/, '');
      otherLinks[j].setAttribute('href', hrefBody + hash);
    }
  }

})();