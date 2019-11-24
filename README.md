# abuseIPDBv2_interfcae

This an up-to-date API working with the v2 API of [AbuseIPDB](https://www.abuseipdb.com/).

This API contains absolutely no external library and works out-of-the-box. The only requirement is to use
php_curl (do not worry : most web hosting - even mutualized ones - have it).

The code is made with PHP7 (and might be compatible PHP5).

## How to use ?

The file example.php contains multiple examples but here are some of them :

```php
require_once 'path/to/AbuseIPDBInterface.class.php';
$informationsOnThisIP = new AbuseIPDBInterface();
var_dump($informationsOnThisIP->checkIP('118.25.6.39', 90));
```
