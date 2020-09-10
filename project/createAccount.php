<?php

use EduMS\Account;
use EduMS\MailAdress;
use PhpSchool\CliMenu\CliMenu;
use PhpSchool\CliMenu\Builder\CliMenuBuilder;

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
global $GUID_CMD;
$GUID_CMD = "php listAccount.php $GUID\n\r";

$itemCallable = function (CliMenu $menu) {
	echo shell_exec("php listAccounts.php");
};

$menu = (new CliMenuBuilder)
    ->setTitle('Basic CLI Menu')
    ->addItem('First Item', $itemCallable)
    ->addItem('Second Item', $itemCallable)
    ->addItem('Third Item', $itemCallable)
    ->addLineBreak('-')
    ->setBorder(1, 2, 'yellow')
    ->setPadding(2, 4)
    ->setMarginAuto()
    ->build();


$menu->open();