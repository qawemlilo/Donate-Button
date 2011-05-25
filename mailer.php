<?php

if (!isset($_POST["TransactionAccepted"])) 
    die('You are not allowed to execute this file directly');

$TransactionAccepted = $_POST["TransactionAccepted"];
$Reference = $_POST["Reference"];
$RETC = $_POST["RETC"];
$m_4 = $_POST["m_4"];
$Reason = $_POST["Reason"];
$Amount = $_POST["Amount "];

$email_body = "Transaction unique Number: $Reference \n";
$email_body .= "Netcash Transaction Unique Code: $RETC \n";
$email_body .= "Amount Donated: $Amount \n";
$email_body .= "Donator Email: $m_4 \n";

function sendMail($from,$to,$subject,$body) 
{
	$headers = '';
	$headers .= "From: $from\n";
	$headers .= "Reply-to: $from\n";
	$headers .= "Return-Path: $from\n";
	$headers .= "Message-ID: <" . md5(uniqid(time())) . "@" . $_SERVER['SERVER_NAME'] . ">\n";
	$headers .= "MIME-Version: 1.0\n";
	$headers .= "Date: " . date('r', time()) . "\n";

	mail($to,$subject,$body,$headers);
}

if (!$TransactionAccepted)
   $subject = "Failed transaction";   
else {
    $subject = "You have a new donation"; 
    $email_body	.= "Error report: " . $Reason;
}

sendMail("Our website", "email@domain.co.za", $subject, $body);	
header("Location: thankyou.html");
?>