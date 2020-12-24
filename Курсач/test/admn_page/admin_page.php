<?php
//Функция дебага для проверки работы запросов и записей.
include_once $_SERVER['DOCUMENT_ROOT'] . "/test/lib/db.php";

	function Debug($var, $var_name = null) {
		echo "<pre>";
		if ($var_name !== null) 
			echo "$var_name = ";
		print_r($var);
		echo "</pre>";
	}
$_SESSION['login'];
    $query = (mysqli_query($link, "SELECT id_u FROM user_t WHERE login_u = '".$_SESSION['login']."' LIMIT 1"));
	$userdata = mysqli_fetch_assoc($query);
		$user_privelegy = $DB->getPrivelegyUserById($userdata['id_u']);		
		if(!$user_privelegy)
		{
			echo "error";
		}
		if($user_privelegy === 'admin')
		{
			
		}
		else
		{
			echo "second";
		header('location: /test/test(mp_test_page)/mp.php');
		}
	
?>
<!DOCTYPE HTML>
<html>
<head>
<meta content="text/html; charset=utf-8">
<title>Admin page</title>
</head>
<body>
<br>
<h1 align="center">Тест</h1>
<form name="name" action="insert11.php" method="post">
<p>
    <label for="type_text">Тема: <br>
<?php
include 'config.php';
mysqli_query($link,"SET NAMES 'utf8");
mysqli_query($link,"SET CHARACTER SET 'utf8'");
$result6 = mysqli_query($link,"SELECT DISTINCT thema_text FROM thema");
if(mysqli_num_rows($result6)<=0)
{
        echo ("записей не обнаружено!");
        }else{
                echo (" <select type='text' name='theme' class=\"StyleSelectBox\">");
                while ($myrow6 = mysqli_fetch_array($result6)) 
                {
                        echo ("<option name='theme' value=\"$myrow6[thema_text]\">$myrow6[thema_text]</option>\n");
                }
                echo ("</select>");        
}
?>
	</label>
</p>
<p>
    <label for="type_text">Тип теста:  <br>
<?php

include 'config.php';
mysqli_query($link,"SET NAMES 'utf8");
mysqli_query($link,"SET CHARACTER SET 'utf8'");
$result6 = mysqli_query($link,"SELECT DISTINCT type_task FROM type_task");
if(mysqli_num_rows($result6)<=0)
{
        echo ("записей не обнаружено!");
        }else{
                echo ("<select type='text' name='type_task' class=\"StyleSelectBox\">");
                while ($myrow6 = mysqli_fetch_array($result6)) 
                {
                        echo ("<option name='type_task' value=\"$myrow6[type_task]\">$myrow6[type_task]</option>\n");
                }
                echo ("</select>");        
}
?>
	</label>
</p>
<p>
	<label for="type_text">Задание:    <br>
<?php
include 'config.php';
mysqli_query($link,"SET NAMES 'utf8");
mysqli_query($link,"SET CHARACTER SET 'utf8'");
$result6 = mysqli_query($link,"SELECT  text_task FROM task");
if(mysqli_num_rows($result6)<=0)
{
        echo ("записей не обнаружено!");
        }else{
                echo (" <select type='text' name='task' class=\"StyleSelectBox\">");
                while ($myrow6 = mysqli_fetch_array($result6)) 
                {
                        echo ("<option name='task' value=\"$myrow6[text_task]\">$myrow6[text_task]</option>\n");
                }
                echo ("</select>");        
}
?>
<p>
	<br>
    <input type="submit" value="Добавить">
</p>
</form>

<p><a href="check_admin_page.php">Щёлкните сдесь чтобы открыть проверку теста</a></p>
</body>
</html>