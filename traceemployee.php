<form action="traceemployee.html" method="post">
  <input type="submit" value="Back">
</form>

<?php

function showThisOrder($obConn,$sql) {
  $rsResult = mysqli_query($obConn, $sql) or die(mysqli_error($obConn));
  if(mysqli_num_rows($rsResult)>0) {
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"2\"cellpadding=\"0\"><tr align=\"center\" bgcolor=\"#CCCCCC\">";

    echo "<td><strong>Employee Name</strong></td>";
    echo "<td><strong>Employee Phone Number</strong></td>";

    //table data
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
$sql = "SELECT employee.ename, employee.ephone
        FROM employee
        WHERE employee.eid like (SELECT deliveryorder.eid
                                    FROM deliveryorder
                                    WHERE order_id like '%$order_id%')" ;
showThisOrder($conn, $sql);
CloseCon($conn);

?>