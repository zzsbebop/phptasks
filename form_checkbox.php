<?php
/* №18
 * Модифицируем предыдущую задачу: пусть теперь на один вопрос может быть несколько правильных ответов.
 * Пользователь должен отметить один или несколько чекбоксов.
 */

$data = [
  'Выберите опреационные системы?' => ['right' => ['Android', 'Ubuntu'],
                                'options' => ['Western Union', 'Doom']],
  'Перечислите планеты нашей солнечной системы?' => ['right' => ['Марс', 'Венера'],
                            'options' => ['Солнце', 'Антарес']],
  'Из чего состоит молекула воды?' => ['right' => ['Водород', 'Кислород'],
                                'options' => ['Азот', 'Хлорид Натрия']],
  'Назовите имя пресонажа из популярного романа Артура Конан-Дойля?' => ['right' => ['Шерлок', 'Доктор Мориарти'],
                                                                        'options' => ['Доктор Хаус', 'Тарзан']]
        ];

?>
<!doctype html>
<html>
<body>
<?php if ($_SERVER['REQUEST_METHOD'] == 'GET'): ?>

  <h2>Отвечайте на вопросы!</h2>

  <?php $counter = 1;?>
  <form action="form_checkbox.php" method="POST">
<?php foreach ($data as $question => $answer): ?>

      <p><?= $question; ?></p>

  <?php foreach ($answer as $key => $value): ?>
    <?php foreach ($value as $option): ?>
    <label>
      <input type="checkbox" name="<?='answer' . $counter;?>[]" value="<?= $option;?>">
      <?= $option;?>
    </label><br>
    <?php endforeach;?>
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
    echo 'Вопрос: ' . $question . "<br/>";
    $answer = $_POST['answer' . $counter] ?? [];
    if (!empty($answer)) {
      foreach ($answer as $opt) {
        if (in_array($opt, $val['right'])) {
          echo "<p style=\"color:forestgreen;\">Ваш ответ \"$opt\" верный</p><br/>";
        } else {
          echo "<p style=\"color:red;\">Ответ \"$opt\" НЕ верный.</p><br/>";
        }
      }
    } else {
      echo "<p style=\"color:red;\">Вы не ответили на вопрос.</p><br/>";
    }
    $counter++;
  }
  echo "<a href=\"$_SERVER[SCRIPT_NAME]\">Вернуться к форме</a>";
}

?>




