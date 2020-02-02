# abuseIPDBv2_interfcae

This an up-to-date API working with the v2 API of [AbuseIPDB](https://www.abuseipdb.com/).

This API contains absolutely no external library, no modules, no composer requirements and works 
out-of-the-box. The only requirement is to use php_curl (do not worry : most web hosting - even mutualized
ones - have it).

The code is made with PHP7 (and might be compatible PHP5, feedbacks are welcome).

It works with IPv4 and IPv6 addresses

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

### Report an IP

More informations [here](https://docs.abuseipdb.com/?php#check-block-endpoint).

```php
require_once 'path/to/AbuseIPDBInterface.class.php';
$IPToBan = '181.169.169.239';
// An (optional but recommended) array of attack categories. See the list here : https://www.abuseipdb.com/categories
$categories = array(15, 21);
// Optionnal comment to insert to abuseIPDB.
// STRIP ANY PERSONALLY IDENTIFIABLE INFORMATION (PPI). ABUSEIPDB IS NOT RESPONSIBLE FOR PPI YOU REVEAL... NOR AM I...
$comment = 'web attack';
$blackList = new AbuseIPDBInterface();
var_dump($informationsOnThisIP->reportIP($IPToBan, $categories, $comment));
```

### Check an entire network (using CIDR notation)

More informations [here](https://docs.abuseipdb.com/?php#check-endpoint).

More about the [CIDR notation](https://en.wikipedia.org/wiki/Classless_Inter-Domain_Routing).

```php
require_once 'path/to/AbuseIPDBInterface.class.php';
$networkToCheck = '127.0.0.1/24'; // Use the CIDR notation (https://en.wikipedia.org/wiki/Classless_Inter-Domain_Routing).
$maxAgeInDays = 15;
$informationsOnThisNetwork = new AbuseIPDBInterface();
var_dump($informationsOnThisIP->checkBlock($networkToCheck, $maxAgeInDays));
```

## Questions

***Is the bulk-report function going to be added soon ?***

I tried but I give up. I can't figure out how to post correctly these reports to abuseIPDB. If someone is willing
to help, he'll be welcome.

## Frequent problems

***When doing a check-block, i get an error. Why ?***

You are looking for too much information with a free account.
[See](https://docs.abuseipdb.com/?php#check-block-limits) :

```text
Due to the depth & breath of the these searches, the range of the parameters is capped by plan tier.

For most use cases, /24 is enough to an entire network. Many autonomous systems will sometimes have blocks
of /20. Some of the largest autonomous systems will have blocks of /18 or /17.
```