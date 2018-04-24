<?php

/**
 * Class saves input data after sending, in case something goes wrong.
 *
 */

class SmartForm extends Form
{

  /**
   * @var array
   */
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
    $value = $this->input['input'] ?? null;

    return "<input type=\"$type\" name=\"$name\" placeholder=\"$placeholder\" value=\"$value\"><br />";
  }

  /**
   * @param $params
   *
   * @return string
   */
  public function textarea ($params): string {
    $placeholder = $params['placeholder'] ?? 'Textarea';
    $name = $params['name'] ?? 'textarea';
    $value = $this->input['message'] ?? null;

    return "<textarea name=\"$name\" placeholder=\"$placeholder\">$value</textarea><br />";
  }

  /**
   * @param $rawdata
   */
  public function processInput($rawdata): void {
    if (!empty($rawdata)) {
      foreach ($rawdata as $key => $value) {
        $this->input[$key] = $value;
      }
    }
  }

}
