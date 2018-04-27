<?php

require_once 'oop_exercises/mycookie.php';

$time = 60*60*24;
$mycookie = new MyCookie($time);

$mycookie->setMyCookie('lang', 'ua');

if (isset($_COOKIE['lang'])) {
  $mycookie->delMyCookie('lang');
}

echo 'Cookie: ' . $mycookie->getMyCookie('lang');




