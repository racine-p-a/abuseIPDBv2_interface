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
    private $apiKey = '128b87698b58fb8be1861c9959a6896b2cbfd97494a5baa58f5a7a0d4e46afbff8c824cd48cb3c99';

    /**
     * AbuseIPDBInterface constructor.
     */
    public function __construct()
    {

    }

    public function checkIP($IPToCheck='', $maxAge=0, $verbose=0) {
        $IPdata = array();

        // Works using GET : https://docs.abuseipdb.com/?php#check-endpoint
        if (filter_var($IPToCheck, FILTER_VALIDATE_IP) && ($this->apiKey != '')) {

            // URI construction
            $uri = 'https://api.abuseipdb.com/api/v2/check?ipAddress=' . urlencode($IPToCheck);
            if(intval($maxAge) > 0) {
                $uri .= '&maxAgeInDays=' . intval($maxAge);
            }
            if(boolval($verbose) == 1) {
                $uri .= '&verbose=' . boolval($verbose);
            }

            // CURL request
            $headers =  array('Key: ' . $this->apiKey, 'Accept: application/json');

            $curlRequest = curl_init($uri);
            curl_setopt($curlRequest, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curlRequest, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curlRequest, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curlRequest, CURLOPT_HTTPHEADER, $headers);

            if(curl_error($curlRequest)) {
                return $IPdata;
            }
            $IPdata=curl_exec($curlRequest);
            curl_close($curlRequest);
        }
        return $IPdata;
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