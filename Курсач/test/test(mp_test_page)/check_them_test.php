<html>
<head>
<meta charset="UTF-8"/>
<title>
check_theme
</title>
</head>
<body>
<?php
$check_them=$_POST['theme'];
include "config.php";

$check=mysqli_query($link,"SELECT thema_text FROM thema");
if($check_them!=$check)
{
	echo "Данная тема не найдена.";
	
}
else
{
	header('Location: test.php'); exit();
}
?>
</body>
</html>