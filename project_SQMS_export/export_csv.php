<?php 
require_once('./config.php');

/* export Question Container from greman Questions */
$offset_questions 			= 8768698698686893;
$offset_questions_container = 4987645896749347;
$offset_language 			= 5698786594765870;
$offset_topic 				= 6457465670464561;
//$offset_XX = ;


	$file = 'question_container.csv';
	$mysqli = new mysqli($host, $user, $password, $dbname_SQMS, $port)
        or die ('Could not connect to the database server' . mysqli_connect_error());
        $statement = $mysqli->prepare("SELECT  sqms_question.sqms_question_id + $offset_questions_container AS QC_sqms_id,  UUID() AS OC_GUID,  Concat(Now(), \", created ICO SQMS1 from question table - offset ID $offset_questions_container\") AS OC_History FROM  sqms_question WHERE  sqms_question.sqms_language_id = 1");
        if(!$statement){
       echo "Prepare failed: (". $mysqli->errno.") ".$mysqli->error."<br>";
    }
    $statement->execute(); // Execute the statement.
    $result = $statement->get_result();

	$out =  fopen($file, 'w');
    while ($row = mysqli_fetch_assoc($result))
        {
        //$out = fopen('php://output', 'w');
		fputcsv($out, $row, "|");
        }
	fclose($out);
	$current = file_get_contents($file);
	$current = "QC_SQMS_ID|QC_GUID|QC_History|\n".$current;
	file_put_contents($file, $current);
	//echo $current;
$mysqli->close();
/*----------------------------*/
	$file = 'question_de.csv';
	$mysqli = new mysqli($host, $user, $password, $dbname_SQMS, $port)
        or die ('Could not connect to the database server' . mysqli_connect_error());
        $statement = $mysqli->prepare("SELECT  sqms_question.sqms_question_id + $offset_questions AS QU_sqms_id,  UUID() AS QU_GUID, trim(REPLACE(REPLACE(REPLACE(REPLACE(sqms_question.question,'\n',''),'\r',''),'\"',''),' </p>','</p>')) AS QU_Content,  Concat(Now(), \", created ICO SQMS1 from question table - offset ID $offset_questions\") AS QU_History FROM  sqms_question WHERE  sqms_question.sqms_language_id = 1");
        if(!$statement){
       echo "Prepare failed: (". $mysqli->errno.") ".$mysqli->error."<br>";
    }
    $statement->execute(); // Execute the statement.
    $result = $statement->get_result();

	$out =  fopen($file, 'w');
    while ($row = mysqli_fetch_assoc($result))
        {
        //$out = fopen('php://output', 'w');
		fputcsv($out, $row, "|");
        }
	fclose($out);
	$current = file_get_contents($file);
	$current = "QU_SQMS_ID|QU_GUID|QU_CONTENT|QU_History|\n".$current;
	$current = html_entity_decode($current);
	file_put_contents($file, "\xEF\xBB\xBF". $current);
	//echo $current;
$mysqli->close();
/*----------------------------*/
	$file = 'question_en.csv';
	$mysqli = new mysqli($host, $user, $password, $dbname_SQMS, $port)
        or die ('Could not connect to the database server' . mysqli_connect_error());
        $statement = $mysqli->prepare("SELECT  sqms_question.sqms_question_id + $offset_questions AS QU_sqms_id,  UUID() AS QU_GUID, trim(REPLACE(REPLACE(REPLACE(REPLACE(sqms_question.question,'\n',''),'\r',''),'\"',''),' </p>','</p>')) AS QU_Content,  Concat(Now(), \", created ICO SQMS1 from question table - offset ID $offset_questions\") AS QU_History FROM  sqms_question WHERE  sqms_question.sqms_language_id = 2 AND id_external != 0 ");	
        if(!$statement){
       echo "Prepare failed: (". $mysqli->errno.") ".$mysqli->error."<br>";
    }
    $statement->execute(); // Execute the statement.
    $result = $statement->get_result();

	$out =  fopen($file, 'w');
    while ($row = mysqli_fetch_assoc($result))
        {
        //$out = fopen('php://output', 'w');
		fputcsv($out, $row, "|");
        }
	fclose($out);
	$current = file_get_contents($file);
	$current = "QU_SQMS_ID|QU_GUID|QU_CONTENT|QU_History|\n".$current;
	$current = html_entity_decode($current);
	file_put_contents($file, "\xEF\xBB\xBF". $current);
	//echo $current;
$mysqli->close();
/*----------------------------*/
	$file = 'language.csv';
	$mysqli = new mysqli($host, $user, $password, $dbname_SQMS, $port)
        or die ('Could not connect to the database server' . mysqli_connect_error());
        $statement = $mysqli->prepare("SELECT sqms_language.sqms_language_id + $offset_language AS LA_sqms_id,  UUID() AS LA_GUID,  sqms_language.`language` AS LA_language,  sqms_language.language_short AS LA_language_short,  Concat(Now(), \", created ICO SQMS1 from language table offset ID $offset_language\") AS LA_History FROM  sqms_language");
        if(!$statement){
       echo "Prepare failed: (". $mysqli->errno.") ".$mysqli->error."<br>";
    }
    $statement->execute(); // Execute the statement.
    $result = $statement->get_result();

	$out =  fopen($file, 'w');
    while ($row = mysqli_fetch_assoc($result))
        {
        //$out = fopen('php://output', 'w');
		fputcsv($out, $row, "|");
        }
	fclose($out);
	$current = file_get_contents($file);
	$current = "LA_SQMS_ID|LA_GUID|LA_Language|LA_language_short|LA_History|\n".$current;
	file_put_contents($file, $current);
	//echo $current;
