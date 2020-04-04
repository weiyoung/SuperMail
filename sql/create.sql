DROP TABLE Items;
DROP TABLE DeliveryOrder;
DROP TABLE EmployeeWorkArea;
DROP TABLE MailboxServicedBy;
DROP TABLE PostOffice;
DROP TABLE AreaServicedByPO;
DROP TABLE PostOfficeDetails;
DROP TABLE Customer;
DROP TABLE Receiver;
DROP TABLE Employee;

CREATE TABLE Customer (
  Customer_ID INT PRIMARY KEY,
  Customer_Name CHAR(20),
  Customer_Phone INT,
  Customer_Address CHAR(100)
);

CREATE TABLE Receiver (
  Receiver_ID INT PRIMARY KEY,
  Receiver_Name CHAR(20),
  Receiver_Address CHAR(100),
  Receiver_Postal_Code CHAR(6)
);

CREATE TABLE Employee (
  EID INT PRIMARY KEY,
  EName CHAR(20),
  EPhone INT
);

CREATE TABLE EmployeeWorkArea (
  EID INT PRIMARY KEY,
  Work_Area CHAR(20),
  FOREIGN KEY (EID) REFERENCES Employee(EID) ON DELETE CASCADE
);

CREATE TABLE PostOfficeDetails (
                                   POID INT PRIMARY KEY,
                                   Location CHAR(20),
                                   City CHAR(20)
);

CREATE TABLE MailboxServicedBy(
  MBID INT PRIMARY KEY,
  POID INT,
  FOREIGN KEY (POID) REFERENCES PostOfficeDetails(POID) ON DELETE SET NULL
);

CREATE TABLE PostOffice (
  Receiver_Postal_Code CHAR(6) PRIMARY KEY,
  POID INT,
  FOREIGN KEY (POID) REFERENCES PostOfficeDetails(POID) ON DELETE SET NULL
);

CREATE TABLE AreaServicedByPO (
  POID INT PRIMARY KEY,
  Work_Area CHAR(20),
  FOREIGN KEY  (POID) REFERENCES POSTOFFICEDETAILS(POID)
);

CREATE TABLE DeliveryOrder (
    Order_ID INT PRIMARY KEY,
    Customer_ID INT,
    EID INT,
    INITIAL_DATE DATE,
     DELIVERY_DATE DATE,
     Priority CHAR(6),
    Delivery_Status CHAR(10),
    Pricing REAL,
    Receiver_ID INT,
    FOREIGN KEY (Customer_ID) REFERENCES Customer(CUSTOMER_ID),
    FOREIGN KEY (EID) REFERENCES Employee(EID),
    FOREIGN KEY (Receiver_ID) REFERENCES Receiver(Receiver_ID)
);

CREATE TABLE Items (
   Item_ID INT PRIMARY KEY,
   Order_ID INT,
   LENGTH INT,
   WIDTH INT,
   HEIGHT INT,
   Weight INT,
   Fragility CHAR(6),
   FOREIGN KEY (Order_ID) REFERENCES DeliveryOrder(Order_ID) ON DELETE
       CASCADE
)


