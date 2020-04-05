<form action="index.html" method="post">
  <input type="submit" value="Back">
</form>

<h2>What are the prices of our services?</h2>
<br>

<?php

function showThisOrder($obConn,$sql) {
    $rsResult = mysqli_query($obConn, $sql) or die(mysqli_error($obConn));
    if(mysqli_num_rows($rsResult)>0) {
        
      echo "<td><strong>Prices:</strong></td>";
      echo "<table width=\"100%\" border=\"0\" cellspacing=\"2\"cellpadding=\"0\"><tr align=\"center\" bgcolor=\"#CCCCCC\">";
  
      echo "<td><strong>Minimum</strong></td>";
      echo "<td><strong>Average</strong></td>";
      echo "<td><strong>Maximum</strong></td>";
      
      //table data
      $bolWhite=true;
      while ($row = mysqli_fetch_assoc($rsResult)) {
        echo $bolWhite ? "<tr bgcolor=\"#CCCCCC\">" : "<tr bgcolor=\"#FFF\">";
          $bolWhite = !$bolWhite; 
          foreach ($row as $data) {
            $number = number_format($data, 2, '.', ',');
            echo "<td>$$number</td>"; 
          }
          echo "</tr>";
      }
  
    }
  
  }

include 'connect.php';
$conn = OpenCon();
$sql = "SELECT MIN(pricing), AVG(pricing), MAX(pricing)
        FROM deliveryorder" ;
showThisOrder($conn, $sql);
CloseCon($conn);

?>