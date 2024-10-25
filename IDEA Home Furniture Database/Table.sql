CREATE TABLE Customer (
    CustomerID INT PRIMARY KEY,
    Name VARCHAR2(100),
    Address VARCHAR2(255),
    Email VARCHAR2(100),
    PhoneNumber VARCHAR2(20)
);
INSERT INTO Customer (CustomerID, Name, Address, Email, PhoneNumber)
VALUES (1, 'Dip Deji ', '123 Main St, Crewes, UK', 'john@gmail.com', '123-456-7890');

INSERT INTO Customer (CustomerID, Name, Address, Email, PhoneNumber)
VALUES (2, 'Mary Sue ', '0b9 Side St, Persoa, UK', 'mary@gmail.com', '435-456-9834');

INSERT INTO Customer (CustomerID, Name, Address, Email, PhoneNumber)
VALUES (3, 'Jack Npr ', '343 Gotham St, DMC, UK', 'joker@gmail.com', '676-596-4521');

INSERT INTO Customer (CustomerID, Name, Address, Email, PhoneNumber)
VALUES (4, 'Peter Pak', '452 Quen St, Marvl, UK', 'peter@gmail.com', '356-053-2053');

INSERT INTO Customer (CustomerID, Name, Address, Email, PhoneNumber)
VALUES (5, 'Mnky Lufy', '1096 One St, Enies, UK', 'luffy@gmail.com', '754-905-0578');


CREATE TABLE Product (
    ProductID INT PRIMARY KEY,
    Description VARCHAR2(255),
    Price NUMBER(10, 2),
    Dimensions VARCHAR2(50),
    Weight VARCHAR2(50)
);
INSERT INTO Product (ProductID, Description, Price, Dimensions, Weight)
VALUES (1, 'Plate', 499.99, '3ft x 6ft x 2ft', 20);
INSERT INTO Product (ProductID, Description, Price, Dimensions, Weight)
VALUES (2, 'Couch', 399.99, '6ft x 6ft x 6ft', 15);
INSERT INTO Product (ProductID, Description, Price, Dimensions, Weight)
VALUES (3, 'Chair', 599.99, '7ft x 5ft x 3ft', 62);
INSERT INTO Product (ProductID, Description, Price, Dimensions, Weight)
VALUES (4, 'Glass', 699.99, '4ft x 2ft x 5ft', 64);
INSERT INTO Product (ProductID, Description, Price, Dimensions, Weight)
VALUES (5, 'Table', 999.99, '9ft x 9ft x 9ft', 67);

CREATE TABLE Employee (
    EmployeeID INT PRIMARY KEY,
    Name VARCHAR2(100),
    Position VARCHAR2(100),
    Email VARCHAR2(100),
    PhoneNumber VARCHAR2(20),
    StoreID INT,
    FOREIGN KEY (StoreID) REFERENCES Store(StoreID)
);
INSERT INTO Employee (EmployeeID, Name, Position, Email, PhoneNumber, StoreID)
VALUES (1, 'John Smith', 'Sales Associate', 'alice@yahoo.com', '987-654-3210', 1);

INSERT INTO Employee (EmployeeID, Name, Position, Email, PhoneNumber, StoreID)
VALUES (2, 'Mark Griff', 'Sales Associate', 'marks@yahoo.com', '335-245-5544', 2);

INSERT INTO Employee (EmployeeID, Name, Position, Email, PhoneNumber, StoreID)
VALUES (3, 'Grey Bonds', 'Sales Associate', 'Bonds@yahoo.com', '987-654-3210', 3);

INSERT INTO Employee (EmployeeID, Name, Position, Email, PhoneNumber, StoreID)
VALUES (4, 'Alicia Jtr', 'Sales Associate', 'Alici@yahoo.com', '987-654-3210', 4);

INSERT INTO Employee (EmployeeID, Name, Position, Email, PhoneNumber, StoreID)
VALUES (5, 'Gome Tatsu', 'Sales Associate', 'Tatsu@yahoo.com', '987-654-3210', 5);

CREATE TABLE Store (
    StoreID INT PRIMARY KEY,
    Name VARCHAR2(100),
    Address VARCHAR2(255),
    PhoneNumber VARCHAR2(20)
);
INSERT INTO Store (StoreID, Name, Address, PhoneNumber)
VALUES (1, 'IDEA Furniture Store', '456 Poata St, Kanti, UK', '555-123-4567');

INSERT INTO Store (StoreID, Name, Address, PhoneNumber)
VALUES (2, 'IDEA Furniture Store', '456 Croft St, Laras, UK', '468-823-7566');

INSERT INTO Store (StoreID, Name, Address, PhoneNumber)
VALUES (3, 'IDEA Furniture Store', '456 Manre St, Untis, UK', '984-256-1979');

