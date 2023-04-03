<?php

require_once "dbConnect.php";

$conn = new dbConnect;
$slots = $conn->get_slots_available();
//$tickets = $conn->Tickets();

$two_wheeler_slots = $slots['two_wheeler'];
$four_wheeler_slots = $slots['four_wheeler'];

$current_tickets = $conn->get_tickets();
//print_r($current_tickets);
//die();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="index.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body onload="callCount()">
  <div class="back">
    <div class="container">
      <div class="contents">
        <div class="section1">
          <div class="head">
            <h3>Availability - </h3>
          </div>
          <div class="data">
            <div class="2_wheeler">
              <h2>2 WHEELERS: </h2>
              <p>No. of Slots Available - </p>
              <p><?php echo $two_wheeler_slots ?></p>
            </div>
            <div class="4_wheeler">
              <h2>4 WHEELERS: </h2>
              <p>No. of Slots Available - </p>
              <p><?php echo $four_wheeler_slots ?></p>
            </div>
          </div>

        </div>
        <div class="section2">
          <div class="head">
            <h3>Tickets</h3>
          </div>
          <div class="data">
            <table>
              <thead>
                <tr>
                  <th>Slot Number</th>
                  <th>Vehicle Number</th>
                  <th>Time of Entry</th>
                  <th>Time of Exit</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($current_tickets as $d) {
                  $slot_id = $d['slot_id'];
                  $vehicle_no = $d['vehicle_number'];
                  $entry_time = $d['entry_time'];
                  $exit_time = $d['exit_time'];
                  $status = "Occupied";
                echo "<tr>
                      <th>$slot_id</th>
                      <td>$vehicle_no</td>
                      <td>$entry_time</td>
                      <td>$exit_time</td>
                      <td>$status</td>
                      </tr>";
                } 
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="section3">
          <div class="head">
            <h3>Booking</h3>
          </div>
          <div class="data">
            <form action="book.php" method="post" >
            <label class="label" for="vehiclenumber"> Vehicle Number</label>
            <input type="text" id="vehiclenumber" name="vehiclenumber"><br>
              <p>Type of Vehicle</p>
              <input type="radio" id="vehicletype" name="vehicletype" value="2-wheeler">
              <label class="label" for="vehicletype"> Bike</label>
              <input class="input" type="radio" id="vehicletype" name="vehicletype" value="4-wheeler">
              <label class="label" for="vehicletype"> Car</label><br>
              <input class="submit" id="submut" name="submit" type="submit" value="Book">
            </form>
          </div>
        </div>
        <div class="section4"></div>
      </div>
    </div>
  </div>
</body>

</html>
