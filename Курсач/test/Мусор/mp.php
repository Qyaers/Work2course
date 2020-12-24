<!DOCTYPE HTML>
<html>
<head>
<meta charset=utf-8"/>
<title>Тест1</title>
<link rel="stylesheet" type="text/css" href="main_pageCSS.css" />
  <style>
   select {
    width: 150px; /* Ширина списка в пикселах */
   }
  </style>
</head>
<body>
<div id="conteiner">
<div id="head">
<h1>
Главная страница
</h1>
<?php
session_start();
if(!empty($_SESSION['login']))
{
echo "<form action='reg_log.php'>";
echo "<p align='right'>'".$_SESSION['login']."',вы авторизированы</p>";
echo "<p align='right'> <input type='submit' value='Выход'/></p>";
echo "</form>";	

}
else 
{
echo "<form action='login_page.php'>";
echo "<p align='right'><input type='submit' value='Авторизироваться'/></p>";
echo "</form>";	
}
?>
</div>
<div id="Menu">
<nav>
<!--

Не работает переадресация страницы на страницу с тестом(Сделано по аналогии с поиском),при выборе темы из списка и ввода её в форму 
должна осуществляться проверка(переход на страницу проверки check_them_test.php) и переадресация на страницу (test.php) где происходит вывод теста по теме(которую мы ввели в поиске).

!-->
<?php
if(!empty($_SESSION['login']))
{
echo "<h1>Выберите тему теста</h1>";
echo "<form action='nochoise(try).php' method='post'>";
echo "<p>";
include 'config.php';
mysqli_query($link,"SET NAMES 'utf8");
mysqli_query($link,"SET CHARACTER SET 'utf8'");
$result6 = mysqli_query($link,"SELECT DISTINCT thema_text FROM thema");
if(mysqli_num_rows($result6)<=0)
	{
        echo ("записей не обнаружено!");
	}else
	{
        echo (" <select type='text' name='theme' class=\"StyleSelectBox\">");
            while ($myrow6 = mysqli_fetch_array($result6)) 
            {
                        echo ("<option  name='theme' value=\"$myrow6[thema_text]\">$myrow6[thema_text]</option>\n");
            }
        echo ("</select>");        
	}
echo "<input type='submit' value='Перейти' />";
echo "</p>";
echo "</form>";
}
else
{
	echo "<p align='justify'> Для прохождения тестирования пройдите авторизацию.</p>";
}
?>
</p>
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
<p>
Описание сайта.
</p>
</div>
</div>
<div id="footer">

</div>
</body>
</html>