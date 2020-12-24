<html>
<head>
<meta charset="UTF-8"/>
</head>
<?php

$id_unique_identificator = $_POST['id_unique_identificator'];
$type_test = $_POST['type_task'];
$task = $_POST['task']; 
$theme = $_POST['theme'];
$discipline = $_POST['discepline'];

include "config.php";
mysqli_query($link,"SET NAMES 'utf8");
mysqli_query($link,"SET CHARACTER SET 'utf8'");
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$thema_select=("SELECT id_th FROM thema where thema_text='$theme'");
echo $thema_select;
if ($select0result = mysqli_query($link, $thema_select)) {

        /* fetch associative array */
        while ($row = mysqli_fetch_assoc($select0result)) {
            $selectresult_thema = $row["id_th"];
        }

        /* free result set */
        mysqli_free_result($select0result);
    }
	else{
		print("error in getting thema");
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql = "SELECT id_tt FROM type_task where type_task='$type_test'";
echo $sql;
if ($select1result = mysqli_query($link, $sql)) {

        /* fetch associative array */
        while ($row = mysqli_fetch_assoc($select1result)) {
            $selectresult_type_test = $row["id_tt"];
        }

        /* free result set */
        mysqli_free_result($select1result);
    }
	else{
		print("error in getting task type");
	}
	 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//Не доделанный ввод( не получаеться сделать чтобы вводился именно тот правильный ответ,который у пост метода variable_ansvers).
$sql2 = "SELECT id_task FROM task where text_task='$task'";
echo $sql2;
if ($select1result1 = mysqli_query($link, $sql2)) {

        /* fetch associative array */
        while ($row1 = mysqli_fetch_assoc($select1result1)) {
            $selectresult_task = $row1["id_task"];
        }

        /* free result set */
        mysqli_free_result($select1result1);
    }
	else{
		print("error in getting task ");
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$insert_test ="INSERT INTO test (id_type_test,id_task_t,id_theme) VALUES 
('$selectresult_type_test','$selectresult_task','$selectresult_thema')";
echo $insert_test;
if(mysqli_query($link,$insert_test)){
header('Location: admin_page.php'); exit();
}
else
{
	print "error";
}
?>
</html>