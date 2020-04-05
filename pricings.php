<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="headingBanner-pricing">
        <form action="index.html" method="post">
        <button class="home-btn" type="submit" value="Back"><i class="fa fa-home" aria-hidden="true" ></i></button>
        <!-- <input type="submit" value="Back"> -->
        </form>

        <div class="headingTitle-pricing">
        <h2>What are the prices of our services?</h2>
        </div>
    </div>

<?php

function showThisOrder($obConn,$sql) {
    $rsResult = mysqli_query($obConn, $sql) or die(mysqli_error($obConn));
    if(mysqli_num_rows($rsResult)>0) {
        
      echo "<td><strong>Prices:</strong></td>";
      echo "<table width=\"100%\" border=\"0\" cellspacing=\"2\"cellpadding=\"0\"><tr align=\"center\" bgcolor=\"#f2f2f2\">";
  
      echo "<td style = \"text-align: center; padding: 15px 0;\"><strong>Minimum</strong></td>";
      echo "<td><strong>Maximum</strong></td>";
      echo "<td><strong>Average</strong></td>";
      
      //table data
      $bolWhite=true;
      while ($row = mysqli_fetch_assoc($rsResult)) {
        echo $bolWhite ? "<tr bgcolor=\"#fff\">" : "<tr bgcolor=\"#FFF\">";
          $bolWhite = !$bolWhite; 
          foreach ($row as $data) {
            $number = number_format($data, 2, '.', ',');
            echo "<td style = \"text-align: center; padding: 15px 0; border: 1px solid; color: #333;\">$$number</td>"; 
          }
          echo "</tr>";
      }
  
    }
  
  }

include 'connect.php';
$conn = OpenCon();
$sql = "SELECT MIN(pricing), MAX(pricing), AVG(pricing)
        FROM deliveryorder" ;
showThisOrder($conn, $sql);
CloseCon($conn);

?>

</body>

</html>