INSERT INTO Store (StoreID, Name, Address, PhoneNumber)
VALUES (4, 'IDEA Furniture Store', '456 Nimpo St, Quene, UK', '295-753-2663');

INSERT INTO Store (StoreID, Name, Address, PhoneNumber)
VALUES (5, 'IDEA Furniture Store', '456 Minte St, Prinn, UK', '497-397-3387');

CREATE TABLE Supplier (
    SupplierID INT PRIMARY KEY,
    Name VARCHAR2(100),
    Address VARCHAR2(255),
    ContactPerson VARCHAR2(100),
    PhoneNumber VARCHAR2(20)
);

INSERT INTO Supplier (SupplierID, Name, Address, ContactPerson, PhoneNumber)
VALUES (1, 'Furniture Supplier Co.', '569 Elm St, Kansa, USA', 'Supplier Contact', '897-452-4573');

INSERT INTO Supplier (SupplierID, Name, Address, ContactPerson, PhoneNumber)
VALUES (2, 'Furniture Supplier Co.', '355 Ngt St, Lapiu, USA', 'Supplier Contact', '975-578-4544');

INSERT INTO Supplier (SupplierID, Name, Address, ContactPerson, PhoneNumber)
VALUES (3, 'Furniture Supplier Co.', '774 Lip St, Kinto, USA', 'Supplier Contact', '756-565-568');

INSERT INTO Supplier (SupplierID, Name, Address, ContactPerson, PhoneNumber)
VALUES (4, 'Furniture Supplier Co.', '458 Ora St, Lippi, USA', 'Supplier Contact', '917-278-6677');

INSERT INTO Supplier (SupplierID, Name, Address, ContactPerson, PhoneNumber)
VALUES (5, 'Furniture Supplier Co.', '788 Yap St, Vanee, USA', 'Supplier Contact', '414-222-6765');

CREATE TABLE Purchase (
    PurchaseID INT PRIMARY KEY,
    PurchaseDate DATE,
    Quantity INT,
    TotalPrice NUMBER(10, 2),
    CustomerID INT,
    ProductID INT,
    StoreID INT,
    FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID),
    FOREIGN KEY (ProductID) REFERENCES Product(ProductID),
    FOREIGN KEY (StoreID) REFERENCES Store(StoreID)
);
INSERT INTO Purchase (PurchaseID, PurchaseDate, Quantity, TotalPrice, CustomerID, ProductID, StoreID)
VALUES (1, TO_DATE('2024-03-01', 'YYYY-MM-DD'), 1, 499.99, 1, 1, 1);

INSERT INTO Purchase (PurchaseID, PurchaseDate, Quantity, TotalPrice, CustomerID, ProductID, StoreID)
VALUES (2, TO_DATE('2024-05-03', 'YYYY-MM-DD'), 1, 399.99, 2, 2, 2);

INSERT INTO Purchase (PurchaseID, PurchaseDate, Quantity, TotalPrice, CustomerID, ProductID, StoreID)
VALUES (3, TO_DATE('2024-02-08', 'YYYY-MM-DD'), 1, 599.99, 3, 3, 3);

INSERT INTO Purchase (PurchaseID, PurchaseDate, Quantity, TotalPrice, CustomerID, ProductID, StoreID)
VALUES (4, TO_DATE('2024-03-04', 'YYYY-MM-DD'), 1, 699.99, 4, 4, 4);

INSERT INTO Purchase (PurchaseID, PurchaseDate, Quantity, TotalPrice, CustomerID, ProductID, StoreID)
VALUES (5, TO_DATE('2024-01-08', 'YYYY-MM-DD'), 1, 999.99, 5, 5, 5);

CREATE TABLE Delivery (
    DeliveryID INT PRIMARY KEY,
    TrackingNumber VARCHAR2(100),
    DeliveryDate DATE,
    ShippingCost NUMBER(10, 2),
    PurchaseID INT,
    FOREIGN KEY (PurchaseID) REFERENCES Purchase(PurchaseID)
);
INSERT INTO Delivery (DeliveryID, TrackingNumber, DeliveryDate, ShippingCost, PurchaseID)
VALUES (1, 'SDA832', TO_DATE('2024-03-28', 'YYYY-MM-DD'), 50.00, 1);

INSERT INTO Delivery (DeliveryID, TrackingNumber, DeliveryDate, ShippingCost, PurchaseID)
VALUES (2, 'POA012', TO_DATE('2024-07-18', 'YYYY-MM-DD'), 50.00, 2);

INSERT INTO Delivery (DeliveryID, TrackingNumber, DeliveryDate, ShippingCost, PurchaseID)
VALUES (3, 'SKC420', TO_DATE('2023-05-14', 'YYYY-MM-DD'), 50.00, 3);

