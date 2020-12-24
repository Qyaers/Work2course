<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/test/lib/db.php";

	function Debug($var, $var_name = null) {
		echo "<pre>";
		if ($var_name !== null) 
			echo "$var_name = ";
		print_r($var);
		echo "</pre>";
	}
	
include "config.php";
Debug($_POST);
mysqli_query($link,"SET NAMES 'utf8");
mysqli_query($link,"SET CHARACTER SET 'utf8'");
include "config.php";
$ins_th=$_POST['theme'];
$ins_ansver=['task-1/answer'];
//
$user=$_SESSION['login'];
//
$str_query=mysqli_query($link,"SELECT DISTINCT id_u FROM user_t WHERE login_u='$user'");
if(!$str_query)
{
	echo "oh no<br>";
}
else
{
	while($row = $str_query->fetch_array(MYSQLI_ASSOC))
{
	//добавление строки
    echo "<tr>";
	//добавление значений в строку 
    foreach($row as $id_user)
		echo $id_user;
}
}
$number_try = $_SESSION['count'] = @$_SESSION['count'] + 1;
foreach ($_POST as $id_task => $id_answer) {	
	if ($id_task == 'theme') {
		$id_th_r = $id_answer;
		echo "Тема $id_task <br>";
	} else {
		$data='now()';
		echo "$id_th_r,$id_user, $id_task ,$id_answer,$data, $number_try <br>";	
		$res = $DB->setResults($id_th_r, $id_user, $id_task ,$id_answer, $data, $number_try);
		header('location: Result_test1.php');
	}
};
?>