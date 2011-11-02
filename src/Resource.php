<?php
require_once('src/SwDb.php');

/**
* Responsibility of this class is to:
*  - draw a resources's summary and detail blocks
*  - given a row from the resources table, determine how to draw that resource
*/
class Resource {

	public function __construct($props) {
		$this->props = $props;
	}

	public function getTagList() {
		$tags = '';
		try {
			$dbh = SwDb::getInstance();
			$sth = $dbh->query("SELECT GROUP_CONCAT( DISTINCT tag ORDER BY tag SEPARATOR ', ') AS tags FROM resource_tags WHERE resourceid='{$this->props['id']}'");
			$tags = $sth->fetch();
		} catch (Exception $e) {
			throw new Exception($e); // bubble
		}
		if(!empty($tags[0])) { 
			$tags = '<div style="color: #666;">Tags: '.$tags[0].'</div>';
		} else {
			$tags = '';
		}
		return $tags;

	}

	public function toSummaryHtml() {

		$tags = $this->getTagList();

		return <<<html
<div id="pub_box_{$this->props['id']}" class="resource">
	<div id="pub_hover_{$this->props['id']}" class="hover_box">
		<div style="position: relative; ">
			<div style="position: absolute; ">
				<img alt="{$this->imgAltText}" src="{$this->imgSrc}" style="margin-left: 5px;" />
			</div>
			<div style="position: relative; left: 59px; width: 380px;">
				<div style="font-size: 15px; color: #111111; margin-top: 5px; margin-bottom: 5px;" >
					<a href="resource_page.php?resourceid={$this->props['id']}">{$this->props['title']}</a>
				</div>
				<div style="position: relative; width: 420px; margin-bottom: 10px;"><!-- no-op lint --></div>$tags
			</div>
		</div>
	<div style="margin-top: 10px;width: 420px; padding: 10px;">{$this->props['summary']}</div>
	<div style="position: relative; left: 385px; bottom: 5px; margin-top: 10px;">
		<a id="pub_close_{$this->props['id']}" style="cursor: pointer; cursor: hand;">close &#8855;</a>
	</div>
</div>
<div style="width: 50px; padding: 6px; position: absolute; z-index: 1;">
	<img alt="{$this->imgAltText}" src="{$this->imgSrc}" style="" />
</div>
<div style="position: absolute; padding-top: 6px; left: 60px; width: 380px;">
	<div style="font-size: 15px; color: #111111; margin-bottom: 5px;" >
		<a href="resource_page.php?resourceid={$this->props['id']}">{$this->props['title']}</a>
	</div>
</div>
<script type="text/javascript">
var config = { 
	over: function()
		{
			$('#pub_hover_{$this->props['id']}').fadeIn(300);
		},
	interval: 100,
	out: function()	
		{ 
			$('#pub_hover_{$this->props['id']}').hide(0); 
		} 
};
$('#pub_box_{$this->props['id']}').hoverIntent(config);
$('#pub_close_{$this->props['id']}').click( function()
	{ 
		$('#pub_hover_{$this->props['id']}').hide(0);
	}
);
</script>
</div>
html;

	}

	static public function factory($props) {

		switch($props['type']) {

			case 1: return new ReportResource($props); break;
			case 2: return new PaperResource($props); break;
			case 3: return new PresentationResource($props); break;
			case 4: return new VideoResource($props); break;
			default: throw new Exception('Type of resource ['.$props['type'].'] was not recognized.');

		}
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
}


?>