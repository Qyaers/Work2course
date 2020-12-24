<!DOCTYPE HTML>
<html>
<head>
<meta charset=utf-8"/>
<title>Тест1</title>
<style>
   select {
    width: 150px; /* Ширина списка в пикселах */
   }
</style>
<link rel="stylesheet" type="text/css" href="main_pageCSS.css" />
</head>
<body>
<div id="conteiner">
<div id="head">
<h1>
<?php
$check_them1=$_POST['theme'];
include "config.php";
mysqli_query($link,"SET NAMES 'utf8");
mysqli_query($link,"SET CHARACTER SET 'utf8'");
$Thema_SQL=mysqli_query($link,"SELECT DISTINCT thema_text FROM thema WHERE thema_text='$check_them1'");
if(!$Thema_SQL)
{
	echo "Query to show fields from table failed";
}
while($themas = $Thema_SQL->fetch_array(MYSQLI_ASSOC))
{
	//добавление строки

	
	//добавление значений в строку 
    foreach($themas as $row)
        echo "<p name='check_theme' id='check_theme_id' align='center'>Тема:$row</p>";
}
?>
</h1>
</div>
<div id="Menu">
<nav>
<h1>Выберите тему теста</h1>
<form action="test.php" method="post">
<p>
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
                        echo ("<option  name='theme' value=\"$myrow6[thema_text]\">$myrow6[thema_text]</option>\n");
                }
                echo ("</select>");        
}
?>
</p>
<p>
<input type="submit" value="Перейти" />
</p>
</form>
</nav>
</nav>
<nav>
<ul class="topmenu">
<h1>Меню</h1>
</ul>
</nav>
<p align="center">
<a href="mp.php">Главная страница</a>
</p>
</div>
<div id="content">
<form action="check_page_test1.php">
<?php

$check_them=$_POST['theme'];
include 'config.php';
mysqli_query($link,"SET NAMES 'utf8");
mysqli_query($link,"SET CHARACTER SET 'utf8'");
echo "<form name='name' action='Result_test1.php' method='post'>";
$test1_q = mysqli_query ($link,"SELECT DISTINCT text_task  from task,thema,test WHERE (thema_text='$check_them' AND  id_task_t=id_task AND id_theme=id_th )");
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

	$test1_ans = mysqli_query($link,"SELECT DISTINCT ansver FROM variable_ansvers,task,test WHERE id_task_va=id_task and text_task='$cell_q'");
if (!$test1_ans) {
    die("Query to show fields from table failed");
}
	$fields_num = $test1_ans->field_count;
    while($row = $test1_ans->fetch_array(MYSQLI_ASSOC))
//////////////////////////////////////////
//Условие вывода задания если она с вариантом ответа или без варианта ответа.
//////////////////////////////////////////	
	//if('Без варинатов'=$type_test_check)
	//{
	foreach($row as $cell)
	echo "<br><input name='ansver1_test1' id='ansver1_test1' type='radio' value=''>$cell<br>";
	//{
	//else
	//{
	// echo "<input type='text'/>";
	//}
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