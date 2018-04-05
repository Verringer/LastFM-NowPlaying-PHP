# LastFM-NowPlaying-PHP
Grab the currently playing / last played song from a Last.FM account

Will be updating to make this more user friendly and add more features - may not be the most efficient, one of my first PHP projects.

## Usage
1. You will need an API key from https://www.last.fm/api - enter this in $key
2. Enter the account username that you'd like to receive the most recent song played for in $user

# Examples
![Default](https://i.imgur.com/g2evp4l.png)

Live example on https://verringer.com

## Code
```
<?php
	$key = '';
	$user = '';

	$string = file_get_contents('http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user='.$user.'&api_key='.$key.'&format=json');
	$json = json_decode($string, true);

	$artist = $json['recenttracks']['track'][0]['artist']['#text'];
	$song = $json['recenttracks']['track'][0]['name'];
	$artwork = $json['recenttracks']['track'][0]['image'][3]['#text'];
	$url = $json['recenttracks']['track'][0]['url'];

	echo '<a href="'.$url.'">'.'<img src="'.$artwork.'">'.$artist.' - '.$song.'</a>';
 ?>```
