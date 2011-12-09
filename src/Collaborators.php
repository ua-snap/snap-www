<?php

require_once 'SwDb.php';

class Collaborators {
	
	public function __construct() {
		$this->dbh = SwDb::getInstance();
	}

	public function fetch() {
		$sth = $this->dbh->query('SELECT * FROM collaborators ORDER BY name ASC');
		return $sth->fetchAll();
	}

	public function fetchProjects($collaboratorId) {
		$sth = $this->dbh->prepare('SELECT * FROM projects JOIN project_collaborators ON projects.id = project_collaborators.projectid WHERE project_collaborators.collaboratorid = ?');
		$sth->execute( array( $collaboratorId ));
		return $sth->fetchAll();
	}

}