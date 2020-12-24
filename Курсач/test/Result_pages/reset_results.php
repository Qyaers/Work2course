<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/test/lib/db.php";

	function Debug($var, $var_name = null) {
		echo "<pre>";
		if ($var_name !== null) 
			echo "$var_name = ";
		print_r($var);
		echo "</pre>";
	}

$thema=$_SESSION['thema'];
$user=$_SESSION['login'];
$user_id=mysqli_query($link,"SELECT id_u FROM user_t where login_u='".$user."'");
if (!$user_id)
{
	die ("error in geting id_u");
}
else
{
	while($row = $user_id->fetch_array(MYSQLI_ASSOC))
	{
    foreach($row as $cell_u)

	$cell_u;
	}
}
//Исправить не работает обновление данных для пользователя.
$db_update_results=mysqli_query($link,"UPDATE results SET id_task_r='' id_ansver_r='',date_ansver_r='' WHERE id_user_r=$cell_u and id_th_r=$thema");
if(!$db_update_results){
	die("error in update");
}
else{
	echo "lol";
header('location: /test/test(mp_test_page)/nochoise(try).php');
exit();
}
?>