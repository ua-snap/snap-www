<?php
/**
This is a bare-bones schema migration utility for executing migrations.

Add actual migrations to the src/SchemaMigrations.php class.

The pieces here are:

Migration
- knows about up, fixtures, and down -- each of which is a string of SQL
- up runs SQL for up & fixtures
- down just runs down
- SQL executed is stored, and the error code is returned (often 00000 for OK!)

MigrationSuite
- you add migrations to it
- up runs each migration in the order it was added
- down runs the migrations in reverse
**/
require_once "src/SwDb.php";

class Migration
{
	public $version;
	public $sql = '';

	public function __construct($props)
	{
		$this->version = $props['version'];
		$this->up = $props['up'];
		$this->down = $props['down'];
		$this->fixtures = $props['fixtures'];
	}
	public function getSql()
	{
		return $this->sql;
	}

	protected function logSql($sql) {
		$this->sql .= "$sql\n";
	}

	public function up()
	{
		$res = array();
		try {
			$dbh = SwDb::getInstance();
			$dbh->beginTransaction();

			if(!empty($this->up)) {
				$sth = $dbh->prepare( $this->up );
				if( !$sth->execute() ) {
					throw new Exception( implode( " ", $sth->errorInfo() ));
				}
				$res['up'] = $sth->errorCode();
				$this->logSql($this->up);
			}

			if(!empty($this->fixtures)) {
				$sth = $dbh->prepare( $this->fixtures );
				if( !$sth->execute() ) {
					throw new Exception( implode( " ", $sth->errorInfo() ) );
				}
				$res['fixtures'] = $sth->errorCode();
				$this->logSql($this->fixtures);
			}

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

			if( !empty($this->down )) {
				$sth = $dbh->prepare( $this->down );
				if(!$sth->execute()) {
					throw new Exception( implode( " ", $sth->errorInfo()));
				}
				$res['down'] = $sth->errorCode();
				$this->logSql($this->down);
			}
			
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
	public $sql = '';

	public function __construct()
	{
		$this->at = 0;
		$this->migrations = array( new Migration( array('version'=>0, 'up'=>'-- no-op', 'fixtures'=>'-- no-op','down'=>'-- no-op'))); // no-op 0th migration
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
			$this->logSql($this->migrations[$i]->sql);			
		}
		return $this->at;
	}
	
	public function down($to = null)
	{
		$to = ($to !== null) ? $to : $this->at - 1;
		if ( $to >= $this->at )
		{
			throw new Exception('Tried to migrate down to a level >= current level of schema');	
		}

		for( $i = $this->at; $i > $to; $i--) {
			$log = $this->migrations[$i]->down();
			$log['version'] = $this->migrations[$i]->version;
			$this->log[] = $log;
			$this->at = $this->migrations[$i]->version;
			$this->logSql($this->migrations[$i]->sql);
		}
		--$this->at; // having run Down on the Nth migration puts us *at* the N-1th patch level.
		return $this->at;
	}
	
	public function add($m)
	{
		$this->migrations[] = $m;
	}

	protected function logSql($sql) {
		$this->sql .= "$sql\n";
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