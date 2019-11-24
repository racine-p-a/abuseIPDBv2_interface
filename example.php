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
$IPWeWantToCheck = '118.25.6.39';
$maxAgeInDays = 90;
$informationsOnThisIP = new AbuseIPDBInterface();
//var_dump($informationsOnThisIP->checkIP($IPWeWantToCheck, $maxAgeInDays, 1));

// Now, we would like to get the last fresh blacklist
$confidenceMinimum = 90;
$blackList = new AbuseIPDBInterface();
//var_dump($informationsOnThisIP->getBlacklist($confidenceMinimum));


