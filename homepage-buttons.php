<?php

add_shortcode('homepage_buttons', function () {
	$buttons = [
		['Chci se přidat', '/join', 'fab fa-discord'],
		['Chci darovat', 'https://www.darujme.cz/projekt/1205564', 'fas fa-hand-holding-heart'],
		['Seznam projektů', 'https://wiki.glowspace.cz/Seznam_projekt%C5%AF_Glow_Space', 'fas fa-list'],
		['Znalostní báze', '', 'fas fa-book']
	];
	$colors = ['rgb(51,155,240)', 'rgb(2,3,129)', 'rgb(159,55,169)', 'rgb(208,17,17)', 'rgb(183, 180, 0)'];
	$out = '<div class="wp-block-buttons">';

	foreach ($buttons as $key => $button) {
		$out .= '<div class="wp-block-button" style="margin-right:0.75em"><a class="wp-block-button__link" href="' . $button[1] . '" style="border-radius:8px;background:linear-gradient(135deg,' . ($colors[$key] ?? '#333') . ' 0%,' . ($colors[$key + 1] ?? '#111') . ' 100%)"><i class="' . $button[2] . '"></i>&nbsp; ' . $button[0] . '</a></div>';
	}
	
	$out .= '</div>';
	return $out;
});
