<?php

add_shortcode( 'custom_discord_widget', function () {
	
	$data = file_get_contents('https://discord.com/api/guilds/793855822191001612/widget.json');
	$decoded = json_decode($data);
	$out = "";

	if ($data && json_last_error() === JSON_ERROR_NONE && isset($decoded->presence_count) && isset($decoded->members)) {
		$out .= "<div class=\"discord-widget\"><a href=\"/join\"><span>Právě je nás $decoded->presence_count online:</span>";

		foreach ($decoded->members as $member) {
			$out .= "<img src=\"$member->avatar_url\" title=\"$member->username\" alt=\"$member->username\" />";
		}

		$out .= '</a></div>
			<style>
				.discord-widget {margin-top: -0.5em;}
				.discord-widget a {display: flex; flex-wrap: wrap; align-items: center; text-decoration: inherit; color: inherit;}
				.discord-widget img {height: 2em; border-radius: 8px;}
				.discord-widget a > * {margin-right: 0.5em;}
			</style>
		';
	}

	return $out;
} );
