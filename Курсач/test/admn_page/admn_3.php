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
<meta charset="UTF-8"/>
<title>
admn
</title>
</head>
<body>
<h1 align="center">Варианты ответа</h1>
<form action="insert3.php" method="post">
<table>
	<tr>
	<td><label>Задание:</label></td>
	<td>
<?php
include 'config.php';
mysqli_query($link,"SET NAMES 'utf8");
mysqli_query($link,"SET CHARACTER SET 'utf8'");
$result6 = mysqli_query($link,"SELECT text_task FROM task");
if(mysqli_num_rows($result6)<=0)
{
        echo ("записей не обнаружено!");
        }else{
                echo (" <select type='text' name='text_task' class=\"StyleSelectBox\">");
                while ($myrow6 = mysqli_fetch_array($result6)) 
                {
                        echo ("<option name='text_task' value=\"$myrow6[text_task]\">$myrow6[text_task]</option>\n");
                }
                echo ("</select>");        
}
?>
	</td>
	</tr>
    <tr>
        <td><label for="type_text">Ответ: </label></td>
        <td>
		<textarea name="ansver" id="ansver" cols="40" rows="10"></textarea>
		<!-- Старый ввод (визуально)
		<input type="text" name="ansver" id="ansver">
		</input>
		!-->
		</td>
    </tr>
    <tr>
        <td><label for="text">Правильный или нет: </label></td>
        <td>
		<br>
<!--
		Выбор варианта ответа при помощи радио баттона.
!-->
		<input type="radio" name="true_or_false" id="true_or_false" value="Да">
		Да
		</input>
		<input type="radio" name="true_or_false" id="true_or_false " value="Нет">
		Нет
		</input>
		</td>
    </tr>	
	<tr>
	<td>
	<br>
    <input type="submit" value="Добавить">
	</td>
	</tr>
</table>
</form>
<form action='admin_page.php'>
<table>
	<tr>
		<td><input type="submit" value="Далее"></td>
	</tr>
</form>
</body>
</html>