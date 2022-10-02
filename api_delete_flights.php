<?php

if( ! isset($_POST['flight_id']) ){
    http_response_code(400);
    echo json_encode(['info'=>'flight_id missing']);
    exit();
  }
  
  if( ! ctype_digit($_POST['flight_id']) ){
    http_response_code(400);
    echo json_encode(['info'=>'flight_id must be a digit']);
    exit();  
  }
  $id = $_POST['flight_id'] ?? 0;
  
  try{
    $db = new PDO('sqlite:'.__DIR__.'/momondo.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $db->prepare('DELETE FROM table_flights WHERE flight_id = :flight_id');
    $q->bindValue(':flight_id', $_POST['flight_id']);
    $q->execute();

    echo json_encode(['info'=>$_POST['flight_id']]);
    exit();
  }catch(Exception $ex){
    http_response_code(500);
    echo json_encode(['info'=>'System under maintainance']);
    exit();  
  }
  
  
  