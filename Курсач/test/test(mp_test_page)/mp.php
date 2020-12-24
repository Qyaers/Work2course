<!DOCTYPE HTML>
<html>
<head>
<meta charset=utf-8"/>
<title>Главная страница</title>
<link rel="stylesheet" type="text/css" href="main_pageCSS.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
echo "<form action='/test/log_page and reg/reg_log.php'>";
echo "<p align='right'>Приветствуем ".$_SESSION['login'].",вы авторизированы</p>";
echo "<p align='right'> <input type='submit' value='Выход'/></p>";
echo "</form>";	

}
else 
{
echo "<form action='/test/log_page and reg/login_page.php'>";
echo "<p align='right'><input type='submit' value='Авторизоваться'/></p>";
echo "</form>";	
}
?>
</div>
<div id="Menu">
<nav>
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
	echo "<p align='center'> Для прохождения тестирования пройдите авторизацию.</p>";
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
<p align='justify' margin-top-10>
Добрый день! Сегодня вы решили посетить наш сайт. И наврное вам бы хотелось узнать,что это за ресурс и для чего он был создан.
Данный сайт представляет собой систему онлайн тестирования знаний.Где любой желающий может пройти авторизацию и после начать тестирование своих знаний по предложенным темам.</p>
<p align='justify'>

Чтобы начать тестирование вам нужно лишь выбрать тему их списка в правой части сайта. Сайт был создан с целью протестировать свои знания в области верстки сайтов и работой с базой данных.
</p>
<p align='center'><img src='hello.jpg'/></p>
</div>
</div>
<div id="footer">
<p align='left'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Мы в vk </p><a align="left" href='https://vk.com/testyourminde'><img src='vk.png' width='120' height='120'/><a>
</div>
</body>
</html>