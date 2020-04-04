<form action="createorder.html" method="post">
    <input type="submit" value="Back">
</form>

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
if ($conn->query($sql) === TRUE) { 
    echo nl2br("Record updated successfully!\n");
    echo nl2br("Order ID : $order_id\n");
    echo nl2br("Customer ID : $customer_id\n");
    echo nl2br("Employer ID : $eid\n");
    echo nl2br("Order Date : $i_date\n");
    echo nl2br("Delivery Date : $d_date\n");
    echo nl2br("Priority : $priority\n");
    echo nl2br("Delivery Status : $status\n");
    echo nl2br("Pricing : \$$pricing\n");
    echo nl2br("Receiver ID : $receiver_id\n");
} else {
    echo "Error updating record: " . $conn->error;
}
CloseCon($conn);

?>