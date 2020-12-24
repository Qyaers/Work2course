<html>
<head>
<title>
Result_check
</title>
</head>
<?php
//Передаваемые ответы из формы теста(test1.php)
$ans_t1=$_POST['ansver1_test1'];
$check_them1=$_POST['theme'];
include "config.php";
//Счётчик для подсчёта посящения.Не доделанный.
$counter=0;
$sqltt0 = "SELECT id_unique_identificator FROM test where theme=''";
if ($select1result = mysqli_query($link, $sqltt0)) {

        /* fetch associative array */
        while ($row = mysqli_fetch_assoc($select1result)) {
            $selectresult = $row["id_unique_identificator"];
        }

        /* free result set */
        mysqli_free_result($select1result);
    }
	else{
		print("error in getting test id");
	}	
$sqltt1 = "SELECT id_task FROM task where theme.test='Gavrik'";
echo $sqltt1;
if ($select1result1 = mysqli_query($link, $sqltt1)) {

        /* fetch associative array */
        while ($row = mysqli_fetch_assoc($select1result1)) {
            $selectresult = $row["id_task"];
        }

        /* free result set */
        mysqli_free_result($select1result1);
    }
	else{
		print("error in getting test id");
	}
	$insert_ans_u=mysqli_query($link,"INSERT INTO results(id_test_r,id_task_r,id_user_r,id_ansver_r,date_ansver_r,number_try) VALUES('$select1result','$select1result1','$user','$ans_t1', Now(),'$counter'");
	if(!$insert_ans_u)
	{
		die("Query to show fields from table failed");
	}
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