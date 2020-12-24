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
<?php
echo "<h1>";
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
echo "</h1>";
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
<h1>Выберите тему теста</h1>
<form action="" method="post">
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
<form action="insert_result.php" method="post">
<?php
$i=0;
$v=0;
include 'config.php';
mysqli_query($link,"SET NAMES 'utf8");
mysqli_query($link,"SET CHARACTER SET 'utf8'");
//echo "<form action='Result_test1.php' method='post'>";
$check_them=$_POST['theme'];
$test1_q = mysqli_query ($link,"SELECT DISTINCT text_task  from task,thema,test WHERE (thema_text='$check_them' AND  id_task_t=id_task AND id_theme=id_th )");
if (!$test1_q) {
    die("Query to show fields from table failed");
}
$fields_q = $test1_q->field_count;
while($q = $test1_q->fetch_array(MYSQLI_ASSOC))
// вывод строк
{	$v++;
	$i++;
	//добавление строки
	//добавление значений в строку
		foreach ($q as $cell_q)
		{
		echo "<br><br>$v";
		echo "<br><p name='$v'>$cell_q</p><br>";
		}
		$tt_a=mysqli_query($link,"SELECT type_task FROM task,type_task WHERE id_type_task=id_tt and text_task='".$cell_q."'");
		if(!$tt_a)
		{
			echo "error";
		}
		$fields_num = $tt_a->field_count;
		while($r_tt = $tt_a->fetch_array(MYSQLI_ASSOC))
		{
			foreach($r_tt as $cell_tt)
			{
				echo $cell_tt;
		
			}
		}


//////////////////////////////////////////
//Условие вывода задания если она с вариантом ответа или без варианта ответа. не работает заход во 2е условие(всегда выводит только те варианты ш)
//////////////////////////////////////////
		if($cell_tt="Ярик")
		{	
		$test1_ans = mysqli_query($link,"SELECT DISTINCT ansver FROM variable_ansvers,task,test WHERE id_task_va=id_task and text_task='$cell_q' and id_type_task=2");
		if (!$test1_ans) 
		{
		die("Query to show fields from table failed");
		}
		
		$fields_num = $test1_ans->field_count;
			while($row = $test1_ans->fetch_array(MYSQLI_ASSOC))
			{
				
				foreach($row as $cell)
				{
					$ansver_va = mysqli_query($link,"SELECT DISTINCT id_v_a FROM variable_ansvers WHERE ansver='$cell'");
					if (!$ansver_va) 
					{
					die("Query to show fields from v_a_id failed");
					}
					 while($row_va = $ansver_va->fetch_array(MYSQLI_ASSOC))
					{	foreach($row_va as $cell_va_ans)
						{
								$cell_va_ans;
						}
					}
					
					echo "<label>";
					echo "<br><input name='".$i."' id='$cell_va_ans' type='radio'>$cell<br>";
					echo $i;
					echo "</label>";
				}
			}
		}
		if($cell_tt="Без вариантов ответов")
		{	
		 $test1_ans2 = mysqli_query($link,"SELECT DISTINCT ansver FROM variable_ansvers,task,test WHERE id_task_va=id_task and text_task='$cell_q' and id_type_task=6");
		 if (!$test1_ans2) 
		 {
		 die("Query to show fields from table failed");
		 }
			$fields_num = $test1_ans2->field_count;
			while($row1 = $test1_ans2->fetch_array(MYSQLI_ASSOC))
			{
				foreach($row1 as $cell2)
				{
				echo "<br><input name='".$i."' id='ansver2_test1' type='text'><br>";
				echo $i;
				}
			}
			
		}
}
echo "<p align='center'><input type='submit' value='Здать тест'/></p>";
echo "</form>";
?>
</div>
</div>
<div id="footer">
</div>
</body>
</html>