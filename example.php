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

/*
 * Here are some examples of simple usecases for the abuseIPDB interface
 *
 * IMPORTANT !!!! YOU MUST HAVE PLACED YOUR ABUSEIPDB USER KEY IN THE « AbuseIPDBInterface.class.php »
 */

require_once dirname(__FILE__) . '/AbuseIPDBInterface.class.php';
// First let's check an eventual suspicious IP.
$IPWeWantToCheck = '54.36.246.232';
$informationsOnThisIP = new AbuseIPDBInterface();
$informationsOnThisIP = $informationsOnThisIP->checkIP($IPWeWantToCheck);