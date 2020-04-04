<form action="createorder.html" method="post">
    <input type="submit" value="Back">
</form>

<html>
    <h2>This is your</h2>
    <br>
</html>

<?php

function showThisOrder($obConn,$sql) {
  $rsResult = mysqli_query($obConn, $sql) or die(mysqli_error($obConn));
  if(mysqli_num_rows($rsResult)>0) {
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"2\"cellpadding=\"0\"><tr align=\"center\" bgcolor=\"#CCCCCC\">";
    $i = 0;

    //retrive field names
    while ($i < mysqli_num_fields($rsResult)) {
      $field = mysqli_fetch_field_direct($rsResult, $i);
      $fieldName=$field->name;
      echo "<td><strong>$fieldName</strong></td>";
      $i = $i + 1;
    }

    //field names retrieved. now dump info
    $bolWhite=true;
    while ($row = mysqli_fetch_assoc($rsResult)) {
      echo $bolWhite ? "<tr bgcolor=\"#CCCCCC\">" : "<tr bgcolor=\"#FFF\">";
        $bolWhite = !$bolWhite; 
        foreach ($row as $data) {
          echo "<td>$data</td>"; 
        }
        echo "</tr>";
    }

  }

}

include 'connect.php';
$conn = OpenCon();

$order_id = $_POST['order_id'];
$customer_id = $_POST['customer_id'];
$eid = $_POST['eid'];
$i_date = $_POST['initial_date'];
$d_date = $_POST['delivery_date'];
$priority = $_POST['priority'];
$status = $_POST['delivery_status'];
$pricing = $_POST['pricing'];
$receiver_id = $_POST['receiver_id'];

$sql = "INSERT INTO DeliveryOrder
        VALUES ('%$order_id%', 
                '%$customer_id%', 
                '%$eid%', 
                '%$i_date%', 
                '%$d_date%', 
                '%$priority%', 
                '%$status%', 
                '%$pricing%', 
                '%$receiver_id%'
        ";
showThisOrder($conn, $sql);
CloseCon($conn);

?>