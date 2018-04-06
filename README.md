# LastFM-NowPlaying-PHP
Grab the currently playing / last played song from a Last.fm account

## Usage
* You will need an API key from https://www.last.fm/api - enter this in $key
* Enter the account username that you'd like to receive the most recent song played for in $user
* Edit the echo to suit your needs, or leave it as it is to display artwork alongside artist - title with a link to the Last.fm page.

## Screenshot
![Default](https://i.imgur.com/g2evp4l.png)

Live example on https://verringer.com

## Features
* Only requires API key and username inputting and is ready to use.
* Failover to local artwork image if last.fm doesn't have artwork for that song.
* Artist, Album, Title, Song, URL & Artwork can all be implemented in to your output.
* Default output already set (`<a href="song"><img src="artwork">Artist - Title</a>`)
