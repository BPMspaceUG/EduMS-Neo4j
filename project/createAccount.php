<?php

use EduMS\Account;

require_once 'bootstrap.php';
echo $argc;
if ($argc != 4){
	echo "Usage: createAccount FirstName LastName Language[en|de]\n\r";
	exit;
}
$newAccountFirstName = $argv[1];
$newAccountLastName = $argv[2];
$newAccountLanguage = $argv[3];

//var_dump($argv);

$Account = new Account();
$Account->setFirstName($newAccountFirstName);
$Account->setLastName($newAccountLastName);
$Account->setLanguage($newAccountLanguage);
$Account->setGUID(uniqid());

var_dump ($Account);

$entityManager->persist($Account);
$entityManager->flush();

echo sprintf('Created Account with ID "%d"', $Account->getId());