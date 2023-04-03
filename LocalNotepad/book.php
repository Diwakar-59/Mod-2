<?php 
require_once "dbConnect.php";

$obj = new dbConnect;

$conn = $obj->connect();
//print_r($_POST);
$current_slots = $obj->get_slots_available();
$vehicle_type = $_POST['vehicletype'];
$vehicle_number = $_POST['vehiclenumber'];

if (isset($_POST['submit'])) {
  $current = "select NOW()";
  $res = $conn->query($current);
  //print_r($res);
  $entry_time = [];
    foreach($res as $r){
      $entry_time[] = $r;
    }
  $entry_time = $entry_time[0]['NOW()'];

  $sql = "insert into Tickets(vehicle_type, vehicle_number, 
  entry_time) values ( '$vehicle_type', '$vehicle_number', '$entry_time' )";

  $insert = $conn->query($sql);
  if ($insert) {
    if($vehicle_type == '2-wheeler') {
      $current_slots = $current_slots['two_wheeler'];
      $current_slots = $current_slots - 1;
      $sql = "update Slots set two_wheeler = '$current_slots'";
      $res = $conn->query($sql);
      if($res) {
        echo '<script>alert("Parking slot booked!!")</script>';
      }
    }
    if($vehicle_type == '4-wheeler') {
      $current_slots = $current_slots['four_wheeler'];
      $current_slots = $current_slots - 1;
      $sql = "update Slots set four_wheeler = '$current_slots'";
      $res = $conn->query($sql);
      if($res) {
        echo '<script>alert("Parking slot booked!!")</script>';
      }
    }
    
  }

}

?>

<a href="index.php"> Go Back!!!</a>
