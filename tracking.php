<?php
include 'connect.php';
$conn = OpenCon();
$sql = "SELECT order_id, customer_id, eid, initial_date, delivery_date, priority, delivery_status, pricing, receiver_id FROM deliveryorder";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "List of Delivery Orders";

    echo "<table>
    <tr>
    <th class='border-class'>order_id</th>
    <th class='border-class'>customer_id</th>
    <th class='border-class'>eid</th>
    <th class='border-class'>initial_date</th>
    <th class='border-class'>delivery_date</th>
    <th class='border-class'>priority</th>
    <th class='border-class'>delivery_status</th>
    <th class='border-class'>pricing</th>
    <th class='border-class'>receiver_id</th>
    </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) { 
        echo"
        <tr><td class='border-class'>".$row["order_id"]."</td>
        <td class='border-class'>".$row["customer_id"]."</td>
        <td class='border-class'>".$row["eid"]."</td>
        <td class='border-class'>".$row["initial_date"]."</td>
        <td class='border-class'>".$row["delivery_date"]."</td>
        <td class='border-class'>".$row["priority"]."</td>
        <td class='border-class'>".$row["delivery_status"]."</td>
        <td class='border-class'>".$row["pricing"]."</td>
        <td class='border-class'>".$row["receiver_id"]."</td>
        </tr>";
    }
    echo "</table>";
} else {
  echo "no results :(";
}
CloseCon($conn);
?>
