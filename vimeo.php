<?php

// Change this to your username to load in your videos
$vimeo_user_name = ($_GET['user']) ? $_GET['user'] : '11804786';

// API endpoint
$api_endpoint = 'http://vimeo.com/api/v2/' . $vimeo_user_name;

// Curl helper function
function curl_get($url) {
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_TIMEOUT, 30);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	$return = curl_exec($curl);
	curl_close($curl);
	return $return;
}

// Load the user info and clips
$user = simplexml_load_string(curl_get($api_endpoint . '/info.xml'));
$videos = simplexml_load_string(curl_get($api_endpoint . '/videos.xml'));