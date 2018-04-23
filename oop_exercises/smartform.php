<?php

/**
 * Class saves input data after sending, in case something goes wrong.
 *
 */


class SmartForm extends Form {

  private $input = [];

  /**
   * @return array
   */
  public function getInput(): array {
    return $this->input;
  }

  /**
   * @param array $input
   */
  public function setInput(array $input): void {
    $this->input = $input;
  }

  public function input ($params) {
    $type = $params['type'] ?? null;
    $name = $params['name'] ?? null;
    $placeholder = $params['placeholder'] ?? 'Enter Text';
    $value = $this->input['input'] ?? null;

    return "<input type=\"$type\" name=\"$name\" placeholder=\"$placeholder\" value=\"$value\"><br />";
  }

  public function textarea ($params) {
    $placeholder = $params['placeholder'] ?? null;
    $name = $params['name'] ?? 'textarea';
    $value = $this->input['message'] ?? null;

    return "<textarea name=\"$name\" placeholder=\"$placeholder\">$value</textarea><br />";
  }

  /**
   * @param $rawdata
   */
  public function processInput($rawdata) {
    if (!empty($rawdata)) {
      foreach ($rawdata as $key => $value) {
        $this->input[$key] = $value;
      }
    }
  }

}