$mysqli->close();
/*----------------------------*/
	$file = 'topic.csv';
	$mysqli = new mysqli($host, $user, $password, $dbname_SQMS, $port)
        or die ('Could not connect to the database server' . mysqli_connect_error());
        $statement = $mysqli->prepare("SELECT sqms_topic.sqms_topic_id + $offset_topic AS TO_sqms_id,  UUID() AS TO_GUID,  sqms_topic.name  AS TO_name, Concat(Now(), \", created ICO SQMS1 from topic table offset ID $offset_topic\") AS TO_History FROM  sqms_topic");
        if(!$statement){
       echo "Prepare failed: (". $mysqli->errno.") ".$mysqli->error."<br>";
    }
    $statement->execute(); // Execute the statement.
    $result = $statement->get_result();

	$out =  fopen($file, 'w');
    while ($row = mysqli_fetch_assoc($result))
        {
        //$out = fopen('php://output', 'w');
		fputcsv($out, $row, "|");
        }
	fclose($out);
	$current = file_get_contents($file);
	$current = "TO_SQMS_ID|TO_GUID|TO_Name|TO_History|\n".$current;
	file_put_contents($file, $current);
	//echo $current;
$mysqli->close();
/*----------------------------*/
	$file = 'question_container-topic.csv';
	$mysqli = new mysqli($host, $user, $password, $dbname_SQMS, $port)
        or die ('Could not connect to the database server' . mysqli_connect_error());
        
		$statement = $mysqli->prepare("SELECT sqms_question.sqms_question_id + $offset_questions_container AS QC_sqms_id, sqms_topic.sqms_topic_id + $offset_topic AS TO_sqms_id, UUID() AS GUID, Concat(Now(),\", created ICO SQMS1 from topic table offset ID $offset_topic and table question offset ID $offset_questions_container for QuestionContainer\") AS QC_TO_History FROM  sqms_question INNER JOIN sqms_topic ON sqms_question.sqms_topic_id =  sqms_topic.sqms_topic_id WHERE  sqms_question.sqms_language_id = 1");
		
        if(!$statement){
       echo "Prepare failed: (". $mysqli->errno.") ".$mysqli->error."<br>";
    }
    $statement->execute(); // Execute the statement.
    $result = $statement->get_result();

	$out =  fopen($file, 'w');
    while ($row = mysqli_fetch_assoc($result))
        {
        //$out = fopen('php://output', 'w');
		fputcsv($out, $row, "|");
        }
	fclose($out);
	$current = file_get_contents($file);
	$current = "QC_SQMS_ID|TO_SQMS_ID|GUID|QC_TO_History|\n".$current;
	file_put_contents($file, $current);
	//echo $current;
$mysqli->close();
/*----------------------------*/
	$file = 'question_de_en.csv';
	$mysqli = new mysqli($host, $user, $password, $dbname_SQMS, $port)
        or die ('Could not connect to the database server' . mysqli_connect_error());
        
		$statement = $mysqli->prepare("SELECT PRIM_ID, trim(REPLACE(REPLACE(REPLACE(REPLACE(PRIM_CONTENT,'\n',''),'\r',''),'\"',''),' </p>','</p>')),PRIM_LANG, PRIM_ID_EX, SECOND_ID, trim(REPLACE(REPLACE(REPLACE(REPLACE(SECOND_CONTENT, '\n',''),'\r',''),'\"',''),' </p>','</p>')), SECOND_LANG, SECOND_ID_EX FROM bpmspace_sqms_v6.v_questions_de_en");
		
        if(!$statement){
       echo "Prepare failed: (". $mysqli->errno.") ".$mysqli->error."<br>";
    }
    $statement->execute(); // Execute the statement.
    $result = $statement->get_result();

	$out =  fopen($file, 'w');
    while ($row = mysqli_fetch_assoc($result))
        {
        //$out = fopen('php://output', 'w');
		fputcsv($out, $row, "|");
        }
	fclose($out);
	$current = file_get_contents($file);
	$current = html_entity_decode($current);
	$current = str_replace("--","|",str_replace("</p>--","|",str_replace("--<p>","|",$current)));
	file_put_contents($file, "\xEF\xBB\xBF". $current);
$mysqli->close();
/*----------------------------*/
	$file = 'question_en_de.csv';
	$mysqli = new mysqli($host, $user, $password, $dbname_SQMS, $port)
        or die ('Could not connect to the database server' . mysqli_connect_error());
        
		$statement = $mysqli->prepare("SELECT PRIM_ID, trim(REPLACE(REPLACE(REPLACE(REPLACE(PRIM_CONTENT,'\n',''),'\r',''),'\"',''),' </p>','</p>')),PRIM_LANG, PRIM_ID_EX, SECOND_ID, trim(REPLACE(REPLACE(REPLACE(REPLACE(SECOND_CONTENT, '\n',''),'\r',''),'\"',''),' </p>','</p>')), SECOND_LANG, SECOND_ID_EX FROM bpmspace_sqms_v6.v_questions_en_de");
		
        if(!$statement){
       echo "Prepare failed: (". $mysqli->errno.") ".$mysqli->error."<br>";
    }
    $statement->execute(); // Execute the statement.
    $result = $statement->get_result();

	$out =  fopen($file, 'w');
    while ($row = mysqli_fetch_assoc($result))
        {
        //$out = fopen('php://output', 'w');
		fputcsv($out, $row, "|");
        }
	fclose($out);
	$current = file_get_contents($file);
	$current = html_entity_decode($current);
	file_put_contents($file, "\xEF\xBB\xBF". $current);
$mysqli->close();