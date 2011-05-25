<?php

if (!defined('INCLUDE_CHECK')) 
    die('You are not allowed to execute this file directly');

/* Database config */

$uniqueRef = md5(time());
define('USERNAME', '');  // your username
define('PASSWORD', '');  //  // your password
define('NETCASH_PIN', '');
define('TERMINAL_NUMBER', '');
define('UNIQUE_REF', $uniqueRef);
define('GOODS', 'Donation');
define('BUDGET', 'Y');  // or 'N'

/* End config */
?>