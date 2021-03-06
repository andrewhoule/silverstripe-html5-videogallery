<?php

class Video extends DataObject
{
    
    private static $db = array(
        "SortOrder" => "Int",
        "Name" => "Text",
        "Description" => "Text"
    );
    
    private static $has_one = array(
        "VideoPage" => "VideoPage",
        "Poster" => "Image",
        "MP4" => "File",
        "WEBM" => "File",
        "OGG" => "File"
    );
    
    private static $default_sort = "SortOrder Asc";

    private static $summary_fields = array(
        "Thumbnail" => "Poster",
        "Name" => "Name",
          "Description" => "Description"
    );

    private static $allowed_extensions = array("webm");

    public function canCreate($Member = null)
    {
        return true;
    }
    public function canEdit($Member = null)
    {
        return true;
    }
    public function canView($Member = null)
    {
        return true;
    }
    public function canDelete($Member = null)
    {
        return true;
    }
    
    public function getCMSFields()
    {
        $imgfield = UploadField::create("Poster")->setTitle("Cover Photo");
        $imgfield->getValidator()->allowedExtensions = array("jpg","jpeg","gif","png");
        $mp4field = UploadField::create("MP4")->setTitle("MP4 File");
        $mp4field->getValidator()->allowedExtensions = array("mp4");
        $webmfield = UploadField::create("WEBM")->setTitle("WEBM File");
        $webmfield->getValidator()->allowedExtensions = array("webm");
        $oggfield = UploadField::create("OGG")->setTitle("OGG File");
        $oggfield->getValidator()->allowedExtensions = array("ogg");
        return new FieldList(
            TextField::create("Name"),
            TextareaField::create("Description"),
            $imgfield,
            $mp4field,
            $webmfield,
            $oggfield
        );
    }
    
    public function PhotoCropped($x=120, $y=68)
    { /* 16:9 Ratio */
         return $this->Poster()->CroppedImage($x, $y);
    }
    
    public function Thumbnail()
    {
        $Image = $this->Poster();
        if ($Image) {
            return $Image->CMSThumbnail();
        } else {
            return null;
        }
    }
}
