<?php
/*Дан массив с вопросами и правильными ответами. Реализуйте тест: выведите на экран все вопросы, под каждым инпут.
Пользователь читает вопрос, пишет свой ответ в инпут. Когда вопросы заканчиваются - он жмет на кнопку, страница
обновляется и вместо инпутов под вопросами появляется сообщение вида: 'ваш ответ: ... верно!' или 'ваш ответ: ... неверно!
Правильный ответ: ...'. Правильно отвеченные вопросы должны гореть зеленым цветом, а неправильно - красным.*/

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

<form action="form_input.php" method="POST">
    <input type="text" name="answer<?= $counter;?>" placeholder="Введите ответ">

  <?php $counter++;?>
  <?php endforeach;?>
  <input type="submit" name="submit" value="Отправить">
</form>

<?php endif; ?>
</body>
</html>

<?php

if (isset($_POST['submit']))  {
  $counter = 1;
  foreach ($questions as $question => $val) {
    echo $question;
    $answer = $_POST['answer' . $counter] ?? '';
    if ($answer == $val) {
      echo "<p style=\"color:forestgreen;\">Ответ \"$val\" верный</p><br/>";
    } else {
      echo "<p style=\"color:red;\">Ответ \"$answer\" НЕ верный.</p><br/>";
    }
    $counter++;
  }

  echo "<a href=\"$_SERVER[SCRIPT_NAME]\">Вернуться к форме</a>";
}

?>




