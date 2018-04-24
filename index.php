<?php

require_once 'oop_exercises/form.php';
require_once 'oop_exercises/smartform.php';

$smartform = new SmartForm();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  try {
    echo $smartform->open(['action' => 'index.php', 'method' => 'POST']);
  } catch (Throwable $t) {
    echo $t->getMessage();
  }
  try {
    echo $smartform->input(['name' => 'input', 'type' => 'text', 'placeholder' => 'Dummy Text']);
  } catch (Throwable $t) {
    echo $t->getMessage();
  }
  echo $smartform->textarea(['name' => 'message', 'placeholder' => 'Dummy Text']);
  echo $smartform->submit(['value' => 'Send']);
  echo $smartform->close();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $smartform->processInput($_POST);
  try {
    echo $smartform->open(['action' => 'index.php', 'method' => 'POST']);
  } catch (Throwable $t) {
    echo $t->getMessage();
  }
  try {
    echo $smartform->input(['name' => 'input', 'type' => 'text', 'placeholder' => 'Dummy Text']);
  } catch (Throwable $t) {
    echo $t->getMessage();
  }
  echo $smartform->textarea(['name' => 'message', 'placeholder' => 'Dummy Text']);
  echo $smartform->submit(['value' => 'Send']);
  echo $smartform->close();
  echo 'Форма отправлена.';
}