INSERT INTO Delivery (DeliveryID, TrackingNumber, DeliveryDate, ShippingCost, PurchaseID)
VALUES (4, 'LIP035', TO_DATE('2024-02-04', 'YYYY-MM-DD'), 50.00, 4);

INSERT INTO Delivery (DeliveryID, TrackingNumber, DeliveryDate, ShippingCost, PurchaseID)
VALUES (5, 'ZPC023', TO_DATE('2024-03-03', 'YYYY-MM-DD'), 50.00, 5);

CREATE TABLE Collection (
    CollectionID INT PRIMARY KEY,
    CollectionDate DATE,
    CollectionTime VARCHAR2(100),
    PurchaseID INT,
    FOREIGN KEY (PurchaseID) REFERENCES Purchase(PurchaseID)
);
INSERT INTO Collection (CollectionID, CollectionDate, CollectionTime, PurchaseID)
VALUES (1, TO_DATE('2024-03-28', 'YYYY-MM-DD'), '12:00 AM', 1);
INSERT INTO Collection (CollectionID, CollectionDate, CollectionTime, PurchaseID)
VALUES (2, TO_DATE('2024-03-29', 'YYYY-MM-DD'), '08:45 PM', 2);
INSERT INTO Collection (CollectionID, CollectionDate, CollectionTime, PurchaseID)
VALUES (3, TO_DATE('2024-03-29', 'YYYY-MM-DD'), '01:00 AM', 3);
INSERT INTO Collection (CollectionID, CollectionDate, CollectionTime, PurchaseID)
VALUES (4, TO_DATE('2024-03-29', 'YYYY-MM-DD'), '11:30 PM', 4);
INSERT INTO Collection (CollectionID, CollectionDate, CollectionTime, PurchaseID)
VALUES (5, TO_DATE('2024-03-29', 'YYYY-MM-DD'), '03:00 AM', 5);

CREATE TABLE CollectionEmployee (
    EmployeeID INT PRIMARY KEY,
    Name VARCHAR(100),
    Position VARCHAR(50),
    Email VARCHAR(100),
    PhoneNumber VARCHAR(20),
    StoreID INT
);
INSERT INTO CollectionEmployee (EmployeeID, Name, Position, Email, PhoneNumber, StoreID)
VALUES (1, 'Mik Gamama', 'Sales Collector', 'Biaaa@yahoo.com', '987-654-3210', 1);

INSERT INTO CollectionEmployee (EmployeeID, Name, Position, Email, PhoneNumber, StoreID)
VALUES (2, 'Jonny Bint', 'Sales Collector', 'Ialla@yahoo.com', '335-245-5544', 2);

INSERT INTO CollectionEmployee (EmployeeID, Name, Position, Email, PhoneNumber, StoreID)
VALUES (3, 'Yap Uminan', 'Sales Collector', 'Hoaoo@yahoo.com', '443-654-3210', 3);

INSERT INTO CollectionEmployee (EmployeeID, Name, Position, Email, PhoneNumber, StoreID)
VALUES (4, 'Tipala Hia', 'Sales Collector', 'Nappa@yahoo.com', '839-654-3210', 4);

INSERT INTO CollectionEmployee (EmployeeID, Name, Position, Email, PhoneNumber, StoreID)
VALUES (5, 'Fitne Nipp', 'Sales Collector', 'Yippe@yahoo.com', '135-654-3210', 5);

CREATE TABLE DeliveryEmployee (
    EmployeeID INT PRIMARY KEY,
    Name VARCHAR(100),
    Position VARCHAR(50),
    Email VARCHAR(100),
    PhoneNumber VARCHAR(20),
    StoreID INT
);
INSERT INTO DeliveryEmployee (EmployeeID, Name, Position, Email, PhoneNumber, StoreID)
VALUES (1, 'Pistl Iasm', 'Sales Delivery', 'alice@yahoo.com', '898-654-3210', 1);

INSERT INTO DeliveryEmployee (EmployeeID, Name, Position, Email, PhoneNumber, StoreID)
VALUES (2, 'Imsa Zapaa', 'Sales Delivery', 'marks@yahoo.com', '753-245-2345', 2);

INSERT INTO DeliveryEmployee (EmployeeID, Name, Position, Email, PhoneNumber, StoreID)
VALUES (3, 'Sips Kirww', 'Sales Delivery', 'Bonds@yahoo.com', '673-654-2456', 3);

INSERT INTO DeliveryEmployee (EmployeeID, Name, Position, Email, PhoneNumber, StoreID)
VALUES (4, 'Qinn Billl', 'Sales Delivery', 'Alici@yahoo.com', '567-654-3578', 4);

INSERT INTO DeliveryEmployee (EmployeeID, Name, Position, Email, PhoneNumber, StoreID)
VALUES (5, 'Uam Himial', 'Sales Delivery', 'Tatsu@yahoo.com', '134-654-2346', 5);