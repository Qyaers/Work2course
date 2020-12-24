<?php
include "config.php";
mysqli_query($link,"SET NAMES 'utf8");
mysqli_query($link,"SET CHARACTER SET 'utf8'");
$theme= $_POST['theme'];
$discipline = $_POST['discepline'];
$thema_dis=("SELECT id_dis FROM discepline where dis_name='$discipline'");
if ($selectresult_d = mysqli_query($link, $thema_dis)) {

        /* fetch associative array */
        while ($row = mysqli_fetch_assoc($selectresult_d)) {
            $selectresult_dis = $row["id_dis"];
        }

        /* free result set */
        mysqli_free_result($selectresult_d);
    }
	else{
		print("error in getting thema");
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$thema_ins = "INSERT INTO thema(id_discipline_th,thema_text) values('$selectresult_dis','$theme')";
if(mysqli_query($link,$thema_ins)){
	echo "insert compete.";
	header('Location: admn_1.php'); exit();
}
else
{
	print "error";
}
?>	