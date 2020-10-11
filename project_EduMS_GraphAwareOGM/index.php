<?php

use EduMS\Account;
use EduMS\MailAdress;
use PhpSchool\CliMenu\CliMenu;
use PhpSchool\CliMenu\Builder\CliMenuBuilder;

require_once 'bootstrap.php';

$DeleteAll = function (CliMenu $menu) {
    $result = $menu->askText()
        ->setPromptText('Really? Y/n')
        ->setPlaceholderText('n')
        ->setValidationFailedText('Please make your decision!')
        ->ask();
	$answer = $result->fetch();
    IF ($answer == "Y") {
		echo 'ToBeProgrammed -> delete everything!';
	} else {
		echo 'NOTHING deleted!';
	}
};

$LoadDefaultData = function (CliMenu $menu) {
	echo 'ToBeProgrammed -> load Default Data';
};

$LoadDemoData = function (CliMenu $menu) {
	echo 'ToBeProgrammed -> load Demo Data';
};

$AccountMail = function (CliMenu $menu) {
	global $entityManager;
	echo 'ToBeProgrammed -> create Account with Mail';
};

$ListAllAccounts = function (CliMenu $menu) {
	global $entityManager;
	$accountsRepository = $entityManager->getRepository(\EduMS\account::class);
	$accounts = $accountsRepository->findAll();
	foreach ($accounts as $account) {
		echo "GUID: " . $account->getGUID() . " Lastname: ". $account->getLastName() . " Firstname: " . $account->getFirstName() . "\n\r";
	}
	//*/
};

$ListOneAccount = function (CliMenu $menu) {
	global $entityManager;
	$result = $menu->askText()
        ->setPromptText('Account GUID')
        ->setPlaceholderText('WY1NzgwMDExYTA4OTVmNTc4MDAxMWEwOGE4LjIwMjk0NTU0')
        ->setValidationFailedText('Please eneter Account GUID')
        ->ask();
	$AccountGUID = $answer = $result->fetch();
	echo 'ToBeProgrammed -> list ONE Account';
};


$menu = (new CliMenuBuilder)
    ->setTitle('EduMS CLI Menu')
	->addStaticItem('General')
    ->addItem('Delete ALL Data', $DeleteAll)
    ->addItem('Load Default Data', $LoadDefaultData)
    ->addItem('Load Demo Data', $LoadDemoData)
	->addLineBreak('-', 1)
	/*->addSubMenu('Super Sub Menu', function (CliMenuBuilder $b) {
        $b->setTitle('Behold the awesomeness')
        ->addItem('Create Account & Mail', $AccountMail);
    }*/
	->addItem('Create Account & Mail', $AccountMail)
	->addItem('List all Accounts', $ListAllAccounts)
	->addItem('List ONE Account', $ListOneAccount)
	->addLineBreak('-', 1)
    ->setBorder(1, 2, 'white')
    ->setPadding(2, 4)
    ->setMarginAuto()
    ->build();

$menu->open();
$menu->close();