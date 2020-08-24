<?php
require_once 'bootstrap.php';

if ($argc != 2){
	echo "Usage: listAccount GUID\n\r";
	exit;
}

$guid = $argv[1];

$accountsRepository = $entityManager->getRepository(\EduMS\account::class);
$account = $accountsRepository->findOneBy(['guid' => $argv[1]]);;

if ($account === null) {
    echo 'Account not found' . PHP_EOL;
    exit(1);
}


    echo sprintf("GUID: %s\n", $account->getGUID());
    echo sprintf("Lastname: %s\n", $account->getLastName());
    echo sprintf("Firstname: %s\n", $account->getFirstName());
