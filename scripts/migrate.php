#! /usr/bin/php
<?php

require 'src/Migrations.php';
require 'src/SchemaMigrations.php';
require_once 'src/SwDb.php';

$version = SwDb::getSchemaVersion();
if( !is_numeric($version) ) { $version = 'undefined or unknown!'; }
$versionText = "\n\nCurrent patch level: $version\n\n";
if( !is_numeric($version) ) { echo "\nNOTE: Patch level can't be determined, run rebuild to start from migration 1 to newest.\n";}
$migrationSuite = loadMigrationSuite();
$migrationSuite->at($version);
$to = (isset($argv[2]) && is_numeric($argv[2])) ? $argv[2] : null;
$action = (isset($argv[1])) ? $argv[1] : null;

switch( $action ) {
    
    case 'up':
        try {
            echo $versionText;
            echo ($to) ? "Migrating from level [$version] up to level [$to]...\n" : "Migrating from level [$version] to highest patch level...\n";
            $res = $migrationSuite->up($to);
            SwDb::setSchemaVersion($res);           
            echo $migrationSuite->sql;
            echo "\n...finished migrating to level [$res].\n";
        } catch (Exception $e) {
            echo "\nFailed, caught exception:\n$e\n";
        }
        break;

    case 'rebuild':
        try {
            echo "Migrating from clean slate up to highest patch level...\n";
            $migrationSuite->at(0);
            $res = $migrationSuite->up();
            SwDb::setSchemaVersion($res);
            echo $migrationSuite->sql;
            echo "\n...finished rebuilding to level [$res].\n";
        } catch (Exception $e) {
            echo "\nFailed, caught exception:\n$e\n";
        }
        break;

    case 'down':
        try {
            echo $versionText;
            if (!$to) { $versionTo = $version -1; }
            echo ($to) ? "Migrating from level [$version] down to level [$to]...\n" : "Migrating from level [$version] to previous revision [$versionTo]...\n";
            $res = $migrationSuite->down($to);

            // if we're at version level #0, we can't update the schema table, so skip this.
            if(0 !== $res) {
                SwDb::setSchemaVersion($res);
            }

            echo $migrationSuite->sql;
            echo "\n...finished migrating to level [$res].\n";
        } catch (Exception $e) {
            echo "\nFailed, caught exception:\n$e\n";
        }
        break;

    default:
        
        echo<<<info
DB Schema maintenance:

* Add a new migration to the end of the ordered array in the src/SchemaMigrations.php file
* Each migration is responsibile for noting its version #, the SQL to execute on 'up', 'fixtures', and 'down' triggers.

Usage of this script:

(from root of install / web directory):

./scripts/migrate.php up [level]
  Attempts to start at current schema version of the database, and migrate up to the specified level.  If no [level] is provided, tries to move to the most current version available.

./scripts/migrate.php down [level]
  Attempts to start at the current schema version of the database, and migrate down to the specified level.  If no [level] is provided, tries to go down ONE schema version.

./scripts/migrate.php rebuild
  Assumes that the DB is at level 0 (empty) and runs all up() migrations.

./scripts.migrate.php 
  This help information, and displays current schema version of the database.

$versionText

info;

        break;
}
exit(0);

function loadMigrationSuite()
{
    $ms = new MigrationSuite();
    $sm = new SchemaMigrations();
    foreach( $sm->migrations as $aMigration )
    {
        $ms->add($aMigration);
    }
    return $ms;
}

?>
