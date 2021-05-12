(function() {
  let menuInitDropdownLinks = function() {
    initDropdownLinks(qa('.menu__nav-list .has-submenu', menu.menu));
    menu.menu.removeEventListener('menubeforeopen', menuInitDropdownLinks);
  };

  menu.menu.addEventListener('menubeforeopen', menuInitDropdownLinks);
})()