<?php
  global
    $is_webp_support,
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
    $telegram_link,
    $youtube_link,
    $vk_link,
    $template_directory;

    if ( is_page_template( 'index.php' ) || is_front_page() ) {
      $style_name = 'style-index';
      $script_name = 'script-index';
    } else if ( is_page_template( 'applicants.php' ) ) {
      $style_name = 'style-applicants';
      $script_name = 'script-applicants';
      $preload_img = $GLOBALS['sections'][0]['img']['url'];
      $preload_img_webp = str_replace( '.jpg', '.webp', $preload_img );
    } else if ( is_page_template( 'about.php' ) ) {
      $style_name = 'style-about';
      $script_name = 'script-about';
      $preload_img = $GLOBALS['sections'][0]['img']['url'];
      $preload_img_webp = str_replace( '.jpg', '.webp', $preload_img );
    } else if ( is_page_template( 'contacts.php' ) ) {
      $style_name = 'style-contacts';
      $script_name = 'script-contacts';
    } else if ( is_page_template( 'studying-programs.php' ) ) {
      $style_name = 'style-studying-programs';
      $script_name = 'script-studying-programs';
    }

    $GLOBALS['page_script_name'] = $script_name;
    $GLOBALS['page_style_name'] = $style_name;
    $page_style = $GLOBALS['page_style_name'] ?>
    
<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=IntersectionObserver%2CIntersectionObserverEntry%2CElement.prototype.closest"></script>
  <meta charset="<?php bloginfo( 'charset' ) ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no, user-scalable=no, viewport-fit=cover">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- styles preload -->
  <link rel="preload" as="style" href="<?php echo $template_directory ?>/style.css" /> <?php
if ( $page_style  ) : ?>
	<link rel="preload" as="style" href="<?php echo $template_directory ?>/css/<?php echo $page_style ?>.css" />
	<link rel="preload" as="style" href="<?php echo $template_directory ?>/css/<?php echo $page_style ?>.576.css" media="(min-width:575.98px)" />
	<link rel="preload" as="style" href="<?php echo $template_directory ?>/css/<?php echo $page_style ?>.768.css" media="(min-width:767.98px)" />
	<link rel="preload" as="style" href="<?php echo $template_directory ?>/css/<?php echo $page_style ?>.1024.css" media="(min-width:1023.98px)" />
	<link rel="preload" as="style" href="<?php echo $template_directory ?>/css/<?php echo $page_style ?>.1280.css" media="(min-width:1279.98px)" /> <?php
