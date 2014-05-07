<% if Content %>$Content<% end_if %>
<% if HTML5Videos %>
<div class="videos-wrap">
	<ul id="videos">
    	<% loop HTML5Videos %>
    		<li class="video">
    			<div class="video-poster">
	    			<a href="#video-$ID" class="sublime" data-uid="video-$ID">
				  		<img src="$PhotoCropped(160,90).URL" />
				  		<span class="play">Play</span>
					</a>
					<video id="video-$ID" poster="$PhotoCropped(800,453).URL" width="800" height="453" title="$Name" style="display:none" data-uid="video-$ID" preload="none">
						<source src="$MP4.URL" type='video/mp4' />
					    <source src="$WEBM.URL" type='video/webm' />
					    <source src="$OGG.URL" type='video/ogg' />
					</video>
				</div><!-- video-poster -->
				<div class="video-info">
					<% if Name %><h3><a href="#video-$ID" class="sublime" data-uid="video-$ID">$Name</a></h3><% end_if %>
					<% if Description %><p>$Description</p><% end_if %>
				</div><!-- video-info -->
    		</li><!-- video -->
    	<% end_loop %>
    </ul><!-- videos -->
</div><!-- .videos-wrap -->
<% end_if %>

