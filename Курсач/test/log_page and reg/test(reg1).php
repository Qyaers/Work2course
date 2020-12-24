<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8"/>
<meta name="viewport" content='width=1000' />
<title>registartion page</title>
<link href="reg_pageCSS.css" rel="stylesheet">
</head>
<body>
<div id="logplase">
<?php
# Подключаем конфиг 
include 'config.php'; 

if(isset($_POST['submit'])) 
{ 

    $err = array(); 

    # проверям логин 
   if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login'])) 
    { 
        $err[] = "Логин может состоять только из букв английского алфавита и цифр"; 
    } 
     
    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30) 
    { 
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30"; 
    } 
     
    # проверяем, не сущестует ли пользователя с таким именем 
	//Не работает проверка,из-за неё не идёт запись регистрации (строка 33-34 )
  $query = mysqli_query($link,"SELECT COUNT(id_u) FROM user_t WHERE login_u='".mysqli_real_escape_string($link,$_POST['login'])."'")or die ("<br>Invalid query: " . mysqli_error()); 
  $row = mysql_fetch_row($query);
	if(($row) > 0) 
    { 
        $err[] = "Пользователь с таким логином уже существует в базе данных"; 
	} 
  //
     
    # Если нет ошибок, то добавляем в БД нового пользователя 
   if(count($err) == 0) 
    { 
         
        $login = $_POST['login']; 
         
        # Убераем лишние пробелы и делаем двойное шифрование 
       $password = md5(md5(trim($_POST['password']))); 
       $email_i=$_POST['email'];
        mysqli_query($link,"INSERT INTO user_t SET login_u='".$login."', password_u='".$password."', email='".$email_i."'"); 
      echo "window.close()";exit(); 
    }
} 
?>
  <form method="POST" action="">
<p id="text">Login</p><p align="center"><input type="text" name="login" id="reg_inp">
<p id="text">Password</p> <p align="center"><input type="password" name="password" id="reg_inp"></p>
<p id="text">Email</p> <p align="center"><input type="text" name="email"></p>
<p align="center"><input type="submit" name="submit" value="Зарегистрироваться"></p>
  </form>

  <?php
    if (isset($err)) {
      print "<b>При регистрации произошли следующие ошибки:</b><br>"; 
      foreach($err AS $error) 
      { 
        print $error."<br>"; 
      }   
    }
  ?>
 </div>
</body>
</html>