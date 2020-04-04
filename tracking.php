<form action="tracking.html" method="post">
  <input type="submit" value="Back">
</form>

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
$where_cols = $_POST['where_cols'];
$sql = "SELECT order_id, initial_date, delivery_date, delivery_status 
        FROM deliveryorder
        WHERE order_id like '%$where_cols%'";
showThisOrder($conn, $sql);
CloseCon($conn);

?>