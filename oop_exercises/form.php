<?php
/**
 * Class Form
 * Form builder
 */

class Form {

  public function open($params) {
    $action = $params['action'] ?? "";
    $method = $params['method'] ?? null;
    return "<form action=\"$action\" method=\"$method\"><br />";
  }

  public function close () {
    return "</form><br />";
  }

  public function input ($params) {
    $type = $params['type'] ?? null;
    $name = $params['name'] ?? null;
    $placeholder = $params['placeholder'] ?? 'Enter Text';

    return "<input type=\"$type\" name=\"$name\" placeholder=\"$placeholder\" value=\"\"><br />";
  }

  public function password ($params) {
    $placeholder = $params['placeholder'] ?? 'password';
    $name = $params['name'] ?? null;
    return "<input type=\"password\" placeholder=\"$placeholder\" name=\"$name\"><br />";
  }

  public function textarea ($params) {
    $placeholder = $params['placeholder'] ?? null;
    $name = $params['name'] ?? 'textarea';
    return "<textarea name=\"$name\" placeholder=\"$placeholder\"></textarea><br />";
  }

  public function submit ($params) {
    $value = $params['value'] ?? 'Отправить';
    return "<input type=\"submit\" value=\"$value\"><br />";
  }
}



