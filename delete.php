<form action="delete.html" method="post">
    <input type="submit" value="Back">
</form>

<?php

include 'connect.php';
$conn = OpenCon();
$eid = $_POST['eid'];
$sql = "DELETE FROM Employee 
      WHERE EID like '%$eid%'" ;  
if ($conn->query($sql) === TRUE) { 
  echo "Deleted!";
} else {
  echo "Error deleting employee: " . $conn->error;
} 
CloseCon($conn);

?>