endif ?>
  <link rel="preload" as="style" href="<?php echo $template_directory ?>/css/hover.css" media="(hover) and (min-width:1024px)" />
  <!-- fonts preload --> <?php
	$fonts = [
		'OpenSans-Bold.woff',
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

  if ( $is_webp_support ) {
    $logo_url_webp = str_replace( '.png', '.webp', $logo_url );
    $logo_preload = $logo_url_webp;
    if ( $preload_img_webp ) {
      $preload[] = [
        'filepath' => $preload_img_webp,
        'upload' => true
      ];
    }
  } else {
    $logo_preload = $logo_url;
    if ( $preload_img ) {
      $preload[] = [
        'filepath' => $preload_img,
        'upload' => true
      ];
    }
  }

  $preload[] = [
    'filepath' => $logo_preload,
    'media' => '(min-width:1023.98px)',
    'upload' => true
  ];

  $preload[] = [
    'filepath' => '/img/logo-with-text.svg',
    'media' => '(max-width:1023.98px)'
  ];


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
  if ( stripos( $_SERVER['HTTP_USER_AGENT'], 'lighthouse' ) === false ) : ?>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
      m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
      (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");ym(81047449, "init", {clickmap:true,trackLinks:true,accurateTrackBounce:true,webvisor:true
      });</script><noscript><div><img src="https://mc.yandex.ru/watch/81047449" style="position:absolute; left:-9999px;" alt="#" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <!-- Facebook Pixel Code -->
      <script>!function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '1118944981842391');
      fbq('track', 'PageView');</script>
      <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=1118944981842391&ev=PageView&noscript=1"
      /></noscript>
    <!-- End Facebook Pixel Code -->
    <!-- VK Pixel Code -->
    <script>!function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src="https://vk.com/js/api/openapi.js?169",t.onload=function(){VK.Retargeting.Init("VK-RTRG-1008817-cO7yd"),VK.Retargeting.Hit()},document.head.appendChild(t)}();</script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-1008817-cO7yd" style="position:fixed; left:-999px;" alt=""/></noscript>
    <!-- End VK Pixel Code --> <?php
  endif;
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
      <a href="<?php echo $site_url ?>" class="hdr__logo">
        <picture class="hdr__logo-pic"> <?php
          if ( $logo_url_webp ) : ?>
            <source type="image/webp" media="(min-width:1023.98px)" srcset="<?php echo $logo_url_webp ?>"> <?php
          endif ?>
          <source type="image/svg+xml" media="(max-width:1023.98px)" srcset="<?php echo $template_directory ?>/img/logo-with-text.svg">
          <img src="<?php echo $logo_url ?>" alt="Логотип" class="hdr__logo-img">
        </picture>
      </a>
      <div class="hdr__right">
        <div class="hdr__contacts">
          <a href="tel:<?php echo $tel_dry ?>" class="hdr__tel contact-link contact-link-tel-green"><?php echo $tel ?></a>
          <a href="mailto:<?php echo $email ?>" class="hdr__email contact-link contact-link-email-green"><?php echo $email ?></a>
          <a href="<?php echo $address_link ?>" target="_blank" class="hdr__address contact-link contact-link-address-green"><?php echo $address ?></a>
          <a href="<?php echo $vk_link ?>" target="_blank" class="hdr__vk">
            <svg class="vk-svg" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none"><path class="vk-svg-path" d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.344 16.163h-1.867c-1.055 0-1.232-.601-2.102-1.469-.785-.785-1.22-.183-1.202.935.006.297-.141.534-.495.534-1.105 0-2.694.156-4.304-1.58-1.647-1.779-3.374-5.348-3.374-5.699 0-.208.172-.301.459-.301h1.898c.503 0 .545.249.686.568.584 1.331 1.981 4.002 2.354 2.511.214-.856.301-2.839-.615-3.01-.52-.096.396-.652 1.722-.652.33 0 .688.035 1.054.12.673.156.676.458.666.898-.034 1.666-.235 2.786.204 3.069.419.271 1.521-1.502 2.104-2.871.159-.378.191-.632.643-.632h2.322c1.216 0-.159 1.748-1.21 3.112-.847 1.099-.802 1.12.183 2.034.701.651 1.53 1.54 1.53 2.043 0 .238-.186.39-.656.39z" fill="#3C4446"/></svg>
          </a> <?php
          if ( $instagram_link ) : ?>
          <a href="<?php echo $instagram_link ?>" target="_blank" class="hdr__instagram">
            <svg class="hdr__instagram-svg" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
              <g clip-path="url(#clip0)">
                <rect class="instagram-rect" x="4" y="4" width="16" height="16" fill="transparent"/>
                <path d="M14.83 6.3C14.09 6.3 13.83 6.3 12 6.3C10.17 6.3 9.91001 6.3 9.17001 6.3C8.78387 6.26281 8.39429 6.31151 8.02919 6.44259C7.66409 6.57367 7.3325 6.7839 7.0582 7.0582C6.7839 7.3325 6.57368 7.66408 6.44259 8.02919C6.31151 8.39429 6.26282 8.78387 6.30001 9.17C6.30001 9.91 6.30001 10.17 6.30001 12C6.30001 13.83 6.30001 14.09 6.30001 14.83C6.26282 15.2161 6.31151 15.6057 6.44259 15.9708C6.57368 16.3359 6.7839 16.6675 7.0582 16.9418C7.3325 17.2161 7.66409 17.4263 8.02919 17.5574C8.39429 17.6885 8.78387 17.7372 9.17001 17.7C9.91001 17.7 10.17 17.7 12 17.7C13.83 17.7 14.09 17.7 14.83 17.7C15.2161 17.7372 15.6057 17.6885 15.9708 17.5574C16.3359 17.4263 16.6675 17.2161 16.9418 16.9418C17.2161 16.6675 17.4263 16.3359 17.5574 15.9708C17.6885 15.6057 17.7372 15.2161 17.7 14.83C17.7 14.09 17.7 13.83 17.7 12C17.7 10.17 17.7 9.91 17.7 9.17C17.7372 8.78387 17.6885 8.39429 17.5574 8.02919C17.4263 7.66408 17.2161 7.3325 16.9418 7.0582C16.6675 6.7839 16.3359 6.57367 15.9708 6.44259C15.6057 6.31151 15.2161 6.26281 14.83 6.3ZM12 15.6C11.288 15.6 10.592 15.3889 9.99995 14.9933C9.40794 14.5977 8.94652 14.0355 8.67404 13.3777C8.40156 12.7198 8.33027 11.996 8.46918 11.2977C8.60809 10.5993 8.95095 9.95788 9.45442 9.45442C9.95789 8.95095 10.5993 8.60808 11.2977 8.46917C11.996 8.33027 12.7199 8.40156 13.3777 8.67403C14.0355 8.94651 14.5977 9.40793 14.9933 9.99995C15.3889 10.592 15.6 11.288 15.6 12C15.6 12.9548 15.2207 13.8705 14.5456 14.5456C13.8705 15.2207 12.9548 15.6 12 15.6ZM15.74 9.1C15.5172 9.1 15.3036 9.0115 15.146 8.85397C14.9885 8.69644 14.9 8.48278 14.9 8.26C14.9 8.03722 14.9885 7.82356 15.146 7.66603C15.3036 7.5085 15.5172 7.42 15.74 7.42C15.8503 7.42 15.9595 7.44173 16.0615 7.48394C16.1634 7.52615 16.256 7.58803 16.334 7.66603C16.412 7.74403 16.4739 7.83663 16.5161 7.93855C16.5583 8.04046 16.58 8.14969 16.58 8.26C16.58 8.37031 16.5583 8.47954 16.5161 8.58145C16.4739 8.68337 16.412 8.77597 16.334 8.85397C16.256 8.93197 16.1634 8.99384 16.0615 9.03606C15.9595 9.07827 15.8503 9.1 15.74 9.1ZM14.33 12C14.33 12.4608 14.1934 12.9113 13.9373 13.2945C13.6813 13.6776 13.3174 13.9763 12.8917 14.1526C12.4659 14.329 11.9974 14.3751 11.5454 14.2852C11.0935 14.1953 10.6783 13.9734 10.3524 13.6476C10.0266 13.3217 9.80468 12.9065 9.71478 12.4546C9.62487 12.0026 9.67101 11.5341 9.84737 11.1083C10.0237 10.6826 10.3224 10.3187 10.7055 10.0627C11.0887 9.80665 11.5392 9.67 12 9.67C12.618 9.67 13.2106 9.91548 13.6476 10.3524C14.0845 10.7894 14.33 11.382 14.33 12ZM12 0C9.62663 0 7.30655 0.703788 5.33316 2.02236C3.35977 3.34094 1.8217 5.21509 0.913451 7.4078C0.00519943 9.60051 -0.232441 12.0133 0.230582 14.3411C0.693605 16.6689 1.83649 18.8071 3.51472 20.4853C5.19295 22.1635 7.33115 23.3064 9.65892 23.7694C11.9867 24.2324 14.3995 23.9948 16.5922 23.0866C18.7849 22.1783 20.6591 20.6402 21.9776 18.6668C23.2962 16.6935 24 14.3734 24 12C24 8.8174 22.7357 5.76515 20.4853 3.51472C18.2348 1.26428 15.1826 0 12 0V0ZM19 14.89C19.0352 15.4389 18.9531 15.989 18.759 16.5036C18.5649 17.0182 18.2634 17.4855 17.8745 17.8745C17.4855 18.2634 17.0182 18.5649 16.5036 18.759C15.989 18.9531 15.4389 19.0352 14.89 19C14.14 19 13.89 19 12 19C10.11 19 9.86001 19 9.11001 19C8.56113 19.0352 8.01105 18.9531 7.49643 18.759C6.9818 18.5649 6.51446 18.2634 6.12555 17.8745C5.73664 17.4855 5.43509 17.0182 5.24101 16.5036C5.04693 15.989 4.96477 15.4389 5.00001 14.89C5.00001 14.14 5.00001 13.89 5.00001 12C5.00001 10.11 5.00001 9.86 5.00001 9.11C4.96477 8.56113 5.04693 8.01105 5.24101 7.49642C5.43509 6.9818 5.73664 6.51446 6.12555 6.12555C6.51446 5.73663 6.9818 5.43509 7.49643 5.241C8.01105 5.04692 8.56113 4.96476 9.11001 5C9.86001 5 10.11 5 12 5C13.89 5 14.14 5 14.89 5C15.4389 4.96476 15.989 5.04692 16.5036 5.241C17.0182 5.43509 17.4855 5.73663 17.8745 6.12555C18.2634 6.51446 18.5649 6.9818 18.759 7.49642C18.9531 8.01105 19.0352 8.56113 19 9.11C19 9.86 19 10.11 19 12C19 13.89 19 14.14 19 14.89Z" fill="url(#paint0_radial)"/>
              </g>
              <defs>
                <radialGradient id="paint0_radial" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(3.2252 20.6164) rotate(-45.8069) scale(26.6111 21.3649)">
                  <stop offset="0" stop-color="#F9ED32"/>
                  <stop offset="0.72" stop-color="#EE2A7B"/>
                  <stop offset="1" stop-color="#002AFF"/>
                </radialGradient>
                <clipPath id="clip0">
                  <rect width="24" height="24" fill="white"/>
                </clipPath>
              </defs>
              <path class="instagram-path-grey" d="M14.829 6.302c-.738-.034-.96-.04-2.829-.04-1.869 0-2.09.007-2.828.04-1.899.087-2.783.986-2.87 2.87-.033.738-.041.959-.041 2.828 0 1.869.008 2.09.041 2.829.087 1.879.967 2.783 2.87 2.87.737.033.959.041 2.828.041 1.87 0 2.091-.007 2.829-.041 1.899-.086 2.782-.988 2.87-2.87.033-.738.04-.96.04-2.829 0-1.869-.007-2.09-.04-2.828-.088-1.883-.973-2.783-2.87-2.87zm-2.829 9.293c-1.985 0-3.595-1.609-3.595-3.595 0-1.985 1.61-3.594 3.595-3.594s3.595 1.609 3.595 3.594c0 1.985-1.61 3.595-3.595 3.595zm3.737-6.491c-.464 0-.84-.376-.84-.84 0-.464.376-.84.84-.84.464 0 .84.376.84.84 0 .463-.376.84-.84.84zm-1.404 2.896c0 1.289-1.045 2.333-2.333 2.333-1.288 0-2.333-1.044-2.333-2.333 0-1.289 1.045-2.333 2.333-2.333 1.288 0 2.333 1.044 2.333 2.333zm-2.333-12c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.958 14.886c-.115 2.545-1.532 3.955-4.071 4.072-.747.034-.986.042-2.887.042s-2.139-.008-2.886-.042c-2.544-.117-3.955-1.529-4.072-4.072-.034-.746-.042-.985-.042-2.886 0-1.901.008-2.139.042-2.886.117-2.544 1.529-3.955 4.072-4.071.747-.035.985-.043 2.886-.043 1.901 0 2.14.008 2.887.043 2.545.117 3.957 1.532 4.071 4.071.034.747.042.985.042 2.886 0 1.901-.008 2.14-.042 2.886z" fill="inherit"/>
            </svg>
          </a> <?php
        endif ?>
            <a href="<?php echo $telegram_link ?>" target="_blank" class="hdr__telegram">
              <svg class="hdr__telegram-svg" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect class="telegram-rect" width="24" height="24" rx="12" fill="white"/>
                <path class="telegram-path" fill-rule="evenodd" clip-rule="evenodd" d="M12 24C18.6274 24 24 18.6275 24 12C24 5.37246 18.6274 0 12 0C5.37257 0 0 5.37246 0 12C0 18.6275 5.37257 24 12 24ZM13.2683 8.09941C14.0802 7.76426 16.8334 6.6958 16.8334 6.6958C16.8334 6.6958 18.1031 6.22793 17.9933 7.35996C17.9667 7.69893 17.8121 8.65283 17.6221 9.82471C17.5499 10.2709 17.4724 10.7484 17.395 11.2356L16.516 16.4798C16.516 16.4798 16.4427 17.2482 15.8444 17.381C15.2462 17.5137 14.2573 16.9131 14.0802 16.7804C14.0462 16.7552 13.8731 16.6479 13.6173 16.4895C12.8175 15.9938 11.209 14.9968 10.5152 14.441C10.271 14.2389 9.9902 13.8404 10.5518 13.3726C11.8215 12.2695 13.3416 10.9005 14.2573 10.0342C14.6846 9.62988 15.1058 8.69414 13.3416 9.83203L8.36638 12.9973C8.36638 12.9973 7.79865 13.3321 6.74257 13.0318C5.68037 12.7315 4.44727 12.3328 4.44727 12.3328C4.44727 12.3328 3.59872 11.8304 5.04551 11.2992L13.2683 8.09941Z" fill="#3C4446"/>
              </svg>
          </a>
        </div>
        <div class="hdr__buttons"> <?php
          echo do_shortcode( '[bvi]' ) ?>
          <a href="https://lk.1ztk-spb.ru/" class="hdr__login btn btn-blue">Личный кабинет</a>
        </div> <?php 
        wp_nav_menu( [
          'theme_location'  => 'header_menu',
          'container'       => 'nav',
          'container_class' => 'hdr__nav',
          'menu_class'      => 'hdr__nav-list',
          'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
        ] ) ?>
      </div>
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