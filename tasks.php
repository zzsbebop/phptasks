<?php
$questions = [
  'Назовите столицу Англии?' => 'Лондон',
  'Какого цвета томат?' => 'Красный',
  'Сколько месяцев в году?' => '12',
  'Назовите имя пресонажа из популярного романа Артура Конан-Дойля?' => 'Шерлок'
];

?>
<!doctype html>
<html>
<body>
<?php if ($_SERVER['REQUEST_METHOD'] == 'GET'): ?>

  <h2>Отвечайте на вопросы!</h2>

  <?php $counter = 1;?>
<?php foreach ($questions as $key => $answer): ?>

      <p><?= $key; ?></p>

<form action="form_single.php" method="POST">
    <input type="text" name="answer<?= $counter;?>" placeholder="Введите ответ">

  <?php $counter++;?>
  <?php endforeach;?>
  <input type="submit" value="Отправить">
</form>

<?php endif; ?>
</body>
</html>

<?php
$data = ['answer1' => 'Лондон',
          'answer2' => 'Красный',
          'answer3' => '12',
          'answer4' => 'Ширли',
  ];
if (!empty($_POST))  {
  $counter = 1;
  foreach ($questions as $question => $val) {
    echo $question;
    $answer = $_POST['answer' . $counter];
    if ($answer == $val) {
      echo "<p style=\"color:forestgreen;\">Ваш ответ \"$val\" верный</p><br/>";
    } else {
      echo "<p style=\"color:red;\">Ответ \"$answer\" НЕ верный.</p><br/>";
    }
    $counter++;
  }

  echo "<a href=\"$_SERVER[SCRIPT_NAME]\">Вернуться к форме</a>";
}

?>




