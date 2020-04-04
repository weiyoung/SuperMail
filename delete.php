<?php

include 'connect.php';
$conn = OpenCon();
$eid = $_POST['eid'];
$sql = "DELETE FROM Employee 
      WHERE EID like '%$eid%'" ;  
if ($conn->query($sql) === TRUE) { 
  echo "Employee deleted successfully";
} else {
  echo "Error deleting employee: " . $conn->error;
} 
CloseCon($conn);

?>
