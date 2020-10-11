<?php
$command = $_GET["command"];
$data_string = @file_get_contents($command.".json");
if($data_string === FALSE) {
	http_response_code(404);
	header('Content-Type: application/json');
	echo "{\"error\": \{\"code\": 404,\"message\":\"COMMAND NOT FOUND\"\}}";
	}


$curl_neo4j = curl_init('http://neo4j:54657890at@EduMSNeo4j:7474/db/data/transaction/commit');                                                                      
curl_setopt($curl_neo4j, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($curl_neo4j, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($curl_neo4j, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($curl_neo4j, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);       
$result = curl_exec($curl_neo4j);
http_response_code(200);
header('Content-Type: application/json');
echo $result;
