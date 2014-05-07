Simple HTML5 Video Gallery for Sublime Video
============================================

## Author
* Andrew Houle
* http://andyhoule.com

## Requirements
* SilverStripe minimum version 3.0+.
* SortableGridField Module - https://github.com/UndefinedOffset/SortableGridField
* Sublime Video - http://sublimevideo.net/

## Installation
* Via Composer run "composer require andrewhoule/silverstripe-videogallery dev-master" or the following...
* Install SortableGridField module (see above).
* Add the videogallery folder to your site's root.
* Run http://yoursite.com/dev/build/?flush=all
* Add mime types to .htaccess - 
AddType video/mp4 .mp4
AddType video/ogg .ogv 
AddType audio/ogg .ogg
AddType video/webm .webm
AddType audio/webm .weba
* Create a new video gallery page, then add your Sublime Video JS to the Config tab, lastly upload files to videos tab & enjoy.

## Todo 
* Add list/gallery view options
* Add other players


