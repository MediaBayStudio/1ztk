<?php

function minifyImg( $source_url, $destination_url = null, $quality = 90 ) {
  if ( is_null( $destination_url ) ) {
    $destination_url = $source_url;
  }

  $info = getimagesize( $source_url );

  if ( $info['mime'] === 'image/jpeg' ) $image = imagecreatefromjpeg( $source_url );
  elseif ( $info['mime'] === 'image/gif' ) $image = imagecreatefromgif( $source_url );
  elseif ( $info['mime'] === 'image/png' ) $image = imagecreatefrompng( $source_url );

  imagejpeg( $image, $destination_url, $quality );

  return $destination_url;
}

add_action( 'wp_generate_attachment_metadata', function ( $image_meta, $img_id ) {
  $img_path = get_attached_file( $img_id );
  $img_pathinfo = pathinfo( $img_path );


  $cwebp = '/usr/local/bin/cwebp -q 90 ' . $img_pathinfo['basename'] . ' -o ' . $img_pathinfo['filename'] . '.webp';

  chdir( $img_pathinfo['dirname'] );
  exec( $cwebp );
  minifyImg( $img_path );

  return $image_meta;
}, 10, 3 );


add_action( 'delete_attachment', function( $img_id, $img ){
  $img_path = get_attached_file( $img_id );
  $img_pathinfo = pathinfo( $img_path );
  $img_webp_filepath = php_path_join( $img_pathinfo['dirname'], $img_pathinfo['filename'] . '.webp' );

  if ( file_exists( $img_webp_filepath ) ) {
    unlink( $img_webp_filepath );
  }
}, 10, 2 );