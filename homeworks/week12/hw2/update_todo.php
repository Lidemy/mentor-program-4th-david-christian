<?php
  require_once('conn.php');
  header('Content-type:application/json;charset=utf-8');
  header('Access-Control-Allow-Origin: *');
  if (
    empty($_POST['id'] || $_POST['todo'])
  ) {
    $json = array (
      "ok" => false, 
      "message" => "Please add id in url"
    );

    $response = json_encode($json);
    echo $response;
    die();
  }

  $id = intval($_POST['id']);
  $todo = $_POST['todo'];
  
  $sql = "update davidchristian_w12_hw2_todo set todo = ? where id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('si', $todo, $id);
  $result = $stmt->execute();

  if (!$result) {
    $json = array(
      "ok" => false, 
      "message" => $conn->error
    );
    $response = json_encode($json);
    echo $response;
    die();
  }
  $json = array(
    "ok" => true
  );

  $response = json_encode($json);
  echo $response;
?>