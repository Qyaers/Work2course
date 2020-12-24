<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content='width=1000' />
<title>registartion page</title>
<link href="reg_pageCSS.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>
<div id="logplase">
<body>

<?php
// Подключаем конфиг
include 'config.php';

if (isset($_POST['submit'])) {

    $err = array();

    // проверям логин
    $loginFromRequest = $_POST['login'];
    if (! preg_match("/^[a-zA-Z0-9]+$/", $loginFromRequest)) {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }

    if (strlen($loginFromRequest) < 3 or strlen($loginFromRequest) > 30) {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }

    // проверяем, не сущестует ли пользователя с таким именем
    $queryText = "SELECT COUNT(id_u) as count FROM user_t WHERE login_u='". $loginFromRequest. "'";
    $query = mysqli_query($link, $queryText);
    
    $row = mysqli_fetch_assoc($query);
    
    if (($row['count']) > 0) {
        $err[] = "Пользователь с таким логином уже существует в базе данных, введите другой логин.";
    }
    //
    // Если нет ошибок, то добавляем в БД нового пользователя
    if (count($err) == 0) {

        $login = $loginFromRequest;

        // Убераем лишние пробелы и делаем двойное шифрование
        $password = md5(md5(trim($_POST['password'])));
        $email_i = $_POST['email'];
        mysqli_query($link, "INSERT INTO user_t SET login_u='" . $login . "', password_u='" . $password . "', email='" . $email_i . "'");
		echo "<p align='center'>Закройте страницу и залогиньтесь</p>";
	}
}
?>
<body>
  <form method="POST" action="">
			<p id="text">Login</p>
			<p align="center">
				<input type="text" name="login" id="reg_inp">
			
			
			<p id="text">Password</p>
			<p align="center">
				<input type="password" name="password" id="reg_inp">
			</p>
			<p id="text">Email</p>
			<p align="center">
				<input type="text" name="email">
			</p>
			<p align="center">
				<input type="submit" name="submit" value="Зарегистрироваться">
			</p>
		</form>
</body>
</div>
</html>