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
<h1 align="center">Введите тему теста и выбирите дисциплину.</h1>
<form action="insert1.php" method="post">
<table>

    <tr>
        <td><label for="text">Тема теста: </label></td>
        <td>
		<input type="text" name="theme" id="theme_id"/>
		</td>
    </tr>
	<tr>
	<td>
<p>
	    <label for="type_text">Дисциплина: <br>
<?php
include 'config.php';
mysqli_query($link,"SET NAMES 'utf8");
mysqli_query($link,"SET CHARACTER SET 'utf8'");
$result6 = mysqli_query($link,"SELECT DISTINCT dis_name FROM discepline");
if(mysqli_num_rows($result6)<=0)
{
        echo ("записей не обнаружено!");
        }else{
                ?>
				<select type='text' name='discepline' class=\"StyleSelectBox\">");
                <?php while ($myrow6 = mysqli_fetch_array($result6)) 
                {
                        echo ("<option name='discepline' value=\"$myrow6[dis_name]\">$myrow6[dis_name]</option>\n");
                }
                echo ("</select>");        
}
?>
	</label>
</p>
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
<table>
<form action='admn_2.php'>
		<tr><td><input type="submit" value="Далее"/></td></tr>
</form>
</table>
</body>
</html>