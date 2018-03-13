<?php

/*Дан инпут и кнопка. В инпут вводится число. По нажатию на кнопку выведите список делителей этого числа. */

?>

  <html>
  <body>
  <h4>Узнайте делители числа.</h4>
  <?php if ($_SERVER['REQUEST_METHOD'] == 'GET'): ?>
    <form action="" method="POST">
      Введите число от 1 до 1000: <input type="number" name="number" title="number"><br>
      <input type="submit" value="Вычислить делители">
    </form>
  <?php endif;?>
  </body>
  </html>

<?php

function deviders($number) {
  $output = [];
  for ($i = 1; $i <= $number; $i++){
    if ($number % $i == 0){
      $output[] = $i;
    }
  }

  return $output;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset ($_POST['number']) && $_POST['number'] > 0) {
    $number = $_POST['number'];
    $deviders = deviders($number);
    foreach ($deviders as $number) {
      echo "$number ";
    }
  } else {
    echo 'invalid input';
  }
}
echo "<br/>";
echo "<a href=\"$_SERVER[SCRIPT_NAME]\">Вернуться к форме</a>";
var_dump($_POST['number']);

