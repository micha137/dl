<?php
// basic initialization
require_once("prelude.php");
require_once("confwrap.php");
require_once("PasswordHash.php");
require_once("lang.php");

// check data dirs
if(!is_readable($spoolDir) || !is_writable($spoolDir))
  die("cannot access spool directory\n");
if(!file_exists($dataDir))
{
  if(!mkdir($dataDir))
    die("cannot initialize data directory\n");
}

// initialize logging
if($useSysLog)
  $ret = openlog($logFile, 0, LOG_LOCAL0);
elseif(!empty($logFile))
  $ret = $logFd = fopen($logFile, "at");
if(@$ret === false)
  die("cannot initialize logging\n");

// initialize the db
try
{
  $db = new PDO($dsn, $dbUser, $dbPassword);
  $db->exec('PRAGMA foreign_keys = ON');
  $db->exec('SET SQL_MODE = ANSI_QUOTES');
}
catch(PDOException $e)
{
  die("cannot initialize database\n");
}

// check schema version
$sql = "SELECT value FROM config WHERE name = 'version'";
if(!($q = $db->query($sql)))
  die("cannot initialize database\n");
$version = $q->fetchColumn();
if(version_compare($version, $schemaVersion, "!="))
  die("database requires schema upgrade\n");
unset($q);

// default hasher
$passHasher = new PasswordHash(8, FALSE);

// set the initial default locale/timezone
$locale = $defLocale;
switchLocale($locale);
date_default_timezone_set($defTimezone);
?>
