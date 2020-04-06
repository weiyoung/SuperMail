<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Delete Employee - SuperMail</title>
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
            <h2>Employee deleted!</h2>
        </div>
    </div>

<?php

include 'connect.php';
$conn = OpenCon();
$eid = $_POST['eid'];
$sql = "DELETE FROM Employee 
      WHERE EID = $eid" ;  

echo "<table width=\"100%\" border=\"0\" cellspacing=\"2\"cellpadding=\"0\"><tr align=\"center\" bgcolor=\"#fff\">";
if ($conn->query($sql) === TRUE) { 
  echo "<tr><td style = \"text-align: left; padding: 15px 30px; border: 0px ; color: #333;\">Deleteded successfully!</td></tr>";
} else {
  echo "Error deleting employee: " . $conn->error;
} 
echo "</table>";

CloseCon($conn);

?>

</body>
</html>