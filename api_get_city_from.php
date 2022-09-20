<?php
require_once __DIR__."/_x.php"

?>



<?php
try{
    if (!isset($_GET['from_city'])) {
      http_response_code(400);
      echo json_encode(['info'=>'Missing key search ']);
      exit();
    };
    if ( ! strlen($_GET['from_city']) >  _FROM_FLIGHT_MIN_LEN) {
      http_response_code(400);
      echo json_encode(['info'=>'search must be atleast 3 characters']);
      exit();
    };

    $from_city = $_GET['from_city'];

    // Connect to the database
    $db = new PDO('sqlite:'.__DIR__.'/momondo.db');
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
  };