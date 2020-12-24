<?php
include "config.php";
session_start();
mysqli_query($link,"SET NAMES 'utf8");
mysqli_query($link,"SET CHARACTER SET 'utf8'");
include "config.php";
$user=$_SESSION['login'];
$ins_ansver= $_POST['$i'];
$ins_question=$_POST['$v'];
$ins_th=$_POST['theme'];
$count=$_SESSION['count'] = @$_SESSION['count'] + 1;
	$select_test_id=mysqli_query($link,"SELECT DISTINCT id_t FROM test,thema WHERE id_th=id_theme and thema_text='$ins_th'");
	if(!$select_test_id )
	{
		die("Query to show id_t from table test failed");
	}
	$ins_q_sel=mysqli_query($link,"SELECT id_task FROM task WHERE text_task='$ins_question'");
	if(!$ins_q_sel)
	{
		die("Query to show id_task from table task failed");
	}
	$ins_a_sel=mysqli_query($link,"SELECT id_v_a FROM variable_ansvers WHERE ansver='$ins_ansver'");
	if(!$ins_a_sel)
	{
		die("Query to show id_v_a FROM variable_ansvers failed");
	}
	
	$ins_user_sel=mysqli_query($link,"SELECT id_u FROM user_t WHERE login_u='".$_POST['login']."'");
	if(!$ins_user_sel)
	{
		die("Query to show id_v_a FROM variable_ansvers failed");
	}
$ins_res=mysqli_query($link,"INSERT INTO results(id_test_r,id_task_r,id_user_r,id_ansver_r,date_ansver_r,number_try) value($select_test_id,$ins_id_task,$ins_user_sel,$ins_ansver,now(),$count)");
	if(!$ins_res )
	{
		die("Query to insert into table results  failed");
	}
	else
	{
		echo "Поздравляем'".$_SESSION['login']."',тестирование завершено";
		//header('Loaction: Result_test1.php');
	}
?>