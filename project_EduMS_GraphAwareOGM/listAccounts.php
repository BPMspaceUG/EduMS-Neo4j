<?php
require_once 'bootstrap.php';

$accountsRepository = $entityManager->getRepository(\EduMS\account::class);
$accounts = $accountsRepository->findAll();

foreach ($accounts as $account) {
    echo sprintf("GUID: %s\n", $account->getGUID());
    echo sprintf("Lastname: %s\n", $account->getLastName());
    echo sprintf("Firstname: %s\n", $account->getFirstName());
} 