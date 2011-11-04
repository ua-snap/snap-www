<?php

require_once "PHPUnit/Extensions/Database/TestCase.php";
require_once "src/Config.php";
require_once "src/Resource.php";
require_once "tests/fixtures/Fixtures.php";

class VideoAttachmentTest extends PHPUnit_Framework_TestCase
{
    protected $video;
    
    public function setUp() {
        $this->video = Resource::fetchById(15);
    }

    public function testRenderEmbeddedVideo() {
        $this->assertEquals('<iframe src="http://player.vimeo.com/video/4515275?title=0&amp;byline=0&amp;portrait=0" width="400" height="225" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe><p><a href="http://player.vimeo.com/video/4515275">A thousand shades of white</a> from <a href="http://vimeo.com/icescapestv">icescapes</a> on <a href="http://vimeo.com">Vimeo</a>.</p>', $this->video->getEmbeddedVideo(), "Video resource can return a string of HTML to render an embedded video.");
    }

    public function testRenderLinkedVideo() {
        $this->assertEquals('<p><a target="_blank" href="http://www.youtube.com/watch?v=u5DiHp76gjs&feature=results_main&playnext=1&list=PLBBDD34F33BAF19CD">Alaskan Native thoughts on climate change</a></p>', $this->video->getLinkedVideo(), "Video resource should produce a string of HTML to render a link to a video on another site");
    }

    public function testRenderFileLink() {
        $this->assertEquals('<p class="attachment"> <img src="images/filetypes/video.png" alt=""/> Download <a href="attachments/path_to_nowhere.mp4" />Alaskan Native thoughts on climate change (<span>.mp4</span>, <span>20 MB</span>)</p>', $this->video->getFileVideo(), "Video should provide a link to a downloadable version of a video");
    }
}


/**
<iframe src="http://player.vimeo.com/video/4515275?title=0&amp;byline=0&amp;portrait=0" width="400" height="225" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe><p><a href="http://vimeo.com/4515275">A thousand shades of white</a> from <a href="http://vimeo.com/icescapestv">icescapes</a> on <a href="http://vimeo.com">Vimeo</a>.</p>

http://www.youtube.com/watch?v=u5DiHp76gjs&feature=results_main&playnext=1&list=PLBBDD34F33BAF19CD

 echo "<div style=\"margin-top: 10px;\"><a href=\"attachments/".$attachment['filename']."\">".$attachment['name']." </a> <img src=\"$mime\" style=\"vertical-align: middle;\" /> ($file_size)";
**/
?>