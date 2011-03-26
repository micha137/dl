<?php
/*
 * Basic settings
 */

// masterPath: externally visible URL
$masterPath = "http://dl.example.com/";

// fromAddr: "From:" address for outgoing e-mails
$fromAddr = "ticket service <nobody@example.com>";

// spoolDir: spool directory for uploaded files, ticket and user databases
$spoolDir = "/var/spool/dl/";

// defLocale: default locale (the charset is always UTF-8)
$defLocale = "en_EN";


/*
 * Ticket/grant defaults
 */

// Ticket defaults
$defaultTicketTotalDays = 7;
$defaultTicketLastDl = 24;
$defaultTicketMaxDl = 0;

// Grant defaults
$defaultGrantTotalDays = 7;


/*
 * Advanced settings (defaults commented)
 */

// cfgVersion: configuration file version
$cfgVersion = "0.8";

// logFile: set this if you want new tickets, downloads and purges logged to a
//          file. If the setting contains no slashes, it will be used as a tag
//          and the message will go to syslog. By default, do not log.
//$logFile = "/var/log/dl/ticket.log"; // log to file
//$logFile = "dl_ticket"; // log via syslog

// phpExt: external PHP extension
//         you can use "" to hide PHP exposure if you enable apache's
//         MultiViews option or use an URL rewriting mechanism
//$phpExt = ".php";

// maxSize: maximum upload filesize (defaulting to PHP's setting)
//          note that changing maxSize does *not* enforce upload_max_filesize
//$maxSize = ini_get('upload_max_filesize');

// authRealm: HTTP authentication realm
//            When using HTTP authentication, authRealm should match the HTTP
//            realm name in order for "logout" to have any effect.
//$authRealm = "Restricted Area";

// dsn: set the DSN of your database (read the installation manual)
//$dsn = "sqlite:$dataDir/data.sdb";

// sessionName: PHP session name (to ensure session uniqueness)
//		The default name is generated as:
//$sessionName = "DL" . md5($masterPath);

// gcInternal: Sets the ticket expiration method. If "true", tickets are expired
//             automatically by DL itself, at some page request (controlled by
//             gcProbability). If "false", ticket expiration should be performed
//             manually by calling the extenal "scripts/expire.php" utility.
//$gcInternal = true;

// gcProbability: Probability that, when using the internal expiration
//                method, a page request triggers the automatic expiration
//		  of old tickets. A number ranging from 0 to 1, where 1 means
//                that any request will purge old tickets. Ignored when using
//                the external expiration method.
//$gcProbability = 1.;

// gcLimit: Maximum number of tickets to remove at every expiration.
//          If 0 is used, all expired tickets are removed at once.
//$gcLimit = 0;
?>
