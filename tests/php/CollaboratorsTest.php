<?php

require_once 'src/Collaborators.php';
require_once "PHPUnit/Extensions/Database/TestCase.php";

class CollaboratorsTest extends PHPUnit_Framework_TestCase
{

	public function testFetchCollaborators()
	{
        if( Config::$testing['skipDatabase'] ) {
            $this->markTestSkipped("No database connection, skipping...");
        }

        // no explicit assertions, just catch if it doesn't exist or can't run
		$d = new Collaborators();
		$t = $d->fetch();

	}

	public function testFetchProjects()
	{
        if( Config::$testing['skipDatabase'] ) {
            $this->markTestSkipped("No database connection, skipping...");
        }

        // no explicit assertions, just catch if it doesn't exist or can't run
		$d = new Collaborators();
		$t = $d->fetchProjects(1);

	}
}