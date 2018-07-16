<?php
error_reporting(E_ALL);
$files = array_slice(scandir('tests/'), 1);
$count = 1;

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список загруженных тестов</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h3>Список загруженных тестов</h3>       
<?php if (!empty($files)) : ?>   
    <?php foreach ($files as $file) : ?>
      <?php $tmp = explode('.', $file); ?>
        <?php if (end($tmp) === 'json') : ?>
            <?php $test = pathinfo($file)['filename']; ?>
               <li><?php echo str_pad($count, 2) ?><a href="test.php?name=<?php echo $test ?>"><?php echo $test ?></a></li>    
            <?php $count++; ?>   
        <?php endif; ?>
    <?php endforeach; ?>   
<?php endif; ?>  
<ul>
    <li><a href="admin.php">Загрузить новый тест</a></li>
</ul>
</body>
</html>

 


