<!--Напишите скрипт, который будет считать факториал числа.
Само число вводится в инпут и после нажатия на кнопку пользователь должен увидеть результат.-->


<html>
<body>
<h4>Узнайте факториал числа.</h4>
<?php if ($_SERVER['REQUEST_METHOD'] == 'GET'): ?>
<form action="" method="POST">
  Введите число: <input type="text" name="number" title="number"><br>
<input type="submit">
</form>
<?php endif;?>
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if ((filter_has_var(INPUT_POST, 'number') && (strlen(filter_input(INPUT_POST, 'number')) > 0))) {
    $number = $_POST['number'];
    echo 'Ответ: ' . factorialis($number) . "<br/>";
  }
  else {
    echo "ВВедите число<br/>";
  }
}
echo "<a href=\"$_SERVER[SCRIPT_NAME]\">Вернуться к форме</a>";

function factorialis($n) {
  if ($n < 1) {
    return 'отрицательное число нельзя' . "<br/>";
  }
  elseif ($n == 0 || $n == 1) {
    return $n;
  }
  else {
    $f = 1;
    for ($i = 1; $i <= $n; $i++) {
      $f *= $i;
    }
    return $f;
  }
}
?>
