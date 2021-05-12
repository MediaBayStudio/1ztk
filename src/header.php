<?php
  global
    $site_url,
    $address,
    $tel,
    $tel_dry,
    $email,
    $logo_url,
    $address_link,
    $zoom,
    $coords,
    $instagram_link,
    $vk_link,
    $template_directory;
    $page_style = str_replace( '.php', '', get_page_template_slug( $post->ID ) ) ?>
<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
  <script>
    var browser = {
      // Opera 8.0+
      isOpera: (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0,
      // Firefox 1.0+
      isFirefox: typeof InstallTrigger !== 'undefined',
      // Safari 3.0+ "[object HTMLElementConstructor]"
      isSafari: /constructor/i.test(window.HTMLElement) || (function(p) {
        return p.toString() === "[object SafariRemoteNotification]";
      })(!window['safari'] || (typeof safari !== 'undefined' && safari.pushNotification)),
      // Internet Explorer 6-11
      isIE: /*@cc_on!@*/ false || !!document.documentMode,
      // Edge 20+
      isEdge: !( /*@cc_on!@*/ false || !!document.documentMode) && !!window.StyleMedia,
      // Chrome 1+
      isChrome: !!window.chrome && !!window.chrome.webstore,
      isYandex: !!window.yandex,
      isMac: window.navigator.platform.toUpperCase().indexOf('MAC') >= 0
    };
    (function(){
      let polyfills = {
          'custom-events': typeof window.CustomEvent !== 'function',
          'intersection-observer': 'IntersectionObserver' in window === false,
          'closest': !Element.prototype.closest,
          'svg4everybody': browser.isIE,
          'picturefill': !window.HTMLPictureElement
        },
        scriptText = '',
        url = '<?php echo $template_directory ?>/js-polyfills.php',
        getParams = [];
      for (let name in polyfills) {
        // Проверяем услвоие
        if (polyfills[name]) {
          getParams[getParams.length] = name + '.min.js';
          console.log('Будет загружен ' + name);
        }
      }
      if (getParams.length > 0) {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', url + '?polyfills=' + getParams.join('|'));
        xhr.send();
        xhr.addEventListener('readystatechange', function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            scriptText = xhr.response;
            let script = document.createElement('script');
            script.text = scriptText;
            document.head.appendChild(script).parentNode.removeChild(script);
          }
        });
      }
    })();
  </script>
  <meta charset="<?php bloginfo( 'charset' ) ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no, user-scalable=no, viewport-fit=cover">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- styles preload -->
  <link rel="preload" as="style" href="<?php echo $template_directory ?>/style.css" />
	<link rel="preload" as="style" href="<?php echo $template_directory ?>/css/style-<?php echo $page_style ?>.css" />
	<link rel="preload" as="style" href="<?php echo $template_directory ?>/css/style-<?php echo $page_style ?>.576.css" media="(min-width:575.98px)" />
	<link rel="preload" as="style" href="<?php echo $template_directory ?>/css/style-<?php echo $page_style ?>.768.css" media="(min-width:767.98px)" />
	<link rel="preload" as="style" href="<?php echo $template_directory ?>/css/style-<?php echo $page_style ?>.1024.css" media="(min-width:1023.98px)" />
	<link rel="preload" as="style" href="<?php echo $template_directory ?>/css/style-<?php echo $page_style ?>.1280.css" media="(min-width:1279.98px)" />
  <link rel="preload" as="style" href="<?php echo $template_directory ?>/css/hover.css" media="(hover) and (min-width:1024px)" />
  <!-- fonts preload --> <?php
	$fonts = [
		'OpenSans-Regular.woff',
		'SourceSerifPro-Bold.woff',
    'SourceSerifPro-Regular-numbers.woff',
		'SegoeUI-SemiBold.woff'
	];
	foreach ( $fonts as $font ) : ?>

	<link rel="preload" href="<?php echo $template_directory . '/fonts/' . $font ?>" as="font" type="font/woff" crossorigin="anonymous" /> <?php
	endforeach;
  echo PHP_EOL ?>
  <!-- other preload --> <?php
  echo PHP_EOL;
  if ( !$preload ) {
    $preload = get_field( 'preload' );
  }

  $preload[] = $logo_url;

  if ( $preload ) {
    foreach ( $preload as $item ) {
      create_link_preload( $item );
    }
    unset( $item );
  } ?>
  <!-- favicons -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $site_url ?>/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $site_url ?>/favicon-16x16.png">
  <link rel="manifest" href="<?php echo $site_url ?>/site.webmanifest">
  <link rel="mask-icon" href="<?php echo $site_url ?>/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff"> <?php
  echo PHP_EOL;
  wp_head() ?>
</head>

<body <?php body_class() ?>> <?php
  wp_body_open() ?>
  <noscript>
    <!-- <noindex> -->Для полноценного использования сайта включите JavaScript в настройках вашего браузера.<!-- </noindex> -->
  </noscript>
  <div id="page-wrapper">
    <header class="hdr container">
      <a href="<?php echo $site_url ?>" class="hdr__logo"><img src="<?php echo $logo_url ?>" alt="Логотип" class="hdr__logo-img"></a> <?php 
      wp_nav_menu( [
        'theme_location'  => 'header_menu',
        'container'       => 'nav',
        'container_class' => 'hdr__nav',
        'menu_class'      => 'hdr__nav-list',
        'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
      ] ) ?>
      <a href="<?php echo $vk_link ?>" traget="_blank" class="vk vk-green hdr__vk"></a>
      <a href="<?php echo $instagram_link ?>" traget="_blank" class="instagram instagram-green hdr__instagram"></a>
      <button type="button" class="hdr__login"></button><?php
      echo do_shortcode( '[bvi]' ) ?>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          let src = '<?php echo plugins_url() ?>' + '/button-visually-impaired/assets/css/bvi.min.css',
            link = document.createElement('link');

          link.setAttribute('rel', 'stylesheet');
          link.setAttribute('href', src);

          if (document.cookie.indexOf('bvi') === 0) {
            document.querySelector('.bvi-link-shortcode').addEventListener('click', function() {
              document.head.appendChild(link);
            });
          } else {
            document.head.appendChild(link);
          }

        });
      </script>
      <button type="button" class="hdr__burger">
        <span class="hdr__burger-box">
          <span class="hdr__burger-inner"></span>
        </span>
      </button>
    </header> <?php
    require 'template-parts/mobile-menu.php' ?>