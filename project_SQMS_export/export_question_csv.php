<?php 
require_once('./config.php');
$mysqli = new mysqli($host, $user, $password, $dbname_SQMS, $port)
        or die ('Could not connect to the database server' . mysqli_connect_error());
        $statement = $mysqli->prepare("SELECT sqms_question_id AS ID,md5(sqms_question_id) AS GUID, CONCAT (now(),\" , created via export from SQMS1\") FROM sqms_question where sqms_language_id = 1");
        if(!$statement){
       echo "Prepare failed: (". $mysqli->errno.") ".$mysqli->error."<br>";
    }
    $statement->execute(); // Execute the statement.
    $result = $statement->get_result();
	$file = 'question.csv';
	$out =  fopen($file, 'w');
    while ($row = mysqli_fetch_assoc($result))
        {
        //$out = fopen('php://output', 'w');
		fputcsv($out, $row, "|");
        }
	fclose($out);
	$current = file_get_contents($file);
	$current = "ID|GUID|History\n".$current;
	file_put_contents($file, $current);
	echo $current;
$mysqli->close();
