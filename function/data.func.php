<?php

/**
* 按json方式输出通信数据
* @param integer $code 状态码
* @param string $message 提示信息
* @param array $data 数据
* return string
*/

function json($code, $message = '', $data = array()) {
  if(!is_numeric($code)) {
    return "";
  }

  $result = array(
    'code' => $code,
    'message' => $message,
    'data' => $data
  );
  return json_encode($result);
}

/**
* 按xml方式输出通信数据
* @param integer $code 状态码
* @param string $message 提示信息
* @param array $data 数据
* return string
*/

function xml($code, $message = '', $data = array()) {
  if(!is_numeric($code)) {
    return '';
  }

  $result = array(
    'code' => $code,
    'message' => $message,
    'data' => $data
  );

  $xml = "<?xml version='1.0' encoding='utf-8'?>\n";
  $xml .= "<root>\n";
  $xml .= xmlEncode($result);
  $xml .= "</root>\n";
  return $xml;
}

function xmlEncode($data) {
  $xml = $arr = '';
  foreach ($data as $key => $value) {
    if(is_numeric($key)) {
      $arr = " id='{$key}'";
      $key = "item";
    }
    $xml .= "<{$key}{$arr}>\n";
    $xml .= is_array($value) ? xmlEncode($value) : $value;
    $xml .= "</{$key}>\n";
  }
  return $xml;
}
