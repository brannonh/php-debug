<?php

class Debug {
  private $filename;
  private $data;
  private $max_entries;

  public function __construct($filename = 'debug.log', $data = array(), $max_entries = 500) {
    $this->filename = $filename;
    $this->data = is_array($data) ? $data : array($data);
    $this->max_entries = $max_entries;
  }

  public function count($key) {
    $data = $this->data[$key];

    if (empty($data)) {
      return 0;
    } else if (is_string($data)) {
      return strlen($data);
    } else if (is_array($data)) {
      return count($data);
    }

    return 0;
  }

  public function is_empty($key) {
    return empty($this->data[$key]);
  }

  public function decrease($key, $val = 1) {
    $this->data[$key] -= $val;
  }

  public function get($key) {
    return array_key_exists($key, $this->data) ? $this->data[$key] : false;
  }

  public function increase($key, $val = 1) {
    $this->data[$key] += $val;
  }

  public function log($data) {
    $file = $this->get_log_contents();

    if ($file !== false) {
      $file = $this->unserialize($file);

      if (!is_array($data) || $this->valid_log_entry($data)) {
        $data = array($data);
      }

      foreach ($data as $datum) {
        if ($this->valid_log_entry($datum)) {
          array_push($file, $datum);
        } else {
          array_push($file, $this->get_log_entry($datum));
        }
      }

      $entries = count($file);
      if ($entries > $this->max_entries) {
        $file = array_slice($file, $entries - $this->max_entries);
      }

      try {
        $debug_log = fopen($this->filename, 'w');
        fwrite($debug_log, $this->serialize($file));
        fclose($debug_log);
      } catch (Exception $ex) {
        // Ignore.
      }
    }
  }

  public function log_all() {
    $this->log_data(array_keys($this->data));
  }

  public function log_data($keys) {
    if (!is_array($keys)) {
      $keys = array($keys);
    }

    $entries = array();

    foreach ($keys as $key) {
      array_push($entries, $this->get_log_entry($this->data[$key], $key));
    }

    $this->log($entries);
  }

  public function merge($key, $data) {
    $this->data[$key] = array_merge($this->data[$key], $data);
  }

  public function set($key, $data) {
    $this->data[$key] = $data;
  }

  private function get_log_contents() {
    try {
      if (!file_exists($this->filename)) {
        touch($this->filename);
      }

      return file_get_contents($this->filename);
    } catch (Exception $ex) {
      return false;
    }
  }

  private function get_log_entry($data, $name = null) {
    return array(
      'timestamp' => date('Y/m/d H:i:s'),
      'name' => $name,
      'data' => $data,
    );
  }

  private function serialize($data) {
    return serialize($data);
  }

  private function unserialize($data) {
    $result = unserialize($data);
    if ($result === false) {
      $result = array();
    }

    return $result;
  }

  private function valid_log_entry($data) {
    return is_array($data)
      && array_key_exists('timestamp', $data)
      && array_key_exists('name', $data)
      && array_key_exists('data', $data);
  }
}
