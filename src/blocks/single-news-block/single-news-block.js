;(function() {
  const navItems = document.querySelectorAll('.nav-link')
  const newsItem = Array.from(navItems).filter(function(item) {
    return item.textContent.toLowerCase() === 'новости'
  })

  if (newsItem.length > 0) {
    newsItem[0].setAttribute('aria-current', 'page')
  }


  if (window.matchMedia('min-width: 767.98px')) {
    const galleries = qa('.wp-block-gallery')

    if (galleries.length > 0) {
      galleries.forEach(function(gallery) {
        if (gallery.children.length > 1) {
          $(gallery).slick({
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            mobileFirst: true,
            dots: true,
            arrows: false,
            dotsClass: 'gallery__dots',
            customPaging: () => '<button type="button" class="dot"></button>',
            responsive: [
              {
                breakpoint: 767.98,
                settings: 'unslick'
              },
            ]
          })
        }
      });
    }
  }
})();