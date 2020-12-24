<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8"/>
<title>Страницца проверки введённой информации</title>
</head>
<body>
<?php
include 'config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/test/lib/db.php";
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


	
mysqli_query($link,"SET NAMES 'utf8");
mysqli_query($link,"SET CHARACTER SET 'utf8'");
$result0 = mysqli_query($link,"SELECT * FROM test");
if (!$result0) {
    die("Query to show fields from table failed");
}

$fields_num = $result0->field_count;

echo "<h1>Тест</h1>";
echo "<table border='1'><tr>";
// вывод названий колонок в бд
while ($finfo = $result0->fetch_field()) {
        echo "<td> $finfo->name </td>";
    }
echo "</tr>\n";
// вывод строк
while($row = $result0->fetch_array(MYSQLI_ASSOC))
{
	//добавление строки
    echo "<tr>";
	//добавление значений в строку 
    foreach($row as $cell)
        echo "<td>$cell</td>";
	echo "<td> <form action=\"delete.php\" method=\"post\"><input type=\"hidden\" name=\"id_t\" id=\"id_t\" value=\"".$row["id_t"]."\"><input type=\"submit\" value=\"Удалить\"></form></td>";
    echo "</tr>\n";
}
echo "</table>";
echo "
<form action='admin_page.php'>
<br><input type='submit' value='Добавить тест'>
</form>
";
//////////////////////////
$result0 = mysqli_query($link,"SELECT * FROM discepline");
if (!$result0) {
    die("Query to show fields from table failed");
}

$fields_num = $result0->field_count;

echo "<h1>Дисциплины.</h1>";
echo "<table border='1'><tr>";
// вывод названий колонок в бд
while ($finfo = $result0->fetch_field()) {
        echo "<td> $finfo->name </td>";
    }
echo "</tr>\n";
// вывод строк
while($row = $result0->fetch_array(MYSQLI_ASSOC))
{
	//добавление строки
    echo "<tr>";
	//добавление значений в строку 
    foreach($row as $cell)
        echo "<td>$cell</td>";
    echo "</tr>\n";
}
echo "</table>";
//////////////////////////
//////////////////////////
$result0 = mysqli_query($link,"SELECT * FROM thema");
if (!$result0) {
    die("Query to show fields from table failed");
}

$fields_num = $result0->field_count;

echo "<h1>Темы</h1>";
echo "<table border='1'><tr>";
// вывод названий колонок в бд
while ($finfo = $result0->fetch_field()) {
        echo "<td> $finfo->name </td>";
    }
echo "</tr>\n";
// вывод строк
while($row = $result0->fetch_array(MYSQLI_ASSOC))
{
	//добавление строки
    echo "<tr>";
	//добавление значений в строку 
    foreach($row as $cell)
        echo "<td>$cell</td>";
	echo "<td> <form action=\"delete4.php\" method=\"post\"><input type=\"hidden\" name=\"id_th\" id=\"id_th\" value=\"".$row["id_th"]."\"><input type=\"submit\" value=\"Удалить\"></form></td>";
    echo "</tr>\n";
}
echo "</table>";
echo "
<form action='admn_1.php'>
<br><input type='submit' value='Добавить тему'>
</form>
";
//////////////////////////
echo "<table>";
$result0 = mysqli_query($link,"SELECT * FROM type_task");
if (!$result0) {
    die("Query to show fields from table failed");
}

$fields_num = $result0->field_count;

echo "<h1>Тип задания</h1>";
echo "<table border='1'><tr>";
// вывод названий колонок в бд
while ($finfo = $result0->fetch_field()) {
        echo "<td> $finfo->name </td>";
    }
echo "</tr>\n";
// вывод строк
while($row = $result0->fetch_array(MYSQLI_ASSOC))
{
	//добавление строки
    echo "<tr>";
	//добавление значений в строку 
    foreach($row as $cell)
        echo "<td>$cell</td>";
    echo "</tr>\n";
}
echo "</table>";
/////////////////////////////////
echo "<table>";
$result0 = mysqli_query($link,"SELECT * FROM task");
if (!$result0) {
    die("Query to show fields from table failed");
}

$fields_num = $result0->field_count;

echo "<h1>Задание</h1>";
echo "<table border='1'><tr>";
// вывод названий колонок в бд
while ($finfo = $result0->fetch_field()) {
        echo "<td> $finfo->name </td>";
    }
echo "</tr>\n";
// вывод строк
while($row = $result0->fetch_array(MYSQLI_ASSOC))
{
	//добавление строки
    echo "<tr>";
	//добавление значений в строку 
    foreach($row as $cell)
        echo "<td>$cell</td>";
	echo "<td> <form action=\"delete2.php\" method=\"post\"><input type=\"hidden\" name=\"id_task\" id=\"id_task\" value=\"".$row["id_task"]."\"><input type=\"submit\" value=\"Удалить\"></form></td>";
    echo "</tr>\n";
}
echo "</table>";
echo "
<form action='admn_2.php'>
<br><input type='submit' value='Добавить задание'>
</form>
";
////////////////////////////////////
echo "<table>";
$result0 = mysqli_query($link,"SELECT * FROM variable_ansvers");
if (!$result0) {
    die("Query to show fields from table failed");
}

$fields_num = $result0->field_count;

echo "<h1>Варианты ответа</h1>";
echo "<table border='1'><tr>";
// вывод названий колонок в бд
while ($finfo = $result0->fetch_field()) {
        echo "<td> $finfo->name </td>";
    }
echo "</tr>\n";
// вывод строк
while($row = $result0->fetch_array(MYSQLI_ASSOC))
{
	//добавление строки
    echo "<tr>";
	//добавление значений в строку 
    foreach($row as $cell)
        echo "<td>$cell</td>";
	echo "<td> <form action=\"delete3.php\" method=\"post\"><input type=\"hidden\" name=\"id_v_a\" id=\"id_v_a\" value=\"".$row["id_v_a"]."\"><input type=\"submit\" value=\"Удалить\"></form></td>";
    echo "</tr>\n";
}
echo "</table>";
echo "
<form action='admn_3.php'>
<br><input type='submit' value='Добавить варианты ответа'>
</form>
";
?>

<p><a href="admin_page.php">Возврат на страницу ввода</a></p>
</body>
</html>