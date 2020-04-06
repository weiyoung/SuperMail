-- These are all the quereies used in the SuperMail project
--
-- insert -- createorder.php
INSERT INTO DeliveryOrder ( order_id,
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
        '$receiver_id') ;


-- update -- update.php
  UPDATE DeliveryOrder
  SET Delivery_Status = '$dropdownValue'
  WHERE Order_ID = $order ;


-- selection, projection -- tracking.php
SELECT order_id, initial_date, delivery_status, $cust_cols
FROM deliveryorder
WHERE order_id = $where_cols ;


-- delete -- delete.php
DELETE FROM Employee
WHERE EID = $eid ;


-- nested selection, projection -- traceemployee.php
SELECT employee.ename, employee.ephone
FROM employee
WHERE employee.eid =    (SELECT deliveryorder.eid
                         FROM deliveryorder
                         WHERE order_id = $order_id ) ;


-- join -- join.php
SELECT d.order_id, e.*
FROM $jointarget e
    INNER JOIN deliveryorder d ON e.eid=d.eid
ORDER BY d.order_id ASC ;


-- aggregate -- pricings.php
SELECT MIN(pricing), MAX(pricing), AVG(pricing)
FROM deliveryorder ;


-- nested aggregate -- largestorder.php
SELECT MAX(x.num)
FROM    (SELECT COUNT(*) AS num
         FROM items GROUP BY order_id)x ;


-- division -- popularcustomer.php
SELECT  c.customer_name
FROM customer c
WHERE NOT EXISTS    (SELECT *
                     FROM employee e
                     WHERE NOT EXISTS    (SELECT o.customer_id
                                          FROM deliveryorder o
                                          WHERE c.customer_id=o.customer_id AND e.eid=o.eid ) ) ;
