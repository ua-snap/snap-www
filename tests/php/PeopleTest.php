<?php

require_once "PHPUnit/Extensions/Database/TestCase.php";
require_once "src/People.php";

class PeopleTest extends PHPUnit_Framework_TestCase
{
    public function testGetPersonThumbnail()
    {
        $p = new People();
        $html = $p->getPersonThumbnail(array(
            'id' => 5,
            'image' => 'picture.png',
            'title' => 'Title',
            'first' => 'FirstName',
            'last' => 'LastName',
            'position' => 'Boss'
        ));

        $this->assertTag(array('tag'=>'div','attributes'=>array('class'=>'person')), $html, 'verify person wrapper div');
        $this->assertTag(array('tag'=>'img','attributes'=>array('src'=>'/images/people/picture.png')), $html, 'verify image tag');
        $this->assertTag(array('tag'=>'a','attributes'=>array('href'=>'/people_page.php?id=5')), $html, 'verify link to bio page');
        $this->assertTag(array('tag'=>'p','content'=>'FirstName LastName','attributes'=>array('class'=>'name')), $html, 'verify name present');
        $this->assertTag(array('tag'=>'p','content'=>'Boss','attributes'=>array('class'=>'title')), $html, 'verify title present');

    }

}

?>