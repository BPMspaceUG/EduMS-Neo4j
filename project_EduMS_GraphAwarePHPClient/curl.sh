#!/bin/bash
display_usage() { 
	echo -e "\nUsage:\n curl_neio4j [example.json] \n" 
	}
	# if less than two arguments supplied, display usage 
	if [  $# -le 0 ] 
	then 
		display_usage
		exit 1
	fi 

	QUERY="$1"

curl -i -XPOST \
    --data "@$QUERY" \
    -H "Accept: application/json" \
    -H "Content-Type: application/json" \
    http://neo4j:54657890at@EduMSNeo4j:7474/db/data/transaction/commit
