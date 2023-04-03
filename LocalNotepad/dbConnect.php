<?php

class dbConnect {

  public function connect() {
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "Notepad";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
  }

  public function get_slots_available() {
    $conn = $this->connect();
    $sql1 = "select two_wheeler, four_wheeler from Slots";
    $res = $conn->query($sql1);
    $slots = [];
    foreach ($res as $r) {
      $slots = $r;
    }
    if ($res) {
      return $slots;
    }
  }

  public function get_tickets() {
    $conn = $this->connect();
    $sql = 'select * from Tickets order by slot_id desc';
    $res = $conn->query($sql);
    //print_r($res);
    //die();
    $tickets = [];
    foreach($res as $r) {
      $tickets[] = $r;
    }
    //print_r($tickets);
    //die();
    return $tickets;
  }
}

?>
