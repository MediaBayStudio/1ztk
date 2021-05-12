<?php

/*
	Template name: index
*/

get_header();

$sections = get_field( 'sections' );

foreach ( $sections as $section ) {
  $section_id = $section['id'] ? ' id="' . $section['id'] . '"' : '';
	require 'template-parts' . DIRECTORY_SEPARATOR . $section['acf_fc_layout'] . '.php';
}

get_footer();