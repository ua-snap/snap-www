<?php

require_once "PHPUnit/Extensions/Database/TestCase.php";
require_once "src/Config.php";
require_once "src/Resource.php";
require_once "tests/fixtures/Fixtures.php";

class VideoAttachmentTest extends PHPUnit_Framework_TestCase
{
    protected $video;
    
    public function setUp() {

        $this->resource = Resource::factory(Fixtures::$videoResource);
    }

    public function testRenderEmbeddedVimeo() {

        $this->resource->setVideoProperties(Fixtures::$vimeoVideoProps);
      
        $this->assertEquals('<iframe src="http://vimeo.com/31989085?title=0&amp;byline=0&amp;portrait=0" width="400" height="225" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe><p><a class="title" href="http://vimeo.com/31989085">Jeremy Mathis. Ocean Acidification: What It Means to Alaska</a> from <a class="user"  href="http://vimeo.com/snapandaccap">snapandaccap</a> on <a class="source"  href="http://vimeo.com">Vimeo</a>.</p>', $this->resource->getEmbeddedVideo(), "Video resource can return a string of HTML to render an embedded video hosted on Vimeo.");
    }

    public function testRenderEmbeddedYoutube() {

        $this->resource->setVideoProperties(Fixtures::$youtubeVideoProps);

        $this->assertEquals('<object style="height: 390px; width: 640px"><param name="movie" value="http://www.youtube.com/v/h0JREVf8iDc?version=3&feature=player_detailpage"><param name="allowFullScreen" value="true"><param name="allowScriptAccess" value="always"><embed src="http://www.youtube.com/v/h0JREVf8iDc?version=3&feature=player_detailpage" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always" width="640" height="360"></object>', $this->resource->getEmbeddedVideo(), "Video resource can return a string of HTML to render an embedded video hosted on Youtube.");

    }

}

?>