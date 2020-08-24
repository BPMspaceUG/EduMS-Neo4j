<?php

use EduMS\Account;

require_once 'bootstrap.php';
echo $argc;
if ($argc != 5){
	echo "Usage: createAccount FirstName LastName Language[en|de] Password \n\r";
	exit;
}
$newAccountFirstName = $argv[1];
$newAccountLastName = $argv[2];
$newAccountLanguage = $argv[3];
$newAccountPassword = $argv[4];

//var_dump($argv);

$Account = new Account();
//$uuid = Uuid::uuid4();
$uuid = base64_encode(uniqid(uniqid(),TRUE));
$Account->setGUID($uuid);
$Account->setFirstName($newAccountFirstName);
$Account->setLastName($newAccountLastName);
$Account->setLanguage($newAccountLanguage);
//$uuid = Uuid::uuid4();
$uuid = base64_encode(uniqid(uniqid(),TRUE));
$Account->setPasswdSalt($uuid);
$Account->setPasswdHash($newAccountPassword,$uuid);
$Account->setHistory("abc");
$Account->setHistory("cdf");


var_dump ($Account);

$entityManager->persist($Account);
$entityManager->flush();

echo "account-id: ".$Account->getID();
echo "\n\r";
echo "account-gui: ".$Account->getGUID();
echo "\n\r";
echo "History:".$Account->getHistory();
echo "\n\r";
