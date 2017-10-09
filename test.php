<?php
if (!file_exists(__DIR__ . '/tests/' . $_GET['test'] . '.json')) {
    header('HTTP/1.1 404 Not Found');
    echo "Ошибка 404: File was not found.".'<br>';
    echo "Go back to the ".'<a href="list.php">List of tests</a>!';
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Тест</title>
</head>
<body>
<a href="admin2.php">Главная</a>
<a href="list.php">Список тестов</a>

<form method="post" action="src/certificate.php">

<?php


//echo '<pre>';
//print_r($_GET);
//echo '</pre>';

if (!empty($_GET['test'])) {
$file_dir = "tests/";
$test_name = $_GET['test'];
$test = file_get_contents($file_dir . $test_name . '.json');
$test = json_decode($test, true);

//echo '<pre>';
//print_r($test);
//echo '</pre>';


foreach($test as $qn => $q)
{
    if (isset($qn) && isset($q['answers']) && isset($q['question'])) {
    echo '<hr>';
    echo '<h4>'.$q['question'].'</h4>';

    foreach ($q['answers'] as $key => $answer) {
        echo '<input type="radio" name="a'.$qn.'" value="'.$key.'"> ';
        echo $answer."<br>";
    }

}
else {
    echo "Неверная структура теста, выберете другой тест из ".'<a href="list.php">списка</a>!';
    exit;
}

}
echo '<hr>';
echo '<label>Ваше имя: <input type="text" name="user_name" placeholder="Введите свое имя"></label>'.'<br>';
echo '<input type="hidden" name="test" value="'. $test_name .'">';
echo '<br>'.'<input type="submit" value="Отправить ответы">';
}

?>
</form>

</body>
</html>


