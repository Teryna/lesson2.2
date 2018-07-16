<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Тест</title>
    <link rel="stylesheet" href="css/style.css">  
</head>
<body>

<form method="post">
    
<?php
error_reporting(E_ALL);
if (!empty($_GET["name"])) {
    $tests = json_decode(file_get_contents('./tests/' . $_GET["name"] . '.json'));
    foreach($tests->questions as $question) {
        echo '<h3>' . $question->question . '</h3>';
        foreach($question->answers as $key => $answer) {
            echo '<label><input type="radio" value="' . $key . '"name="' . $question->id . '">'. $answer . '</label>';
        }
    }
}

?>
<p><input type="submit" value="Проверить ответы"></p>

</form>
<?php
if ($_POST) {
    $count = 0;
    
    foreach($_POST as $number => $testAnswer) {
        foreach($tests->questions as $question) {
            if ($testAnswer === $question->correct && $number === $question->id) {
                $count++;
            }
        }
    }
    echo '<h3>Правильных ответов: ' . $count . '</h3>';
}
?>
<ul>
    <li><a href="admin.php">Загрузить новый тест</a></li>
    <li><a href="list.php">Перейти к списку тестов</a></li>
</ul>

</body>
</html>