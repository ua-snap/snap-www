<?php
require_once('src/SwDb.php');

/**
* Responsibility of this class is to:
*  - draw a resources's summary and detail blocks
*  - given a row from the resources table, determine how to draw that resource
*/
class Resource {

    public $props;

    public function __construct($props) {
        $this->props = $props;
    }

    public function render()
    {
        return; // no-op unless overridden in child classes    
    }

    public function renderDownloads()
    {
        return; // no-op unless overridden in child classes    
    }

    public function getType() {
        return $this->props['type'];
    }

    public function toSummaryHtml() {

        return <<<html
<a class="resource" href="resource_page.php?resourceid={$this->props['id']}">
    <span>{$this->props['title']}</span>
</a>
html;

    }

    static public function factory($props) {
        if(!isset($props['type'])) {
            throw new Exception('Type of resource is unset (invalid row retrieval)');
        }
        switch($props['type']) {

            case 1: return new ReportResource($props); break;
            case 2: return new PaperResource($props); break;
            case 3: return new PresentationResource($props); break;
            case 4: return new VideoResource($props); break;
            default: throw new Exception('Type of resource ['.$props['type'].'] was not recognized.');

        }
    }

    static public function fetchById($id) {
        try {
            $dbh = SwDb::getInstance();
            $sth = $dbh->prepare("SELECT * FROM resources WHERE id = :resourceId");
            $sth->execute( array( 'resourceId' => $id ));
            $props = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw new Exception($e); // bubble
        }
        return Resource::factory($props);     
    }
}

class ReportResource extends Resource {
    public $imgAltText="Report";
    public $imgSrc = "images/pub_report.png";
}

class PaperResource extends Resource {
    public $imgAltText="Paper";
    public $imgSrc = "images/pub_paper.png";
}

class PresentationResource extends Resource {
    public $imgAltText="Presentation";
    public $imgSrc = "images/pub_presentation.png";
}

class VideoResource extends Resource {
    public $imgAltText="Video";
    public $imgSrc = "images/pub_video.png";

    public function __construct($props)
    {
        parent::__construct($props);
        $this->populateVideoProperties();
    }

    protected function populateVideoProperties()
    {
        try {
            $dbh = SwDb::getInstance();
            $sth = $dbh->prepare("SELECT * FROM video_resource WHERE resource_id = :resourceId");
            $sth->execute( array( 'resourceId' => $this->props['id'] ));
            $props = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw new Exception($e); // bubble
        }

        $this->embeddedUrl = $props['embedded_url'];
        $this->embeddedTitle = $props['embedded_title'];
        $this->embeddedUserUrl = $props['embedded_user_url'];
        $this->embeddedUser = $props['embedded_user'];
        $this->linkedUrl = $props['linked_url'];
        $this->linkedTitle = $props['linked_title'];
        $this->fileVideoHref = $props['file_video_href'];
        $this->fileVideoTitle = $props['file_video_title'];
        $this->fileVideoType = $props['file_video_type'];
        $this->fileVideoSize = ( $size = @filesize($this->fileVideoHref)) ? $size : $props['file_video_size'];

    }

    // Renders the embedded & linked videos
    public function render()
    {
        return '<div class="video">'.$this->getEmbeddedVideo().$this->getLinkedVideo().'</div>';
    }

    public function getEmbeddedVideo()
    {
        return <<<html
<iframe src="{$this->embeddedUrl}?title=0&amp;byline=0&amp;portrait=0" width="400" height="225" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe><p><a class="title"  href="{$this->embeddedUrl}">{$this->embeddedTitle}</a> from <a class="user"  href="{$this->embeddedUserUrl}">{$this->embeddedUser}</a> on <a class="source"  href="http://vimeo.com">Vimeo</a>.</p>
html
;
    }

    public function getLinkedVideo()
    {
        return <<<html
<p><a class="link"  href="{$this->linkedUrl}">{$this->linkedTitle}</a></p>
html
;
    }

    public function renderDownloads()
    {        
        return <<<html
<p class="attachment"><img src="images/filetypes/video.png" alt=""/> <a class="download" href="{$this->fileVideoHref}" />{$this->fileVideoTitle}</a> (<span>{$this->fileVideoType}</span>, <span>{$this->fileVideoSize}</span>)</p>
html
;
    }
}

?>