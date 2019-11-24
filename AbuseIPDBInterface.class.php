<?php
/**
 * INTERFACE FOR NEW VERSION OF ABUSEIPDB API.
 * Project : abuseIPDBv2_interfcae
 * @author  Pierre-Alexandre RACINE <patcha.dev at{@} gmail dot[.] com>
 * @copyright Pierre-Alexandre RACINE <patcha.dev at{@} gmail dot[.] com>
 * @date 23/11/19 22:32
 *
 * @link https://github.com/racine-p-a/abuseIPDBv2_interfcae
 *
 * todo make a license
 */

error_reporting(E_ALL);
ini_set("display_errors", 1);

class AbuseIPDBInterface
{
    /**
     * Pick you user key here : https://www.abuseipdb.com/account/api and generate one if you do not already own one.
     * I strongly recommend to create and use one different for each application/website you use.
     *
     * @var string Your AbuseIPDB user key
     */
    private $apiKey = 'PUT_YOUT_API_KEY_HERE';

    /**
     * AbuseIPDBInterface constructor.
     */
    public function __construct()
    {

    }

    public function checkIP($IPToCheck='') {
        $data = array();



        return $data;
    }

    public function reportIP($IPToCheck) {

    }

    public function getBlacklist() {

    }

    public function checkBlock() {

    }

    public function bulkReport() {

    }


}