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

    public function renderDownloadsTitle() {
        return '<h3>Downloads</h3>';
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
    }

    public function setVideoProperties($props) {
        
        $this->embeddedUrl = $props['embedded_url'];
        $this->embeddedTitle = $props['embedded_title'];
        $this->embeddedUserUrl = $props['embedded_user_url'];
        $this->embeddedUser = $props['embedded_user'];
        $this->source_type = $props['source_type'];
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

        $this->setVideoProperties($props);

    }

    // Renders the embedded & linked videos
    public function render()
    {
        $this->populateVideoProperties();
        return '<div class="video">'.$this->getEmbeddedVideo().'</div>';
    }

    public function getEmbeddedVideo()
    {
        if( 'vimeo' === $this->source_type ) {

return <<<html
<iframe src="{$this->embeddedUrl}?title=0&amp;byline=0&amp;portrait=0" width="400" height="225" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe><p><a class="title" href="{$this->embeddedUrl}">{$this->embeddedTitle}</a> from <a class="user"  href="{$this->embeddedUserUrl}">{$this->embeddedUser}</a> on <a class="source"  href="http://vimeo.com">Vimeo</a>.</p>
html
;
        } else if( 'youtube' === $this->source_type ) {
            
return <<<html
<object style="height: 390px; width: 640px"><param name="movie" value="http://www.youtube.com/v/{$this->embeddedUrl}?version=3&feature=player_detailpage"><param name="allowFullScreen" value="true"><param name="allowScriptAccess" value="always"><embed src="http://www.youtube.com/v/{$this->embeddedUrl}?version=3&feature=player_detailpage" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always" width="640" height="360"></object>
html
;

        }

        // default to a graceful no-op -- though, this shouldn't be reached, ever.

    }

    public function renderDownloadsTitle() {
        return ''; // no downloads for embedded videos
    }

}

?>