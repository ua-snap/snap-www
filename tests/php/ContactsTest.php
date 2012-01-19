<?php

require_once "PHPUnit/Extensions/Database/TestCase.php";
require_once 'src/Contacts.php';

class ContactsTest extends PHPUnit_Framework_TestCase
{
	public function testConfigsPresent()
	{
		$this->assertEquals(Config::$contacts['collaboration']['email'],'becrevensten@alaska.edu','Config->Contacts->Collaboration is set');
		$this->assertEquals(Config::$contacts['data']['email'],'becrevensten@alaska.edu','Config->Contacts->Data is set');
		$this->assertEquals(Config::$contacts['web']['email'],'becrevensten@alaska.edu','Config->Contacts->Web is set');
		$this->assertEquals(Config::$contacts['alfresco']['email'],'becrevensten@alaska.edu','Config->Contacts->Alfresco is set');
		$this->assertEquals(Config::$contacts['hiring']['email'],'becrevensten@alaska.edu','Config->Contacts->Hiring is set');
		$this->assertEquals(Config::$contacts['general']['email'],'becrevensten@alaska.edu','Config->Contacts->General is set');
		$this->assertEquals(Config::$contacts['collaboration']['description'],'Becoming a SNAP collaborator','Config->Contacts->Collaboration Label is set');
		$this->assertEquals(Config::$contacts['data']['description'],'Technical data questions','Config->Contacts->Data Label is set');
		$this->assertEquals(Config::$contacts['web']['description'],'Our website (report issues, questions about usage)','Config->Contacts->Web Label is set');
		$this->assertEquals(Config::$contacts['alfresco']['description'],'ALFRESCO fire simulation model','Config->Contacts->Alfresco Label is set');
		$this->assertEquals(Config::$contacts['hiring']['description'],'SNAP hiring or management','Config->Contacts->Hiring Label is set');
		$this->assertEquals(Config::$contacts['general']['description'],'General inquiry','Config->Contacts->General Label is set');

	}

	public function testEmailConfigs()
	{
		$this->assertNotEmpty(Config::$email['host']);
	}

	public function testFetchContactSelector()
	{
		$c = Contacts::getEmailContacts();
		
		$this->assertTag(
            array(
                'tag'=>'select',
                'attributes' => array(
                    'id' => 'contactsSelector',
                    'name' => 'what'
                )
            ),
            $c,
            'Select element with specified ID+Name must be present'
        );

		foreach(Config::$contacts as $key => $params) {
			$this->assertTag(
	            array(
	                'tag'=>'option',
	                'attributes' => array(
	                    'value' => $key
	                ),
	                'content' => $params['description']
	            ),
	            $c,
	            'Options should match what key/descriptions are to be displayed'
	        );
		}
	}
}