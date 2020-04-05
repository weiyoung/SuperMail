<form action="index.html" method="post">
  <input type="submit" value="Back">
</form>

<h2>Who are our popular customers?</h2>
<br>
<p>(customers that have been served by all employees)</p>
<br>

<?php

function showThisOrder($obConn,$sql) {
    $rsResult = mysqli_query($obConn, $sql) or die(mysqli_error($obConn));
    if(mysqli_num_rows($rsResult)>0) {
        
      echo "<td><strong>Customer name:</strong></td>";
      echo "<table width=\"100%\" border=\"0\" cellspacing=\"2\"cellpadding=\"0\"><tr align=\"center\" bgcolor=\"#CCCCCC\">";
      
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
$sql = "SELECT c.customer_name
        FROM customer c
        WHERE NOT EXISTS    (SELECT * 
                            FROM employee e
                            WHERE NOT EXISTS    (SELECT o.customer_id
                                                FROM deliveryorder o
                                                WHERE c.customer_id=o.customer_id AND e.eid=o.eid ) ) " ;
showThisOrder($conn, $sql);
CloseCon($conn);

?>