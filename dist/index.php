<?php

/*
	Template name: index
*/

get_header();

// function cImg( $source_url, $destination_url = null, $quality = 90 ) {
//   if ( is_null( $destination_url ) ) {
//     $destination_url = $source_url;
//   }

//   $info = getimagesize( $source_url );

//   if ( $info['mime'] === 'image/jpeg' ) $image = imagecreatefromjpeg( $source_url );
//   elseif ( $info['mime'] === 'image/gif' ) $image = imagecreatefromgif( $source_url );
//   elseif ( $info['mime'] === 'image/png' ) $image = imagecreatefrompng( $source_url );

//   imagejpeg( $image, $destination_url, $quality );

//   return $destination_url;
// }

// $dir = '/Users/administrator/Desktop/h';
// $files = scandir( '/Users/administrator/Desktop/h' );

// foreach ( $files as $file ) {

//   // break;

//   if ( $file[0] !== '.' ) {
//     $filepath = $dir . DIRECTORY_SEPARATOR . $file;
//     $pathinfo = pathinfo( $filepath );
//     $cwebp = '/usr/local/bin/cwebp -q 90 ' . $pathinfo['basename'] . ' -o ' . $pathinfo['filename'] . '.webp';
//     chdir( $dir );
//     exec( $cwebp );
//     cImg( $filepath );
//   }
// }

foreach ( $GLOBALS['sections'] as $section ) {
	if ( $section['is_visible'] ) {
		$section_name = $section['acf_fc_layout'];
		$section_id = $section['sect_id'] ? ' id="' . $section['sect_id'] . '"' : '';
		require 'template-parts/' . $section_name . '.php';
	}
}

get_footer();