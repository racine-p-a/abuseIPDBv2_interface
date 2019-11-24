# abuseIPDBv2_interfcae

This an up-to-date API working with the v2 API of [AbuseIPDB](https://www.abuseipdb.com/).

This API contains absolutely no external library and works out-of-the-box. The only requirement is to use
php_curl (do not worry : most web hosting - even mutualized ones - have it).

The code is made with PHP7 (and might be compatible PHP5).

## How to use ?

First of all, [create (for free) your account on abuseIPDB](https://www.abuseipdb.com/register?plan=free) and
then [generate for yourself an API key](https://www.abuseipdb.com/account/api) and keep it secret ! Finally paste
your API key in the file « AbuseIPDBInterface.class.php » before importing it in your code.

The file example.php contains multiple examples but here are some of them :

### Check an IP adress

More informations [here](https://docs.abuseipdb.com/?php#check-endpoint).

```php
require_once 'path/to/AbuseIPDBInterface.class.php';
$informationsOnThisIP = new AbuseIPDBInterface();
// Parameters are : « IP to check », « max age in days » (integer optional), « verbose mode ? » (boolean optional)
var_dump($informationsOnThisIP->checkIP('118.25.6.39', 90, 1));
```

### Get the last blacklist

More informations [here](https://docs.abuseipdb.com/?php#blacklist-endpoint).

```php
require_once 'path/to/AbuseIPDBInterface.class.php';
$informationsOnThisIP = new AbuseIPDBInterface();
// Paramater is : the minimum confidence that abuseIPDB has in its informations (100 = sure). 
var_dump($informationsOnThisIP->getBlacklist($confidenceMinimum));
```