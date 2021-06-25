<?php

/*
	Template name: applications
*/

get_header();

$sections = get_field( 'sections' );

foreach ( $GLOBALS['sections'] as $section ) {
	if ( $section['is_visible'] ) {
		$section_name = $section['acf_fc_layout'];
		$section_id = $section['sect_id'] ? ' id="' . $section['sect_id'] . '"' : '';
		require 'template-parts/' . $section_name . '.php';
	}
}

get_footer();