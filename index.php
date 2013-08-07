<?php include 'vimeo.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Vimeo Simple API Example</title>
	<link rel="stylesheet" href="http://dcascn3rg03ga.cloudfront.net/appkit/v1.3/appkit.css"/>
	<link rel="stylesheet" href="style.css"/>
</head>
<body>
	<div id="thumbs">
		<ul>
		<?php foreach ($videos->video as $video): ?>
			<li>
				<a href="<?php echo $video->url ?>">
					<img class="imagedropshadow" src="<?php echo $video->thumbnail_medium ?>" />
				</a>
			</li>
		<?php endforeach ?>
		</ul>
	</div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="tc-plugin-helper.js"></script>
	<script>$(TheCity.PluginHelper.initPlugin('acstdev'))</script>
</body>
</html>