<?php

use EduMS\Account;
use EduMS\MailAdress;

require_once 'bootstrap.php';
//echo $argc;
if ($argc != 6){
	echo "Usage: createAccount FirstName LastName Language[en|de] Password Mail@\n\r";
	exit;
}
$newAccountFirstName = $argv[1];
$newAccountLastName = $argv[2];
$newAccountLanguage = $argv[3];
$newAccountPassword = $argv[4];
$newMail = $argv[5];

//var_dump($argv);

$Account = new Account($newAccountFirstName,$newAccountLastName,$newAccountLanguage,$newAccountPassword,$newMail);
$entityManager->persist($Account);
$entityManager->flush();

$GUID = $Account->getGUID();
$GUID_CMD = "php listAccount.php $GUID\n\r";
echo "$GUID_CMD";
