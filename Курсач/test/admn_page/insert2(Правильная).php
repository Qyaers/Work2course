<html>
<head>
<meta charset="UTF-8"/>
<title>
insert type_task
</title>
</head>
<?php

$text_task = $_POST['text_task'];
$about_ansver = $_POST['about_ansver'];
$type_task=$_POST['type_task'];
include "config.php";
mysqli_query($link,"SET NAMES 'utf8");
mysqli_query($link,"SET CHARACTER SET 'utf8'");
//Ввод по внешнему ключу с значениями передаваемыми из формы.
$sqltt = "SELECT id_tt FROM type_task where type_task='$type_task'";
echo $sqltt;
if ($select1result = mysqli_query($link, $sqltt)) {

        /* fetch associative array */
        while ($row = mysqli_fetch_assoc($select1result)) {
            $selectresult = $row["id_tt"];
        }

        /* free result set */
        mysqli_free_result($select1result);
    }
	else{
		print("error in getting task type");
	}
//Ввод зачений в таблицу (неизвестно рабочий вариант или нет.) 
$sql ="INSERT INTO task (text_task,about_ansver,id_type_task) VALUES ('$text_task','$about_ansver','$selectresult')";
echo $sql;
if(mysqli_query($link,$sql)){
header('Location: admn_2.php'); exit();
}
else
{
	print "error";
}
?>
</html>