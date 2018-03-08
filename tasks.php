<!--Напишите скрипт, который будет находить корни квадратного уравнения.
Для этого сделайте 3 инпута, в которые будут вводиться коэффициенты уравнения. -->


<html>
<body>
<h4>Решение квадратного уравнения.</h4>
<?php if ($_SERVER['REQUEST_METHOD'] == 'GET'): ?>
  <b><i>ax<sup><small>2</small></sup> + bx + c = 0</i></b>
<form action="" method="POST">
  Введите коэффициент - а: <input type="text" name="a" title="number"><br>
  Введите коэффициент - b: <input type="text" name="b" title="number"><br>
  Введите коэффициент - c: <input type="text" name="c" title="number"><br>
<input type="submit">
</form>
<?php endif;?>
</body>
</html>

<?php
var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (is_numeric($_POST['a'])) {
    $a = $_POST['a'];
  } else {
    echo 'Введите число !';
  }
  if (is_numeric($_POST['b'])) {
    $b = $_POST['b'];
  } else {
    echo 'Введите число !';
  }
  if (is_numeric($_POST['c'])) {
    $c = $_POST['c'];
  } else {
    echo 'Введите число !';
  }
  $result = quadraticEquation($a, $b, $c);
  echo 'Ответ: ' . "<br/>" . $result . "<br/>";

}

echo "<a href=\"$_SERVER[SCRIPT_NAME]\">Вернуться к форме</a>";

function diskriminant ($a, $b, $c) {

  return pow($b, 2) - (4 * $a * $c);
}

function quadraticEquation($a, $b, $c) {
  $d = diskriminant($a, $b, $c);
  if ($d > 0) {
    //вычисляем корни уравнения
    $res1 = (-$b + sqrt($d)) / (2 * $a);
    $res2 = (-$b - sqrt($d)) / (2 * $a);
    return 'x1 = ' . $res1 . "<br/>" . 'x2 = ' . $res2 . "<br/>";
  }
  elseif ($d == 0) {
    //вычисляем 1 корень (x1 = x2)

    return 'x1 = x2 = ' . '-(' . $b . '/' . 2*$a .')' . "<br/>";
  }
  else {
    //корней нет
    return 'Корней на множестве действительных чисел нет.' . "<br/>";
  }
}
?>
