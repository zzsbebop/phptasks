<?php
/**
 * Class Form
 * Form builder
 */

class Form
{

  /**
   * @param $params
   * @throws
   * @return string
   */
  public function open($params): string {
    $action = $params['action'] ?? "";
    if (! ($params['method'] == 'POST' || $params['method'] == 'GET'))  {
      throw new Exception("Необходимо указать Method");
    }
    $method = $params['method'];

    return "<form action=\"$action\" method=\"$method\"><br />";
  }

  /**
   * @return string
   */
  public function close (): string {
    return "</form><br />";
  }

  /**
   * @param $params
   * @throws
   * @return string
   */
  public function input ($params): string {
    if (empty($params['type'])) {
      throw new Exception("Необходимо указать Type");
    }
    $type = $params['type'];
    if (empty($params['name'])) {
      throw new Exception("Необходимо указать Name");
    }
    $name = $params['name'];
    $placeholder = $params['placeholder'] ?? 'Enter Text';

    return "<input type=\"$type\" name=\"$name\" placeholder=\"$placeholder\" value=\"\"><br />";
  }

  /**
   * @param $params
   * @throws
   * @return string
   */
  public function password ($params): string {
    $placeholder = $params['placeholder'] ?? 'enter password';
    if (empty($params['name'])) {
      throw new Exception("Необходимо указать Name");
    }
    $name = $params['name'];

    return "<input type=\"password\" placeholder=\"$placeholder\" name=\"$name\"><br />";
  }

  /**
   * @param $params
   *
   * @return string
   */
  public function textarea ($params): string {

    $placeholder = $params['placeholder'] ?? 'Enter Text';
    $name = $params['name'] ?? 'textarea';
    return "<textarea name=\"$name\" placeholder=\"$placeholder\"></textarea><br />";
  }

  /**
   * @param $params
   *
   * @return string
   */
  public function submit ($params): string {
    $value = $params['value'] ?? 'Отправить';
    return "<input type=\"submit\" value=\"$value\"><br />";
  }
}



