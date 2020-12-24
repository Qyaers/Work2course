<?php
 function generateCode($length=6) { 
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789"; 
    $code = ""; 
    $clen = strlen($chars) - 1;   
    while (strlen($code) < $length) { 
        $code .= $chars[mt_rand(0,$clen)];   
    } 
    return $code; 
  } 
  
  # Если есть куки с ошибкой то выводим их в переменную и удаляем куки
  if (isset($_COOKIE['errors'])){
      $errors = $_COOKIE['errors'];
      setcookie('errors', '', time() - 60*24*30*12, '/');
  }

  # Подключаем конфиг
  include 'config.php';

  if(isset($_POST['login'])) 
  { 
    
    # Вытаскиваем из БД запись, у которой логин равняеться введенному 
    $data = mysqli_fetch_assoc(mysqli_query($link,"SELECT id_u, password_u FROM `user_t` WHERE `login_u`='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1")); 
     
    # Соавниваем пароли 
    if($data['password_u'] == md5(md5($_POST['password']))) 
    { 
      # Генерируем случайное число и шифруем его 
      $hash = md5(generateCode(10)); 
           
      # Записываем в БД новый хеш авторизации и IP 
      mysqli_query("UPDATE user_t SET users_hash='".$hash."' WHERE id_u='".$data['id_u']."'") or die("MySQL Error: " . mysqli_error()); 
       
      # Ставим куки 
      setcookie("id", $data['id_u'], time()+60*60*24*30); 
      setcookie("hash", $hash, time()+60*60*24*30); 
       
      # Переадресовываем браузер на страницу проверки нашего скрипта 
      header("Location: check_login.php"); exit(); 
	} 
    else 
    { 
      print "Вы ввели неправильный логин/пароль<br>"; 
    }
  } 
  else
  {
		print "your fuckt";
  }
?>

<?php
// # подключаем конфиг
// include 'reg_php.php';  

// # проверка авторизации
// if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) 
// {    
    // $userdata = mysqli_fetch_assoc(mysqli_query("SELECT * FROM user_t WHERE id_u = '".intval($_COOKIE['id'])."' LIMIT 1"));

    // if(($userdata['users_hash'] !== $_COOKIE['hash']) or ($userdata['id_u'] !== $_COOKIE['id'])) 
    // { 
        // setcookie('id', '', time() - 60*24*30*12, '/'); 
        // setcookie('hash', '', time() - 60*24*30*12, '/');
    // setcookie('errors', '1', time() + 60*24*30*12, '/');
    // header('Location: check_login.php'); exit();	
    // } 
// } 
// else 
// { 
  // setcookie('errors', '2', time() + 60*24*30*12, '/');
  // header('Location: test.php'); exit();
// }
// ?>
