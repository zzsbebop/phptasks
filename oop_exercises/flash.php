<?php

/**
 * Class Flash
 *
 * methods:
 * setMessage(write message into SESSION)
 * getMessage(read message from SESSION)
 */
class Flash {
  /**
   * @var
   */
  private $session;

  /**
   * Flash constructor.
   */
  public function __construct() {
    $this->session = new MySession;
  }

  /**
   * @param $name
   * @param $message
   */
  public function setMessage($name, $message): void {
    $this->session->create($name, $message);
  }

  /**
   * @param $name
   *
   * @return string
   */
  public function getMessage($name) {
    return $this->session->get($name);
  }

  /**
   * @return mixed
   */
  public function getSession() {
    return $this->session;
  }

  /**
   * @param mixed $session
   */
  public function setSession($session): void {
    $this->session = $session;
  }
}
