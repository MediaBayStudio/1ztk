<?php

/*
	Template name: contacts
*/

get_header();

foreach ( $GLOBALS['sections'] as $section ) {
	if ( $section['is_visible'] ) {
		$section_name = $section['acf_fc_layout'];
		$section_id = $section['sect_id'] ? ' id="' . $section['sect_id'] . '"' : '';
		require 'template-parts/' . $section_name . '.php';
	}
}

get_footer();