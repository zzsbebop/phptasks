<html>
<body>
<h4>Узнайте день недели.</h4>
<?php if ($_SERVER['REQUEST_METHOD'] == 'GET'): ?>
<form action="" method="POST">
  Введите число: <input type="number" min="1" max="31" step="1" name="day" title="number"><br>
  Введите месяц: <input type="text" name="month" title="number"><br>
  Введите год: <input type="number" name="year" min="1990" max="2025" step="1" title="number"><br>
<input type="submit">
</form>
<?php endif;?>
</body>
</html>

<?php

function getWeekDay($day, $month, $year) {
  $weekDays = [
    1 => "понедельник",
    "вторник",
    "среда",
    "четверг",
    "пятница",
    "суббота",
    "воскресенье",
  ];
  $weekDayNumber = date("N", mktime(0, 0, 0, $month, $day, $year));
  $weekDay = $weekDays[$weekDayNumber];

  return "<h3> \"$weekDay\" </h3>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $day = (isset ($_POST['day'])) ? $_POST['day'] : 'invalid input';
  $month = (isset ($_POST['month'])) ? $_POST['month'] : 'invalid input';
  $year = (isset ($_POST['year'])) ? $_POST['year'] : 'invalid input';
  echo getWeekDay($day, $month, $year);
}
echo "<a href=\"$_SERVER[SCRIPT_NAME]\">Вернуться к форме</a>";
