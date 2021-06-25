<?php

function create_link_preload( $item ) {
  global $template_directory, $is_webp_support, $media_queries, $site_url;

  $media = '';

  if ( is_string( $item ) ) {
    $filepath = $item;
  } else {
    if ( $item['filepath'] ) {

      if ( $item['upload'] ) {
        $filepath = $item['filepath'];
      } else {
        $filepath = php_path_join( $template_directory, $item['filepath'] );
      } // endif $item['upload']

      $media = $item['media'] ? ' media="' . $item['media'] . '"' : '';
    } else if ( $item['file'] ) {
      $fields = get_fields( $item['file']['ID'] );

      $fields = [
        '2x_webp' => $fields['2x_webp_i'],
        'webp' => $fields['webp_i'],
        '2x' => $fields['2x_i']
      ];

      if ( $is_webp_support ) {
        $filepaths[] = [
          'path' => php_path_join( $site_url, $fields['2x_webp'] ),
          'media' => $media_queries['2x']
        ];

        $filepaths[] = [
          'path' => php_path_join( $site_url, $fields['webp'] ),
          'media' => $media_queries['1x']
        ];
      } else {
        $filepaths[] = [
          'path' => php_path_join( $site_url, $fields['2x'] ),
          'media' => $media_queries['2x']
        ];

        $filepaths[] = [
          'path' => $item['file']['url'],
          'media' => $media_queries['1x']
        ]; 
      } // endif $is_webp_support
    } // endif $item['file']
  } // endif is_string( $item )

  if ( $filepaths ) {
    foreach ( $filepaths as $path ) {
      echo '<link rel="preload" as="image" href="' . $path['path'] . '" media="' . $path['media'] . '" />' . PHP_EOL;
    }
  } else {
    echo '<link rel="preload" as="image" href="' . $filepath . '"' . $media . ' />' . PHP_EOL;
  } // endif $filepaths

}