<?php
require '../vendor/autoload.php';

use GeoIp2\Database\Reader;
use GeoIp2\Exception;

$reader = new Reader('../GeoLite2-City.mmdb');

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>AZ Environment variables 1.04</title>
</head>
<body>
<pre>
<?php

foreach ($_SERVER as $header => $value) {
    if (strpos($header, 'REMOTE') !== false || strpos($header, 'HTTP') !== false ||
        strpos($header, 'REQUEST') !== false
    ) {
        echo $header . ' = ' . $value . "\n";
        if(preg_match('#^((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)(\.|$)){4}$#',$value))
        {
            try
            {
                $record = $reader->city($value);
                $country = $record->country->isoCode;
            }
            catch(Exception\AddressNotFoundException $e)
            {
                $country = "not found";
            }
            catch(\Exception $e)
            {
                $country = $e->getMessage();
            }
            echo $header . '_PROXYJUDGE_IPCOUNTRY = ' . $country . "\n";
        }
    }
}
?>
</pre>

<small>This product includes GeoLite2 data created by MaxMind, available from
<a href="http://www.maxmind.com">http://www.maxmind.com</a>.</small>

</body>
</html>
