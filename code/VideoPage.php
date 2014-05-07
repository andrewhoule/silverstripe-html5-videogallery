<?php

class VideoPage extends Page {
	
	private static $db = array (
		'SublimeJS' => 'Text'
	);

	private static $has_many = array (
		'Videos' => 'Video'
	);
	
	private static $icon = 'videogallery/images/videopage';
	
	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$VideosGridField = new GridField(
            'Videos',
            'Video',
            $this->Videos(),
            GridFieldConfig::create()
                ->addComponent(new GridFieldToolbarHeader())
                ->addComponent(new GridFieldAddNewButton('toolbar-header-right'))
                ->addComponent(new GridFieldSortableHeader())
                ->addComponent(new GridFieldDataColumns())
                ->addComponent(new GridFieldPaginator(50))
                ->addComponent(new GridFieldEditButton())
                ->addComponent(new GridFieldDeleteAction())
                ->addComponent(new GridFieldDetailForm())
                ->addComponent(new GridFieldSortableRows('SortOrder'))
        );
        $fields->addFieldToTab("Root.Videos", $VideosGridField);
        $fields->addFieldToTab("Root.Config", TextField::create('SublimeJS')->setTitle('Sublime JS URL')->setDescription('For example //cdn.sublimevideo.net/js/yourid.js'));
		return $fields;
	}

}

class VideoPage_Controller extends Page_Controller {

	public function init() {
        parent::init();
        Requirements::CSS("videogallery/css/videogallery.css");
        Requirements::javascript($this->SublimeJS);
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