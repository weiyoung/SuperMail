<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="headingBanner-largest">
    <form action="index.html" method="post">
    <button class="home-btn" type="submit" value="Back"><i class="fa fa-home" aria-hidden="true" ></i></button>
  <!-- <input type="submit" value="Back"> -->
    </form>
        <div class="headingTitle-largest">
        <h2>What is the largest order we ever received?</h2>
        <!-- <p>(most number of items in an order)</p> -->
        </div>
    </div>

<?php

function showThisOrder($obConn,$sql) {
    $rsResult = mysqli_query($obConn, $sql) or die(mysqli_error($obConn));
    if(mysqli_num_rows($rsResult)>0) {
        
      echo "<h3>Largest Order:</h3>";
      echo nl2br("\n");
      echo "<table width=\"100%\" border=\"0\" cellspacing=\"2\"cellpadding=\"0\"><tr align=\"center\" bgcolor=\"#CCCCCC\">";
      
      //table data
      $bolWhite=true;
      while ($row = mysqli_fetch_assoc($rsResult)) {
        echo $bolWhite ? "<tr bgcolor=\"#ffc53d\">" : "<tr bgcolor=\"#FFF\">";
          $bolWhite = !$bolWhite; 
          foreach ($row as $data) {
            echo "<td style = \"text-align: center; padding: 15px 0; border: 0px; color: #333;\">$data items in that order</td>"; 
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

</body>

</html>