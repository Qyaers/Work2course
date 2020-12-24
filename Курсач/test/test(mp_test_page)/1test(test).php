<!DOCTYPE HTML>
<html>
<head>
<meta charset=utf-8"/>
<title>Тест1</title>
<link rel="stylesheet" type="text/css" href="main_pageCSS.css" />
</head>
<body>
<div id="conteiner">
<div id="head">
<h1>4head )</h1>
</div>
<div id="Menu">
<nav>
<!--

Не работает переадресация страницы на страницу с тестом(Сделано по аналогии с поиском),при выборе темы из списка и ввода её в форму 
должна осуществляться проверка(переход на страницу проверки check_them_test.php) и переадресация на страницу (test.php) где происходит вывод теста по теме(которую мы ввели в поиске).

!-->
<form action="check_them_test.php" method="post">
<p>
<input size="23" type="text" name="theme" placeholder="Выбирите тест из списка ниже." id="theme_id">
</p>
<p>
<input type="submit" value="Перейти" />
</p>
</form>
</nav>
<ul class="topmenu">
<h1>Список тестов</h1>
<?php
include "config.php";
$Thema_SQL=mysqli_query($link,"SELECT DISTINCT theme FROM test");
if(!$Thema_SQL)
{
	echo "Query to show fields from table failed";
}
while($themas = $Thema_SQL->fetch_array(MYSQLI_ASSOC))
{
	//добавление строки

	
	//добавление значений в строку 
    foreach($themas as $row)
        echo "<p name='check_theme' id='check_theme_id' align='center'>$row</p>";
}
?>
</ul>
</nav>
</div>
<div id="content">
<form action="check_page_test1.php">
<?php
include 'config.php';
echo "<h1>Тест</h1>";
echo "<form name='name' action='Result_test1.php' method='post'>";

// Измегить на другие значения из базы данных(были переработан ввод теперь через id)

$test1_q = mysqli_query ($link,"SELECT DISTINCT  task from test WHERE theme='Gavrik'");
if (!$test1_q) {
    die("Query to show fields from table failed");
}
$fields_q = $test1_q->field_count;
while($q = $test1_q->fetch_array(MYSQLI_ASSOC))
// вывод строк
{
	//добавление строки
	//добавление значений в строку
	foreach ($q as $cell_q)
	{
	echo "<br><p>$cell_q</p><br>";
//
// Не работает вывод для 2 вопроса,что странно.В базе есть варианты ответа на него,однако для 1 вопроса выводит,а для 2 нет.
//
	$sq = mysqli_query($link,"SELECT id_type_test FROM test WHERE id_type_test=id_task");
	$test1_ans = mysqli_query($link,"SELECT variable_ansvers FROM test where task=$cell_q");
if (!$test1_ans) {
    die("Query to show fields from table failed");
}
	$fields_num = $test1_ans->field_count;
    while($row = $test1_ans->fetch_array(MYSQLI_ASSOC))
	
	foreach($row as $cell)

// Первая версия проверки типа теста (типа задания) по логике если 

	if($sq='С выбором ответа')
	{
	echo "<br><input name='ansver1_test1' id='ansver_test_id' type='radio' value=''>$cell</input><br>";
	}
	else if($sq="Без выбора ответа")
	{
	echo "<br><input name='ansver1_test1 id='ansver_test_id' type='text' value=''>$cell</input><br>";
	}
}
echo "</form>";
?>
<p align="center"><input type="button" value="Здать тест"/>
</p>
</div>
</div>
<div id="footer">
</form>
</div>
</body>
</html>