<?php
/**
 * Project : abuseIPDBv2_interfcae
 * File : example.php
 * @author  Pierre-Alexandre RACINE <patcha.dev at{@} gmail dot[.] com>
 * @copyright Copyright (c) 2019, Pierre-Alexandre RACINE <patcha.dev at{@} gmail dot[.] com>
 * @license http://www.gnu.org/licenses/lgpl.html
 * @date 24/11/2019
 * @link https://github.com/racine-p-a/abuseIPDBv2_interfcae
 * * todo make a license
 */

error_reporting(E_ALL);
ini_set("display_errors", 1);

/*
 * Here are some examples of simple usecases for the abuseIPDB interface
 *
 * IMPORTANT !!!! YOU MUST HAVE PLACED YOUR ABUSEIPDB USER KEY IN THE « AbuseIPDBInterface.class.php »
 */

require_once dirname(__FILE__) . '/AbuseIPDBInterface.class.php';

// First let's check an eventual suspicious IP.
echo '<h1>Informations about IP :</h1>';
$IPWeWantToCheck = '118.25.6.39';
$maxAgeInDays = 90;
$informationsOnThisIP = new AbuseIPDBInterface();
var_dump($informationsOnThisIP->checkIP($IPWeWantToCheck, $maxAgeInDays, 1));

// Now, we would like to get the last fresh blacklist
echo '<h1>The freshest blacklist to import :</h1>';
$confidenceMinimum = 90;
$blackList = new AbuseIPDBInterface();
var_dump($informationsOnThisIP->getBlacklist($confidenceMinimum));

// A bad IP has been seen on your website. Report it.
echo '<h1>Reporting an IP :</h1>';
$IPToBan = '181.169.169.239';
// An array of attack categories. See the list here : https://www.abuseipdb.com/categories
$categories = array(15, 21);
$comment = 'web attack';
$blackList = new AbuseIPDBInterface();
var_dump($informationsOnThisIP->reportIP($IPToBan, $categories, $comment));

// What about chacking an entire network ?
echo '<h1>Check an entire network :</h1>';
$networkToCheck = '127.0.0.1/24'; // Use the CIDR notation (https://en.wikipedia.org/wiki/Classless_Inter-Domain_Routing).
$maxAgeInDays = 15;
$informationsOnThisIP = new AbuseIPDBInterface();
var_dump($informationsOnThisIP->checkBlock($networkToCheck, $maxAgeInDays));