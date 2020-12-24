<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/test/lib/db.php";
$number_try=$_SESSION['count'];
	function Debug($var, $var_name = null) {
		echo "<pre>";
		if ($var_name !== null) 
			echo "$var_name = ";
		print_r($var);
		echo "</pre>";
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>
Result test 1
</title>
<meta content="initial-scale=1, minimum-scale=1, width=device-width" name="viewport" />
<meta charset="utf-8"/>
<link href="main_pageCSS.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</title>
</head>
<body>
<div id="container">
<div id="head">
<h1>
Результат прохождения теста
</h1>
<?php
include "config.php";
if(!empty($_SESSION['login']))
{
echo "<form action='/test/log_page and reg/reg_log.php'>";
echo "<p align='right'>'".$_SESSION['login']."',вы авторизированы</p>";
echo "<p align='right'> <input type='submit' value='Выход'/></p>";
echo "</form>";	

}
else 
{
echo "<form action='/test/log_page and reg/login_page.php'>";
echo "<p align='right'><input type='submit' value='Авторизироваться'/></p>";
echo "</form>";	
}
include 'config.php';
mysqli_query($link,"SET NAMES 'utf8");
mysqli_query($link,"SET CHARACTER SET 'utf8'");
?>
</div>
<div id="Menu">
<nav>
<ul class="topmenu">
<h1>Меню</h1>
</ul>
</nav>

<p align="center">
<a href="/test/test(mp_test_page)/mp.php">Главная страница</a>
</p>
</div>
<div id="content">
<?php
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

$thema=$_SESSION['thema'];
$check_results = mysqli_query($link,"SELECT DISTINCT text_task,id_ansver_r FROM task,results,thema,variable_ansvers  
WHERE id_ansver_r!=' ' and id_user_r=$cell_u  and id_th=id_th_r and true_or_false='Да' and id_task=id_task_r and number_try=$number_try");
if (!$check_results) {
    die("Query to show fields from table failed");
}
echo "<table align='center' width='90%' cellspacing='0' cellpadding='15' border='1'>";
echo "<tr><td align='center'>Задание</td><td align='center'>Ваш ответ</td></tr>";
?><tr><?php
while($row = $check_results->fetch_array(MYSQLI_ASSOC))
{
	//добавление строки

echo "<tr>";	
	//добавление значений в строку 
    foreach($row as $cell)

		echo "<td align='left'>$cell</td>";
}
?>
</tr>
</table>
<?php
$enum_rights=$DB->getEnumRightAnsvers($cell_u,$thema,$number_try);
$enum_ansver=$DB->getAnsvers($cell_u,$thema,$number_try);
?>
<p mt-10>Поздравляем вы завершили тестирование ваш результат: <?php echo $enum_rights; ?>&nbsp; из &nbsp;<?php echo $enum_ansver;?></p>
<?php
echo "<p align='justify'>Номер попытки за текущую сессию:".$_SESSION['count']."</p>";
?>
<form action="reset_results.php">
<p align='center'><input type='submit' value='Пройти тест заного'/></p>
</form>

<?php
echo "<h1 align='center'>Пояснение ответов</h1>";
//передать сюда тему. и сделать условие по номеру попытки(если номер попыти соответствует тому)
$ansver_info=mysqli_query($link,"SELECT DISTINCT text_task,about_ansver FROM task,thema,results WHERE id_task=id_task_r and id_th=$thema");
if(!$ansver_info)
{
	echo "Query to show from table failed";
}

while($ans_inf=$ansver_info->fetch_array(MYSQLI_ASSOC))
	{
		foreach($ans_inf as $cell_inf)
		echo "<p>$cell_inf</p>";
	}
?>

</div>
</div>
</body>
</html>