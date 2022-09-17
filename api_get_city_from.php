<?php
try{
    $from_city = $_GET['from_city'] ?? 0;
    
    // Connect to the database
    $db = new PDO('sqlite:'.__DIR__.'/_momondo.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $db->prepare('SELECT * FROM table_cities WHERE city_name LIKE :from_city');
    $q->bindValue(':from_city','%'.$from_city.'%');
    $q->execute();
    $flights = $q->fetchAll(PDO::FETCH_ASSOC);
   
    echo json_encode($flights);
  }catch(Exception $ex){
     echo $ex;
    http_response_code(400);
    echo json_encode(['info'=>'upppsss...']);
  }

// if (! $from_city)) {
//   http_response_code(400);
//   echo json_encode(['info'=>'Missing search']);
//   exit();
// };