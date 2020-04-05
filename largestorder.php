<form action="index.html" method="post">
  <input type="submit" value="Back">
</form>

<h2>What is the largest order we ever received?</h2>
<br>
<p>(most number of items in an order)</p>
<br>

<?php

function showThisOrder($obConn,$sql) {
    $rsResult = mysqli_query($obConn, $sql) or die(mysqli_error($obConn));
    if(mysqli_num_rows($rsResult)>0) {
        
      echo "<td><strong>Largest order:</strong></td>";
      echo "<table width=\"100%\" border=\"0\" cellspacing=\"2\"cellpadding=\"0\"><tr align=\"center\" bgcolor=\"#CCCCCC\">";
      
      //table data
      $bolWhite=true;
      while ($row = mysqli_fetch_assoc($rsResult)) {
        echo $bolWhite ? "<tr bgcolor=\"#CCCCCC\">" : "<tr bgcolor=\"#FFF\">";
          $bolWhite = !$bolWhite; 
          foreach ($row as $data) {
            echo "<td>$data items in that order</td>"; 
          }
          echo "</tr>";
      }
  
    }
  
  }

include 'connect.php';
$conn = OpenCon();
$sql = "SELECT MAX(x.num)
        FROM    (SELECT COUNT(*) AS num
                FROM items GROUP BY order_id)x " ;
showThisOrder($conn, $sql);
CloseCon($conn);

?>