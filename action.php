<?php

if ($_SERVER['HTTP_HOST'] != 'localhost') 
    die('You are not allowed to execute this file directly');

define('INCLUDE_CHECK',true);
require('config.php');

if (!checkEmail($_POST['email'])) 
{
    echo '<script type="text/javascript">
	        alert("Email Incorrect");
			history.go(-1);
		</script>';
	exit;
}

function checkEmail ($str)
{
	return preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $str);
}

function formatMoney ($r, $c) 
{
    $formated = "";
	return $formated .= $r . '.' . $c;
}

$email = trim($_POST['email']);
$amount = formatMoney($_POST['rands'], $_POST['cents']);

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Raging Flame: Donate Button</title>
  </head>
  <body>
    <form method="POST" action="https://gateway.netcash.co.za/vvonline/ccnetcash.asp ">
        <input type="hidden" name="m_1" value="<?php echo USERNAME; ?>"> <!-- This is your Netcash assigned electronic Username -->
        <input type="hidden" name="m_2" value="<?php echo PASSWORD; ?>">  <!-- This is your Netcash assigned electronic Password -->
        <input type="hidden" name="m_3" value="<?php echo NETCASH_PIN; ?>">  <!-- This is your Netcash assigned electronic PIN -->
        <input type="hidden" name="p1" value="<?php echo TERMINAL_NUMBER; ?>">  <!-- This is for your Terminal Number -->
        <input type="hidden" name="p2" value="<?php echo UNIQUE_REF; ?>"> <!-- This is a Unique Reference that you will assign to each transaction. -->
        <input type="hidden" name="p3" value="<?php echo GOODS; ?>"> <!-- The description of the goods sent for payment -->
        <input type="hidden" name="p4" value="<?php echo $amount; ?>">  <!-- Transactional Amount that is to be settled to the Card -->
        <input type="hidden" name="Budget" value="<?php echo BUDGET; ?>"> <!-- Y / N -->
        <input type="hidden" name="m_4" value="<?php echo $email; ?>"> <!-- Return Email -->
        <!-- <input type="hidden" name="m_9" value="<?php echo $email; ?>">  An email will be sent to the card holder by Netcash -->
	</form>
	
  </body>
</html>