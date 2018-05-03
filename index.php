<?php

require_once 'oop_exercises/mysession.php';
require_once 'oop_exercises/flash.php';

$flash = new Flash();
$flash->setMessage('message', 'operation finished OK');
echo $flash->getMessage('message');






