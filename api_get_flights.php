<?php
require_once __DIR__."/_x.php"

?>



<?php
try{
    $from_city = $_GET['from_city'];
    $to_city = $_GET['to_city'];

    // Connect to the database
    $db = new PDO('sqlite:'.__DIR__.'/momondo.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $db->prepare('SELECT * FROM table_flights WHERE departure_city LIKE :from_city AND arrival_city LIKE :to_city LIMIT 10' );
    $q->bindValue(':from_city','%'.$from_city.'%');
    $q->bindValue(':to_city','%'.$to_city.'%');
    $q->execute();
    $flights = $q->fetchAll(PDO::FETCH_ASSOC);
   
    echo json_encode($flights);
  }catch(Exception $ex){
    echo $ex;
    http_response_code(400);
    echo json_encode(['info'=>'upppsss...']);
  };