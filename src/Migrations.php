<?php

require_once "src/SwDb.php";

class Migration
{
	public $version;

	public function __construct($props)
	{
		$this->version = $props['version'];
		$this->up = $props['up'];
		$this->down = $props['down'];
		$this->fixtures = $props['fixtures'];
	}

	public function up()
	{
		$res = array();
		try {
			$dbh = SwDb::getInstance();
			$dbh->beginTransaction();

			$sth = $dbh->prepare( $this->up );
			$sth->execute();
			$res['up'] = $sth->errorCode();

			$sth = $dbh->prepare( $this->fixtures );
			$sth->execute();
			$res['fixtures'] = $sth->errorCode();

			$dbh->commit();
		} catch (Exception $e) {
			$dbh->rollBack();
			throw new Exception($e); // bubble
		}			

		return $res;
	}

	public function down()
	{
		$res = array();
		try {
			$dbh = SwDb::getInstance();
			$dbh->beginTransaction();

			$sth = $dbh->prepare( $this->down );
			$sth->execute();
			$res['down'] = $sth->errorCode();

			$dbh->commit();
		} catch (Exception $e) {
			$dbh->rollBack();
			throw new Exception($e); // bubble
		}			

		return $res;	
	}
}

class MigrationSuite
{	
	private $at;
	private $migrations;
	private $log;

	public function __construct()
	{
		$this->at = 0;
		$this->migrations = array( new Migration( array('version'=>0, 'up'=>'select 1', 'fixtures'=>'select 1','down'=>'select 1'))); // no-op 0th migration
		$this->log = array();
	}
	
	public function up($to = null)
	{

		$to = ($to) ? $to : count($this->migrations);

		if ( $to <= $this->at )
		{
			throw new Exception('Tried to migrate up to a level <= current level of schema');	
		}

		++$this->at; // if we're AT patch level N, then we need to run the N+1th Up() to get to level N+1
		for( $i = $this->at; $i < $to; $i++) {
			$log = $this->migrations[$i]->up();
			$log['version'] = $this->migrations[$i]->version;
			$this->log[] = $log;
			$this->at = $this->migrations[$i]->version;
		}
		return $this->at;
	}
	
	public function down($to = null)
	{
		$to = ($to) ? $to : 0;

		if ( $to >= $this->at )
		{
			throw new Exception('Tried to migrate down to a level >= current level of schema');	
		}

		for( $i = $this->at; $i > $to; $i--) {
			$log = $this->migrations[$i]->down();
			$log['version'] = $this->migrations[$i]->version;
			$this->log[] = $log;
			$this->at = $this->migrations[$i]->version;
		}
		--$this->at; // having run Down on the Nth migration puts us *at* the N-1th patch level.
		return $this->at;
	}
	
	public function add($m)
	{
		$this->migrations[] = $m;
	}

	public function at($level = null)
	{
		if( null === $level ) {
			return $this->at;
		} else {
			$this->at = $level;
		}
	}
	
	public function log()
	{
		return $this->log;
	}
}

?>