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
            <h2>Successfully created order!</h2>
        </div>
    </div>

<?php

include 'connect.php';
$conn = OpenCon();

$order_id = $_POST['order_id'];
$customer_id = $_POST['customer_id'];
$eid = $_POST['eid'];
$i_date = $_POST['initial_date'];
$d_date = $_POST['delivery_date'];
$priority = $_POST['priority'];
$status = $_POST['delivery_status'];
$pricing = $_POST['pricing'];
$receiver_id = $_POST['receiver_id'];

$sql = "INSERT INTO DeliveryOrder (
                    order_id,
                    customer_id,
                    eid,
                    initial_date,
                    delivery_date,
                    priority,
                    delivery_status,
                    pricing,
                    receiver_id )
        VALUES ('$order_id', 
                '$customer_id', 
                '$eid', 
                '$i_date', 
                '$d_date', 
                '$priority', 
                '$status', 
                '$pricing', 
                '$receiver_id')";

echo "<table width=\"100%\" border=\"0\" cellspacing=\"2\"cellpadding=\"0\"><tr align=\"center\" bgcolor=\"#fff\">";
if ($conn->query($sql) === TRUE) { 
    echo "<tr><td style = \"text-align: left; padding: 15px 30px; border: 0px ; color: #333;\">Order ID : $order_id</td></tr>";
    echo "<tr><td style = \"text-align: left; padding: 15px 30px; border: 0px ; color: #333;\">Customer ID : $customer_id</td></tr>";
    echo "<tr><td style = \"text-align: left; padding: 15px 30px; border: 0px ; color: #333;\">Employer ID : $eid</td></tr>";
    echo "<tr><td style = \"text-align: left; padding: 15px 30px; border: 0px ; color: #333;\">Order Date : $i_date</td></tr>";
    echo "<tr><td style = \"text-align: left; padding: 15px 30px; border: 0px ; color: #333;\">Delivery Date : $d_date</td></tr>";
    echo "<tr><td style = \"text-align: left; padding: 15px 30px; border: 0px ; color: #333;\">Priority : $priority</td></tr>";
    echo "<tr><td style = \"text-align: left; padding: 15px 30px; border: 0px ; color: #333;\">Delivery Status : $status</td></tr>";
    $number = number_format($pricing, 2, '.', ',');
    echo "<tr><td style = \"text-align: left; padding: 15px 30px; border: 0px ; color: #333;\">Pricing : \$$number</td></tr>";
    echo "<tr><td style = \"text-align: left; padding: 15px 30px; border: 0px ; color: #333;\">Receiver ID : $receiver_id</td></tr>";

} else {
    echo "Error updating record: " . $conn->error;
}
echo "</table>";

CloseCon($conn);

?>

</body>
</html>