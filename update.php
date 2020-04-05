<form action="update.html" method="post">
  <input type="submit" value="Back">
</form>

<?php

include 'connect.php';
$conn = OpenCon();
$dropdownValue = $_POST['drop_down'];
$order = $_POST['order_ID'];
$sql = "UPDATE DeliveryOrder 
        SET Delivery_Status = '$dropdownValue'
        WHERE Order_ID like '%$order%'";  
if ($conn->query($sql) === TRUE) { 
  echo nl2br("Record updated successfully!\n");
  echo nl2br("Order $order updated to $dropdownValue.\n");
} else {
  echo "Error updating record: " . $conn->error;
} 
CloseCon($conn);

?>
