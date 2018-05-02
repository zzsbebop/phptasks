<?php

require_once 'oop_exercises/mysession.php';

$sess = new MySession();
$sess->create('sessID', '999');
$sess->create('usrID', '0023');
$sess->delete('usrID');
echo $sess->get('sessID');

print_r ($_SESSION);




