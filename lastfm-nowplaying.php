<?php
	# Config
		$key = ''; # https://www.last.fm/api
		$user = ''; # https://www.last.fm/user/verringer <- enter verringer (for example)
		$artwork_failover = 'on'; # Set to off if you do not want to display a placeholder image if Last.fm doesn't 
		$artwork_location = 'artwork.png'; # Location of your artwork, default is artwork.png in the same directory

	# Code
		$string = file_get_contents('http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user='.$user.'&api_key='.$key.'&format=json');
		$json = json_decode($string, true);

		$artist = $json['recenttracks']['track'][0]['artist']['#text'];
		$album = $json['recenttracks']['track'][0]['album']['#text'];
		$title = $json['recenttracks']['track'][0]['name'];
		$song = $artist.' - '.$title;
		$url = $json['recenttracks']['track'][0]['url'];
		if ($artwork_failover == 'on') {
			if (empty($json['recenttracks']['track'][0]['image'][3]['#text'])) {
				$artwork = $artwork_location;
			}
			else {
				$artwork = $json['recenttracks']['track'][0]['image'][3]['#text'];
			}
		}
		elseif ($artwork_failover == 'off') {
			$artwork = $json['recenttracks']['track'][0]['image'][3]['#text'];
		}
		else {
			echo '<pre>Error: Please enter yes or no in $artwork_failover</pre>';
		}

	# Debugging
		#echo $string;
		#echo 'Artist: '.$artist.'<br>Album: '.$album.'<br>Title: '.$title.'<br>Song: '.$song.'<br>URL: '.$url.'<br>Artwork: '.$artwork.'<br>';

	# Output
		echo '<a href="'.$url.'">'.'<img src="'.$artwork.'">'.$song.'</a>';
?>
