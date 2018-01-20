<?php
	header('Content-type: image/jpeg');
	imagejpeg($image, null, 100); // We chose to show a JPG with a quality of 95%
?>