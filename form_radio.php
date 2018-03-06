<?php
/*
 * Пусть теперь тест показывает варианты ответов и радиокнопочки.
 * Пользователь должен выбрать один и вариантов.
 */

$data = [
  'Назовите столицу Англии?' => ['right' => 'Лондон',
                                'option1' => 'Амстердам',
                                'option2' => 'Мельбурн'],
  'Какого цвета томат?' => ['right' => 'Красный',
                            'option1' => 'Жёлтый',
                            'option2' => 'Томатный'],
  'Сколько месяцев в году?' => ['right' => '12',
                                'option1' => '24',
                                'option2' => '13'],
  'Назовите имя пресонажа из популярного романа Артура Конан-Дойля?' => ['right' => 'Шерлок',
                                                                        'option1' => 'Доктор Хаус',
                                                                        'option2' => 'Тарзан']
];

?>
<!doctype html>
<html>
<body>
<?php if ($_SERVER['REQUEST_METHOD'] == 'GET'): ?>

  <h2>Отвечайте на вопросы!</h2>

  <?php $counter = 1;?>
  <form action="form_radio.php" method="POST">
<?php foreach ($data as $question => $answer): ?>

      <p><?= $question; ?></p>

  <?php foreach ($answer as $key => $value): ?>
    <label>
      <input type="radio" name="<?='option' . $counter;?>" value="<?= $value;?>">
      <?= $value;?>
    </label><br>
  <?php endforeach;?>
  <?php $counter++;?>

  <?php endforeach;?>
  <br>
  <input type="submit" name="submit" value="Отправить">
  </form>

<?php endif; ?>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
  $counter = 1;
  foreach ($data as $question => $val) {
    echo $question;
    $answer = $_POST['option' . $counter] ?? '';
    if ($answer == $val['right']) {
      echo "<p style=\"color:forestgreen;\">Ваш ответ \"$answer\" верный</p><br/>";
    } else {
      echo "<p style=\"color:red;\">Ответ \"$answer\" НЕ верный.</p><br/>";
    }
    $counter++;
  }
  echo "<a href=\"$_SERVER[SCRIPT_NAME]\">Вернуться к форме</a>";
}

?>




