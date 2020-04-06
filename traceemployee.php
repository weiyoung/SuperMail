<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="headingBanner">
        <form action="index.html" method="post">
        <button class="home-btn" type="submit" value="Back"><i class="fa fa-home" aria-hidden="true" ></i></button>
        <!-- <input type="submit" value="Back"> -->
        </form>
        <div class="headingTitle-employee">
        <h2>Employee in charge:</h2>
        </div>
    </div>

<?php

function showThisOrder($obConn,$sql) {
  $rsResult = mysqli_query($obConn, $sql) or die(mysqli_error($obConn));
  if(mysqli_num_rows($rsResult)>0) {
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"2\"cellpadding=\"0\"><tr align=\"center\" bgcolor=\"#f2f2f2\">";
    $i = 0;

    //retrive field names
    while ($i < mysqli_num_fields($rsResult)) {
      $field = mysqli_fetch_field_direct($rsResult, $i);
      $fieldName=$field->name;
      echo "<td style = \"text-align: center; padding: 15px 0; border: 0px ; color: #333;\">$fieldName</td>"; 
      $i = $i + 1;
    }
    
    //field names retrieved. now dump info
    $bolWhite=true;
    while ($row = mysqli_fetch_assoc($rsResult)) {
      echo $bolWhite ? "<tr bgcolor=\"#ffc53d\">" : "<tr bgcolor=\"#FFF\">";
        $bolWhite = !$bolWhite; 
        foreach ($row as $data) {
          echo "<td style = \"text-align: center; padding: 15px 0; border: 0px ; color: #333;\">$data</td>"; 
        }
        echo "</tr>";
    }
    echo "</table>";
  }

}

include 'connect.php';
$conn = OpenCon();
$order_id = $_POST['order_id'];
$sql = "SELECT employee.ename, employee.ephone
        FROM employee
        WHERE employee.eid like (SELECT deliveryorder.eid
                                    FROM deliveryorder
                                    WHERE order_id = $order_id )" ;
showThisOrder($conn, $sql);
CloseCon($conn);

?>

</body>
</html>