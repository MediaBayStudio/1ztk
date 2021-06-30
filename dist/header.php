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
    }

    $GLOBALS['page_script_name'] = $script_name;
    $GLOBALS['page_style_name'] = $style_name;
    $page_style = $GLOBALS['page_style_name'] ?>
    
<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
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
          <a href="<?php echo $vk_link ?>" traget="_blank" class="hdr__vk vk vk-grey"></a>
          <a href="<?php echo $instagram_link ?>" traget="_blank" class="hdr__instagram instagram instagram-grey"></a>
        </div>
        <div class="hdr__buttons"> <?php
          echo do_shortcode( '[bvi]' ) ?>
          <button type="button" class="hdr__login btn btn-blue">Личный кабинет</button>
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