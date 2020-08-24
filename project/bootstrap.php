<?php

use GraphAware\Neo4j\OGM\EntityManager;

require_once 'vendor/autoload.php';
require_once 'src/account.php'; 

$entityManager = EntityManager::create('http://neo4j:54657890at@EduMSNeo4j:7474');
//var_dump($entityManager);
echo "<html>ok connection<br>";
