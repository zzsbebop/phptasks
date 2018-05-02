<?php

/**
 * Class MySession
 *
 * методы:
 * создать переменную сессии,
 * получить переменную,
 * удалить переменную сессии,
 * проверить наличие переменной сессии.
 */
class MySession
{

  /**
   * MySession constructor.
   */
  public function __construct() {
    session_start();
  }

  /**
   * @param $var
   * @param $data
   */
  public function create($var, $data): void {
    if (!isset($_SESSION[$var])) {
      $_SESSION[$var] = $data;
    }
  }

  /**
   * @param $var
   *
   * @return string
   */
  public function get($var) {
    if ($this->check($var)) {
      return $_SESSION[$var];
    } else {
      return 'index not found';
    }
  }

  /**
   * @param $var
   */
  public function delete($var): void {
    if (isset($_SESSION[$var])) {
      unset($_SESSION[$var]);
    }
  }

  /**
   * @param $var
   *
   * @return bool
   */
  public function check($var): bool {
    return isset($_SESSION[$var]);
  }

}
