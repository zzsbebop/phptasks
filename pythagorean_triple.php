<!--
Даны 3 инпута. В них вводятся числа. Проверьте, что эти числа являются тройкой Пифагора:
квадрат самого большого числа должен быть равен сумме квадратов двух остальных.
-->


<html>
<body>
<h4>Проверьте, что эти числа являются тройкой Пифагора.</h4>
<?php if ($_SERVER['REQUEST_METHOD'] == 'GET'): ?>
  <b><i>x<sup><small>2</small></sup> + y<sup><small>2</small></sup> = z<sup><small>2</small></sup></i></b>
<form action="" method="POST">
  Введите число X: <input type="text" name="x" title="number"><br>
  Введите число Y: <input type="text" name="y" title="number"><br>
  Введите число Z: <input type="text" name="z" title="number"><br>
<input type="submit">
</form>
<?php endif;?>
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (is_numeric($_POST['x'])) {
    $x = intval($_POST['x']);
  } else {
    echo 'Введите число !';
  }
  if (is_numeric($_POST['y'])) {
    $y = intval($_POST['y']);
  } else {
    echo 'Введите число !';
  }
  if (is_numeric($_POST['z'])) {
    $z = intval($_POST['z']);
  } else {
    echo 'Введите число !';
  }

  echo "<h3 style=\"color:blue;\">Ответ: </h3>"  . isPythagoreanTriple ($x, $y, $z) . "<br/>";

}

echo "<a href=\"$_SERVER[SCRIPT_NAME]\">Вернуться к форме</a>";

function isPythagoreanTriple ($x, $y, $z) {
  if (pow($x, 2) == (pow($y,2) + pow($z, 2)) ||
      pow($y, 2) == (pow($x,2) + pow($z, 2)) ||
      pow($z, 2) == (pow($y,2) + pow($x, 2))) {
    return "<p style=\"color:forestgreen;\">Числа являются тройкой Пифагора</p><br/>";
  } else {
    return "<p style=\"color:red;\">Числа не являются тройкой Пифагора.</p><br/>";
  }
}
?>
