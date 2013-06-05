<?php

class VideoPage extends Page {
	
	static $has_many = array (
		'Videos' => 'Video'
	);
	
	static $icon = "videogallery/images/videopage";
	
	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$VideosGridFieldConfig = GridFieldConfig::create()->addComponents(
			new GridFieldToolbarHeader(),
			new GridFieldAddNewButton('toolbar-header-right'),
			new GridFieldSortableHeader(),
			new GridFieldDataColumns(),
			new GridFieldPaginator(50),
			new GridFieldEditButton(),
			new GridFieldDeleteAction(),
			new GridFieldDetailForm(),
			new GridFieldSortableRows('SortOrder')
		);
		$VideosGridField = new GridField("Videos", "Videos", $this->Videos(), $VideosGridFieldConfig);
		$fields->addFieldToTab("Root.Videos", $VideosGridField);
		return $fields;
	}

}

class VideoPage_Controller extends Page_Controller {

	function init() {
		parent::init();
		Requirements::CSS('videogallery/css/videogallery.css');
	}

	public function HTML5Videos() {
		$videosfiltered = new ArrayList();
		$videos = $this->getComponents('Videos');
		if($videos) {
			foreach($videos AS $video) {
				if( $video->getComponent('Poster')->exists() AND $video->getComponent('MP4')->exists() AND $video->getComponent('WEBM')->exists() AND $video->getComponent('OGG')->exists() ) {
					$videosfiltered->push($video); 
				}
			}
		}
		return $videosfiltered;
	}
	
}

?>