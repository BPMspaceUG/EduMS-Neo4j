<?php
require_once ('./config.php');
echo "<!doctype html><html lang=\"en\">  <head>    <meta charset=\"utf-8\">    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">    <meta name=\"description\" content=\"\">    <title>SQMS Q&E</title>    <!-- Bootstrap core CSS -->	<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css\" integrity=\"sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2\" crossorigin=\"anonymous\"> <style>roundedrob {border-width: 15px; !important;}</style> </head> <body class=\"\">    <div class=\"container\">";
//$file = 'question_container.csv';
$mysqli = new mysqli($host, $user, $password, $dbname_SQMS, $port) or die('Could not connect to the database server' . mysqli_connect_error());
$statement = $mysqli->prepare("SELECT sqms_question_id, question , id_external FROM v_used_questions where sqms_language_id = 1 ");
if (!$statement)
{
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error . "<br>";
}
$statement->execute(); // Execute the statement.
$result_questions_german = $statement->get_result();
$mysqli->close();
while ($row_q_de = mysqli_fetch_assoc($result_questions_german))
{
    //print_r($row_q_de);
    echo "<div class=\"row\"><div class=\"col-sm m-3 p-2 border\"><div class=\"p-2\">".ltrim(rtrim($row_q_de['question'],"</p>"),"<p>")."&nbsp;(".$row_q_de['sqms_question_id'].")</div>";
    //echo $row_q_de['id_external'];

    // get answers german
    $DE_QUESTION_ID = $row_q_de['sqms_question_id'];
    $mysqli = new mysqli($host, $user, $password, $dbname_SQMS, $port) or die('Could not connect to the database server' . mysqli_connect_error());
    $statement = $mysqli->prepare("SELECT sqms_answer_id, answer, correct FROM sqms_answer where sqms_question_id  = $DE_QUESTION_ID;");
    if (!$statement)
    {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error . "<br>";
    }
    $statement->execute(); // Execute the statement.
    $result_answer_german = $statement->get_result();
    $mysqli->close();
	echo "<ol>";
    while ($row_a_de_answer = mysqli_fetch_assoc($result_answer_german))
    {
        echo "<li class=\"p-2 border ".($row_a_de_answer['correct'] ? 'border-success' : ' border-danger')." rounded roundedrob\""." >".ltrim(rtrim($row_a_de_answer['answer'],"</p>"),"<p>")."(".$row_a_de_answer['sqms_answer_id'].") <button type=\"button\" class=\"btn ".($row_a_de_answer['correct'] ? '  btn-success"> TRUE ' : 'btn-danger"> FALSE ')."</button></li></br>";
    }
	echo "</ol></div><div class=\"col-sm m-3 p-2 border\">";
    // Get english Version of the quetsion and the answers
    $EN_QUESTION_ID = $row_q_de['id_external'];
	//echo $EN_QUESTION_ID;
    if ($EN_QUESTION_ID > 0)
    {
        $mysqli = new mysqli($host, $user, $password, $dbname_SQMS, $port) or die('Could not connect to the database server' . mysqli_connect_error());
        $statement = $mysqli->prepare("SELECT sqms_question_id, question, id_external FROM sqms_question where sqms_language_id = 2 and sqms_question_id = $EN_QUESTION_ID");
        if (!$statement)
        {
            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error . "<br>";
        }
        $statement->execute(); // Execute the statement.
        $result_questions_english = $statement->get_result();
        $mysqli->close();
		
        while ($row_q_en = mysqli_fetch_assoc($result_questions_english))
        {
            echo "<div class=\"p-2\">".ltrim(rtrim($row_q_en['question'],"</p>"),"<p>")."&nbsp;(".$row_q_en['sqms_question_id'].")</div>";
		
			$mysqli = new mysqli($host, $user, $password, $dbname_SQMS, $port) or die('Could not connect to the database server' . mysqli_connect_error());
			$statement = $mysqli->prepare("SELECT sqms_answer_id, answer, correct FROM sqms_answer where sqms_question_id  = $EN_QUESTION_ID;");
			if (!$statement)
			{
				echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error . "<br>";
			}
			$statement->execute(); // Execute the statement.
			$result_answer_english = $statement->get_result();
			$mysqli->close();
						
			echo "<ol>";
			while ($row_a_en_answer = mysqli_fetch_assoc($result_answer_english))
			{
			echo "<li class=\"p-2 border ".($row_a_en_answer['correct'] ? 'border-success' : ' border-danger')." rounded \""." >".ltrim(rtrim($row_a_en_answer['answer'],"</p>"),"<p>")." (".$row_a_en_answer['sqms_answer_id'].") <button type=\"button\" class=\"btn ".($row_a_en_answer['correct'] ? '  btn-success"> TRUE ' : 'btn-danger"> FALSE ')."</button></li></br>";
			}
			echo "</ol></div>";
		}
	}
	echo "</ol></div></div></br>";
}

