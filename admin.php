<?php
error_reporting(E_ALL);

if (isset($_FILES['test'])) {
    $testName = $_FILES['test']['name'];
    $tmp = $_FILES['test']['tmp_name'];
    $directory = 'tests/'.$testName;
    $pathInfo = pathinfo($directory); 
    if ($testName) { 
        if ($pathInfo['extension'] === 'json') {
            move_uploaded_file($tmp, $directory);
            echo 'Тест успешно загружен!';
        }
        else {
            echo "<p class='action'>Загруженный файл неверного формата, загрузите файл .json</p>";
        }  
    }
    else {
        echo "<p class='action'>Вы должны загрузить файл</p>";
    }         
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Обработка форм</title>
    <link rel="stylesheet" href="css/style.css">  
</head>
<body>
    <div>
        <h3>Загрузите файл теста в формате .json</h3>
        <form method="POST" action="admin.php" enctype="multipart/form-data">
            <input type="file" name="test">
            <input type="submit" value="Загрузить">
        </form>

        <ul>
            <li><a href="admin.php">Загрузить новый тест</a></li>
            <li><a href="list.php">Перейти к списку тестов</a>
            </li>
        </ul>
    </div>
</body>
</html>