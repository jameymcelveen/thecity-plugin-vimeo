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

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Vimeo Simple API Example</title>
	<style>
		ul { list-style-type: none; margin: 0; padding: 0; }
		li { display: inline; padding: 0; margin: 10px 2px; }
		img { border: 0; }
	</style>
</head>
<body>

	<h1>Sermons</h1>
	<p id="bio"><?php echo $user->user->bio ?></p>
	<div id="thumbs">
		<ul>
		<?php foreach ($videos->video as $video): ?>
			<li>
				<a href="<?php echo $video->url ?>"><img src="<?php echo $video->thumbnail_medium ?>" /></a>
			</li>
		<?php endforeach ?>
		</ul>
	</div>
	<script type="text/javascript" src="xd.js"></script>
	<script type="text/javascript">
		var src = 'http://acstdev.onthecity.org/#' + encodeURIComponent(document.location.href);
		//document.getElementById("xd_frame").src = src;

	   	XD.postMessage(200, src, frames[0]);

	</script>
</body>
</html>