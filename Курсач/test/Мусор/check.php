<?php
# подключаем конфиг
include 'config.php';  

function generateCode($length=6) { 
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789"; 
    $code = ""; 
    $clen = strlen($chars) - 1;   
    while (strlen($code) < $length) { 
        $code .= $chars[mt_rand(0,$clen)];   
    } 
    return $code; 
  } 
  
 if(isset($_POST['login'])) 
  { 
    
    # Вытаскиваем из БД запись, у которой логин равняеться введенному 
    $data = mysqli_fetch_assoc(mysqli_query($link,"SELECT id_u, password_u FROM user_t WHERE login_u='".mysqli_real_escape_string($link, $_POST['login'])."' LIMIT 1")); 
     
    # Соавниваем пароли 
    if($data['password_u'] == md5(md5($_POST['password']))) 
    { 
      # Генерируем случайное число и шифруем его 
      $hash = md5(generateCode(10)); 
           
      # Записываем в БД новый хеш авторизации и IP 
      mysqli_query($link, "UPDATE user_t SET users_hash='".$hash."' WHERE id_u='".$data['id_u']."'") or die("MySQL Error: " . mysqli_error()); 
	  echo "generated hash ".$hash."<p>";
      # Ставим куки 
      setcookie("id", $data['id_u'], time()+60*60*24*30); 
      setcookie("hash", $hash, time()+60*60*24*30); 
	  echo "generated hash from cookie ".$_COOKIE["hash"]."<p>";
      # Переадресовываем браузер на страницу проверки нашего скрипта 
      header("Location: check.php"); exit(); 
	} 
    else 
    { 
      print "Вы ввели неправильный логин/пароль<br>"; 
    }
  }
  
# проверка авторизации
if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) 
{    
    $query = (mysqli_query($link, "SELECT * FROM user_t WHERE id_u = '".intval($_COOKIE['id'])."' LIMIT 1"));
	$userdata = mysqli_fetch_assoc($query);
	echo "hash from db ".$userdata['users_hash']."<p>";
	echo "hash from cookie ".$_COOKIE['hash']."<p>";

    if(($userdata['users_hash'] !== $_COOKIE['hash']) or ($userdata['id_u'] !== $_COOKIE['id'])) 
    { 
        setcookie('id', '', time() - 60*24*30*12, '/'); 
        setcookie('hash', '', time() - 60*24*30*12, '/');
		setcookie('errors', '1', time() + 60*24*30*12, '/');
		header('Location: Login_page.php'); exit();
    } 
	else
	{	
		session_start();
		$_SESSION['login']=$userdata['login_u'];
		echo $_SESSION['login'].'Сэсия началась'; 
		print "Привет, ".$userdata['login_u'].". Всё работает!";
		header('location: mp.php');
	}
} 
else 
{ 
  setcookie('errors', '2', time() + 60*24*30*12, '/');
  header('Location: Login_page.php'); exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <title>check_log</title>
</head>
<body>
</body>
</html>