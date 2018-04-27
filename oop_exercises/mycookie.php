<?php

class MyCookie
{

  /**
   * @var
   */
  public $timeExpired;

  /**
   * MyCookie constructor.
   *
   * @param $time
   */
  public function __construct ($time) {
    $this->timeExpired = $time;
  }

  /**
   * @param $name
   * @param $value
   *
   */
  public function setMyCookie ($name, $value): void {
    if (!isset($_COOKIE[$name])){
      setcookie($name, $value, time() + $this->timeExpired);
    }

  }

  /**
   * @param $name
   *
   * @return mixed
   */
  public function getMyCookie ($name) {
    $cookie = $_COOKIE[$name] ?? null;
    return $cookie;
  }

  /**
   * @param $name
   */
  public function delMyCookie ($name): void {
    if (isset($_COOKIE[$name])) {
      setcookie($name, '', time() - $this->timeExpired);
    }
  }
}

