<form action="index.html" method="post">
  <input type="submit" value="Back">
</form>

<h2>This is where our employees work:</h2>
<br>

<?php

function showThisOrder($obConn,$sql) {
    $rsResult = mysqli_query($obConn, $sql) or die(mysqli_error($obConn));
    if(mysqli_num_rows($rsResult)>0) {
      echo "<table width=\"100%\" border=\"0\" cellspacing=\"2\"cellpadding=\"0\"><tr align=\"center\" bgcolor=\"#CCCCCC\">";
  
      echo "<td><strong>Employee Name</strong></td>";
      echo "<td><strong>Work Area</strong></td>";
      
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
$sql = "SELECT employee.ename, employeeworkarea.work_area
        FROM employee
        INNER JOIN employeeworkarea ON employee.eid=employeeworkarea.eid
        ORDER BY employee.ename ASC" ;
showThisOrder($conn, $sql);
CloseCon($conn);

?>