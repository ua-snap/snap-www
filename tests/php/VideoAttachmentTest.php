<?php

require_once "PHPUnit/Extensions/Database/TestCase.php";
require_once "src/Config.php";
require_once "src/Resource.php";
require_once "tests/fixtures/Fixtures.php";

class VideoAttachmentTest extends PHPUnit_Framework_TestCase
{
    protected $video;
    
    public function setUp() {

        if( Config::$testing['skipDatabase'] ) {
            $this->markTestSkipped("No database connection, skipping...");
        }
        $this->video = Resource::fetchById(15);
    }

    public function testRenderEmbeddedVideo() {

        if( Config::$testing['skipDatabase'] ) {
            $this->markTestSkipped("No database connection, skipping...");
        }        
        $this->assertEquals('<iframe src="http://player.vimeo.com/video/4515275?title=0&amp;byline=0&amp;portrait=0" width="400" height="225" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe><p><a class="title" target="_blank" href="http://player.vimeo.com/video/4515275">A thousand shades of white</a> from <a class="user" target="_blank" href="http://vimeo.com/icescapestv">icescapes</a> on <a class="source" target="_blank" href="http://vimeo.com">Vimeo</a>.</p>', $this->video->getEmbeddedVideo(), "Video resource can return a string of HTML to render an embedded video.");
    }

    public function testRenderLinkedVideo() {
        if( Config::$testing['skipDatabase'] ) {
            $this->markTestSkipped("No database connection, skipping...");
        }
        $this->assertEquals('<p><a class="link" target="_blank" href="http://www.youtube.com/watch?v=u5DiHp76gjs&feature=results_main&playnext=1&list=PLBBDD34F33BAF19CD">Alaskan Native thoughts on climate change</a></p>', $this->video->getLinkedVideo(), "Video resource should produce a string of HTML to render a link to a video on another site");
    }

    public function testRenderFileLink() {
        if( Config::$testing['skipDatabase'] ) {
            $this->markTestSkipped("No database connection, skipping...");
        }        
        $this->assertEquals('<p class="attachment"><img src="images/filetypes/video.png" alt=""/> <a class="download" href="attachments/path_to_nowhere.mp4" />Alaskan Native thoughts on climate change</a> (<span>.mp4</span>, <span>20 MB</span>)</p>', $this->video->renderDownloads(), "Video should provide a link to a downloadable version of a video");
    }

    public function testVideoExternalLinks()
    {   
        if( Config::$testing['skipDatabase'] ) {
            $this->markTestSkipped("No database connection, skipping...");
        }
        
        $r = Resource::factory(Fixtures::$resources[15]);
        $this->assertTag(
            array(
                'tag'=>'a',
                'attributes' => array(
                    'class' => 'title',
                    'target' => '_blank'
                )
            ),
            $r->getEmbeddedVideo(),
            'Links from videos should open in a new window'
        );

        $this->assertTag(
            array(
                'tag'=>'a',
                'attributes' => array(
                    'class' => 'user',
                    'target' => '_blank'
                )
            ),
            $r->getEmbeddedVideo(),
            'Links from videos should open in a new window'
        );

        $this->assertTag(
            array(
                'tag'=>'a',
                'attributes' => array(
                    'class' => 'link',
                    'target' => '_blank'
                )
            ),
            $r->getLinkedVideo(),
            'Links from videos should open in a new window'
        );

        $this->assertEquals( Fixtures::$resourceSummaries[15], $r->toSummaryHtml(), "User can see summary block of information about a resource, including a Hover functionality that shows more detail");        

    }
}

?>