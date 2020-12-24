<html>
<head>
<title>
reg_php
</title>
</head>
<body>
<?php
$login_i = $_POST['login'];
$password_i = md5(md5(trim($_POST['password']))); 
$email_i = $_POST['email'];
include "connect_reg.php";
$result = mysqli_query($link,"INSERT INTO user_t (login_u,password_u,email) VALUES ('".$login_i."','".$password_i."','".$email_i."')");
echo mysqli_error($link);

echo "<br>";	
if ($result == true){
	echo "Поздравляем вы зарегестрированны,закройте страницу и зайдите под своим логином на сайт.";
	}
else{
	 echo "Произошла ошибка попробуйте ещё раз.";
	}
?>
</body>
</html>