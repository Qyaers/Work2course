<?php
//Функция дебага для проверки работы запросов и записей.
include_once $_SERVER['DOCUMENT_ROOT'] . "/test/lib/db.php";

	function Debug($var, $var_name = null) {
		echo "<pre>";
		if ($var_name !== null) 
			echo "$var_name = ";
		print_r($var);
		echo "</pre>";
	}
?>

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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="main_pageCSS.css" />
<script 
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous">
</script>
</head>
<body>
	<div id="conteiner">
		<div id="head">
		<?php
		$check_them1=$_POST['theme'];
		include "config.php";
		mysqli_query($link,"SET NAMES 'utf8");
		mysqli_query($link,"SET CHARACTER SET 'utf8'");
		$Thema_SQL=mysqli_query($link,"SELECT DISTINCT thema_text FROM thema WHERE thema_text='$check_them1'");
		if(!$Thema_SQL)
		{
			die ("Query to show fields from table failed");
		}
		while($themas = $Thema_SQL->fetch_array(MYSQLI_ASSOC))
		{
			//добавление строки	
			//добавление значений в строку 
			foreach($themas as $row)
			{
				echo "<h1 name='check_theme' id='check_theme_id' align='center'>Тема:$row</h1>";
			}
		}
		if(!empty($_SESSION['login']))
		{ ?>
			<form action='/test/log_page and reg/reg_log.php'>
			<p align='right'><?php echo $_SESSION['login'];?>,вы авторизированы</p>
			<p align='right'> <input type='submit' value='Выход'/></p>
			</form>
			<?php
		} else { 
			?>
			<form action='/test/log_page and reg/login_page.php'>
			<p align='right'><input type='submit' value='Авторизироваться'/></p>
			</form>	
			<?php
		}
		?>
		</div>
		<div id="Menu">
			<nav>
				<h1>Выберите тему теста</h1>
				<form action="" method="post">
					<p>
					<?php
					$theme_list = $DB->getThemeList();
					if ($theme_list === false) {
						echo ("записей не обнаружено!");
					} else { ?>
						<select type='text' name='theme' class="StyleSelectBox">
						<?php foreach ($theme_list as $theme) {
							?>
							<option  name='theme' value="<?php echo $theme['text'] ;?>">
								<?php echo $theme['text']?>
							</option>
							<?php
						}?>
						</select>
					<?php
					}
					?>
					</p>
					<input type="submit" value="Перейти" />
				</form>
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
			<form action="/test/Result_pages/insert_result.php" method="post">
			<?php
			$arResult = []; // массив результата работы скрипта
			$ins=$DB->getIdTheme($check_them1);
			//Debug($check_them1);
			?>
			<input type="hidden" name="theme" value="<?php echo $ins ?>"/>
			
			<?php
			if ($_POST['theme'])
			{
				$check_them=$_POST['theme'];
			} else  {
				// error не выбрана тема
			}	
			
			if ($check_them) {
				
				$taskIdList = $DB->getTasksByTheme($check_them);
				//Debug($taskIdList);
				foreach ($taskIdList as $task) {
					?>
					<div class="form-group mb-5">
						<label ><?php echo $task['text'] ?></label >
						<?php
						if ($task['type'] == VARIABLE_ID) {
							foreach ($task['answer'] as $answer) {
								?>
								<div class="form-check mb-3">
									<input class="form-check-input"  name="<?php echo $task['id'] ?>"  type='radio' value='<?php echo $answer['text'] ?>'>
									<label class="form-check-label">
										<?php echo $answer['text']?>
									</label>
								</div>
								<?php
							}
						} else {
							?>
							<textarea cols="50" rows="5" class="form-control" name="<?php echo $task['id'] ?>"type="text"></textarea>
							<?php
						}
						?>
					</div>
					<?php
				}
			}
			echo "<p align='center'><input type='submit' value='Cдать тест'/></p>";
			?>
			</form>
		</div>
	</div>
	<div id="footer">
	</div>
</body>
</html>