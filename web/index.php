<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>AZ Environment variables 1.04</title>
</head>
<body>
<pre>
<?php
foreach ($_SERVER as $header => $value )
{ if 	(strpos($header , 'REMOTE')!== false || strpos($header , 'HTTP')!== false ||
	strpos($header , 'REQUEST')!== false) {echo $header.' = '.$value."\n"; } }
?>
</pre>
</body>
</html>
