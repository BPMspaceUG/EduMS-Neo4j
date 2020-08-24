<?php

use EduMS\account;
use EduMS\mailaddress;

require_once 'bootstrap.php';
echo $argc;
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

//var_dump ($Account);

$entityManager->persist($Account);
$entityManager->flush();

echo "account-id: ".$Account->getID();
echo "\n\r";
echo "account-gui: ".$Account->getGUID();
echo "\n\r";
echo "History:".$Account->getHistory();
echo "\n\r";
