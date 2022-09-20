<?php
try{
    $to_city = $_GET['to_city'] ?? 0;
    
    // Connect to the database
    $db = new PDO('sqlite:'.__DIR__.'/momondo.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $db->prepare('SELECT * FROM table_cities WHERE city_name LIKE :to_city');
    $q->bindValue(':to_city','%'.$to_city.'%');
    $q->execute();
    $flights = $q->fetchAll(PDO::FETCH_ASSOC);
   
    echo json_encode($flights);
  }catch(Exception $ex){
     echo $ex;
    http_response_code(400);
    echo json_encode(['info'=>'upppsss...']);
  }