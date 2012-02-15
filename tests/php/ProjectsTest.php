<?php

require_once "PHPUnit/Extensions/Database/TestCase.php";
require_once "src/Project.php";
require_once "tests/fixtures/Fixtures.php";

class ProjectsTest extends PHPUnit_Framework_TestCase
{

    public function testProjectSummary()
    {

        $p = new Project(Fixtures::$project);
        $html = $p->getSummaryHtml();
        var_dump($html);

        $this->assertTag(array('tag'=>'a','attributes'=>array('href' => '/project_page.php?projectid=1', 'class'=>'project')), $html, 'verify project wrapper link');

        $this->assertTag(array('tag'=>'h4','content'=>'ProjectTitle'), $html, 'verify title header + content');
        $this->assertTag(array('tag'=>'img', 'attributes'=>array('src'=>'project.png', 'title'=>'ImageSource')), $html, 'verify image and attribution title');
        $this->assertTag(array('tag'=>'p', 'content'=>'ProjectSummary'), $html, 'verify summary blurb');
  
    }


}
?>
