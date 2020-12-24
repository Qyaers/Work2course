<?php
//использование файла с глобальными переменными
include_once("config.php");
//получение идентификатора книги из пост запроса 
$id = mysqli_real_escape_string($link, $_REQUEST['id_task']);
//запрос на удаление книги, имя таблицы берется из глобальных констант, идентификатор из запроса
$sql = "DELETE FROM task WHERE id_task='$id'";
//проверка успешности выполнения запроса и вывод соответствующего сообщения
if(mysqli_query($link, $sql)){
    echo "Запись успешно удалена. <a href=check_admin_page.php>На главную</a>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Закрытие соединения с БД
mysqli_close($link);
?>
