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
<h1 align="center">Задания</h1>
<form action="insert2(Правильная).php" method="post">
<table>
	<tr>
	<td><label>Тип задания:</label></td>
	<td>
<?php
include 'config.php';
mysqli_query($link,"SET NAMES 'utf8");
mysqli_query($link,"SET CHARACTER SET 'utf8'");
$result6 = mysqli_query($link,"SELECT type_task FROM type_task");
if(mysqli_num_rows($result6)<=0)
{
        echo ("записей не обнаружено!");
        }else{
                echo (" <select type='text' name='type_task' class=\"StyleSelectBox\">");
                while ($myrow6 = mysqli_fetch_array($result6)) 
                {
                        echo ("<option name='type_task' value=\"$myrow6[type_task]\">$myrow6[type_task]</option>\n");
                }
                echo ("</select>");        
}
?>
	</td>
	</tr>
    <tr>
        <td><label for="text">Текстовое задание: </label></td>
        <td>
		<!--
		<input type="text" name="text_task" id="text_task">
		!-->
		<textarea name="text_task" cols="40" rows="10"></textarea>
		</input>
		</td>
    </tr>
	    <tr>
        <td><label for="type_text">Пояснение ответа: </label></td>
        <td>
		<textarea name="about_ansver" cols="40" rows="10"></textarea>
<!--		<input type="text" name="about_ansver" id="about_ansver">

<?php
		// include "config.php";
		// $about_ansver = $_POST['about_ansver'];
		// $sql =mysqli_query($link,"INSERT INTO task (about_ansver) VALUES ('$about_ansver')");
?>

		</input>
!-->
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
<form action='admn_3.php'>
<table>
	<tr>
		<td><input type="submit" value="Далее"></td>
	</tr>
</form>
</body>
</html>