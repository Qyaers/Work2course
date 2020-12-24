<?php
$ansver = $_POST['ansver'];
$true_or_false = $_POST['true_or_false'];
$text_task=$_POST['text_task'];
include "config.php";
mysqli_query($link,"SET NAMES 'utf8");
mysqli_query($link,"SET CHARACTER SET 'utf8'");
$sqltt = "SELECT id_task FROM task where text_task='$text_task'";
echo $sqltt;
if ($select1result = mysqli_query($link, $sqltt)) {

        /* fetch associative array */
        while ($row = mysqli_fetch_assoc($select1result)) {
            $selectresult = $row["id_task"];
        }

        /* free result set */
        mysqli_free_result($select1result);
    }
	else{
		print("error in getting task type");
	}
$sql ="INSERT INTO variable_ansvers (ansver,true_or_false,id_task_va) VALUES ('$ansver','$true_or_false','$selectresult')";
echo $sql;
if(mysqli_query($link,$sql)){
header('Location: admn_3.php'); exit();
}
else
{
	print "error";
}
?>