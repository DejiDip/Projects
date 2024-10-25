<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IDEA Furniture Database Interface</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        body {
            background-image: url('Wh.jfif');
            
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>IDEA Furniture Database Interface</h1>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="product_id">Enter Product ID:</label>
        <input type="text" id="product_id" name="product_id">
        <button type="submit">Search Product</button>
    </form>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="customer_id">Enter Customer ID:</label>
        <input type="text" id="customer_id" name="customer_id">
        <button type="submit">Search Customer</button>
    </form>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="employee_id">Enter Employee ID:</label>
        <input type="text" id="employee_id" name="employee_id">
        <button type="submit">Search Employee</button>
    </form>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="store_id">Enter Store ID:</label>
        <input type="text" id="store_id" name="store_id">
        <button type="submit">Search StoreID</button>
    </form>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="Supplier_id">Enter Supplier ID:</label>
        <input type="text" id="supplier_id" name="supplier_id">
        <button type="submit">Search Supplier</button>
    </form>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="Purchase_id">Enter Purchase ID:</label>
        <input type="text" id="purchase_id" name="purchase_id">
        <button type="submit">Search Purchase</button>
    </form>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="Delivery_id">Enter Delivery ID:</label>
        <input type="text" id="delivery_id" name="delivery_id">
        <button type="submit">Search Delivery</button>
    </form>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="Collection_id">Enter Collection ID:</label>
        <input type="text" id="collection_id" name="collection_id">
        <button type="submit">Search Collection</button>
    </form>
    </form>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="CollectionEmployee_id">Enter CollectionEmployee ID:</label>
        <input type="text" id="collectionEmployee_id" name="collectionEmployee_id">
        <button type="submit">Search CollectionEmployee</button>
    </form>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="DeliveryEmployee_id">Enter DeliveryEmployee ID:</label>
        <input type="text" id="deliveryEmployee_id" name="deliveryEmployee_id">
        <button type="submit">Search DeliveryEmployee</button>
    </form>
    <?php
    // Check if product search form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
        // Retrieve product ID from form
        $product_id = $_POST['product_id'];

        // Establish database connection
        $conn = oci_connect('x9j25', 'x9j25');

        // Check connection
        if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }

        // Prepare SQL statement
        $stmt = oci_parse($conn, "SELECT * FROM Product WHERE ProductID = :product_id");

        // Bind parameters
        oci_bind_by_name($stmt, ':product_id', $product_id);

        // Execute SQL statement
        oci_execute($stmt);

        // Display results
        echo "<h2>Product Search Results:</h2>";
        echo "<table>
            <tr>
                <th>Product ID</th>
                <th>Description</th>
                <th>Price</th>
                <th>Dimensions</th>
                <th>Weight</th>
            </tr>";
        while ($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) {
            echo "<tr>";
            foreach ($row as $item) {
                echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        // Free statement and close connection
        oci_free_statement($stmt);
        oci_close($conn);
    }

    // Check if customer search form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['customer_id'])) {
        // Retrieve customer ID from form
        $customer_id = $_POST['customer_id'];

        // Establish database connection
        $conn = oci_connect('x9j25', 'x9j25');

        // Check connection
        if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }

        // Prepare SQL statement
        $stmt = oci_parse($conn, "SELECT * FROM Customer WHERE CustomerID = :customer_id");

        // Bind parameters
        oci_bind_by_name($stmt, ':customer_id', $customer_id);
        
        // Execute SQL statement
        oci_execute($stmt);

        // Display results
        echo "<h2>Customer Search Results:</h2>";
        echo "<table>
            <tr>
                <th>Customer ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone Number</th>
            </tr>";
        while ($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) {
            echo "<tr>";
            foreach ($row as $item) {
                echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        // Free statement and close connection
        oci_free_statement($stmt);
        oci_close($conn);
    }
    // Check if employee search form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['employee_id'])) {
    // Retrieve employee ID from form
    $employee_id = $_POST['employee_id'];

    // Establish database connection
    $conn = oci_connect('x9j25', 'x9j25');

    // Check connection
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    // Prepare SQL statement
    $stmt = oci_parse($conn, "SELECT * FROM Employee WHERE EmployeeID = :employee_id");

    // Bind parameters
    oci_bind_by_name($stmt, ':employee_id', $employee_id);
    
    // Execute SQL statement
    oci_execute($stmt);

    // Display results
    echo "<h2>Employee Search Results:</h2>";
    echo "<table>
        <tr>
            <th>EmployeeID</th>
            <th>Name</th>
            <th>Position</th>
            <th>Email</th>
            <th>PhoneNumber</th>
            <th>StoreID</th>
        </tr>";
    while ($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>";
        foreach ($row as $item) {
            echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Free statement and close connection
    oci_free_statement($stmt);
    oci_close($conn);
}

    // Check if store search form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['store_id'])) {
    // Retrieve store ID from form
    $store_id = $_POST['store_id'];

    // Establish database connection
    $conn = oci_connect('x9j25', 'x9j25');

    // Check connection
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    // Prepare SQL statement
    $stmt = oci_parse($conn, "SELECT * FROM Store WHERE StoreID = :store_id");

    // Bind parameters
    oci_bind_by_name($stmt, ':store_id', $store_id);
    
    // Execute SQL statement
    oci_execute($stmt);

    // Display results
    echo "<h2>Store Search Results:</h2>";
    echo "<table>
        <tr>
            <th>Store ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone Number</th>
        </tr>";
    while ($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>";
        foreach ($row as $item) {
            echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Free statement and close connection
    oci_free_statement($stmt);
    oci_close($conn);
}
    // Check if supplier search form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['supplier_id'])) {
    // Retrieve supplier ID from form
    $supplier_id = $_POST['supplier_id'];

    // Establish database connection
    $conn = oci_connect('x9j25', 'x9j25');

    // Check connection
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    // Prepare SQL statement
    $stmt = oci_parse($conn, "SELECT * FROM Supplier WHERE SupplierID = :supplier_id");

    // Bind parameters
    oci_bind_by_name($stmt, ':supplier_id', $supplier_id);
    
    // Execute SQL statement
    oci_execute($stmt);

    // Display results
    echo "<h2>Supplier Search Results:</h2>";
    echo "<table>
        <tr>
            <th>SupplierID</th>
            <th>Name</th>
            <th>Address</th>
            <th>ContactPerson</th>
            <th>PhoneNumber</th>
        </tr>";
    while ($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>";
        foreach ($row as $item) {
            echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Free statement and close connection
    oci_free_statement($stmt);
    oci_close($conn);
}

// Check if Purchase search form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['purchase_id'])) {
    // Retrieve Purchase ID from form
    $purchase_id = $_POST['purchase_id'];

    // Establish database connection
    $conn = oci_connect('x9j25', 'x9j25');

    // Check connection
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    // Prepare SQL statement
    $stmt = oci_parse($conn, "SELECT * FROM Purchase WHERE PurchaseID = :purchase_id");

    // Bind parameters
    oci_bind_by_name($stmt, ':purchase_id', $purchase_id);

    // Execute SQL statement
    oci_execute($stmt);

    // Display results
    echo "<h2>Purchase Search Results:</h2>";
    echo "<table>
        <tr>
            <th>PurchaseID</th>
            <th>PurchaseDate</th>
            <th>Quantity</th>
            <th>TotalPrice</th>
            <th>CustomerID</th>
            <th>ProductID</th>
            <th>StoreID</th>
        </tr>";
    while ($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>";
        foreach ($row as $item) {
            echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Free statement and close connection
    oci_free_statement($stmt);
    oci_close($conn);
}
// Check if  Delivery search form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delivery_id'])) {
    // Retrieve Delivery ID from form
    $delivery_id = $_POST['delivery_id'];

    // Establish database connection
    $conn = oci_connect('x9j25', 'x9j25');

    // Check connection
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    // Prepare SQL statement
    $stmt = oci_parse($conn, "SELECT * FROM Delivery WHERE DeliveryID = :delivery_id");

    // Bind parameters
    oci_bind_by_name($stmt, ':delivery_id', $delivery_id);

    // Execute SQL statement
    oci_execute($stmt);

    // Display results
    echo "<h2>Delivery Search Results:</h2>";
    echo "<table>
        <tr>
            <th>DeliveryID</th>
            <th>TrackingNumber</th>
            <th>DeliveryDate</th>
            <th>ShippingCost</th>
            <th>PurchaseID</th>
        </tr>";
    while ($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>";
        foreach ($row as $item) {
            echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Free statement and close connection
    oci_free_statement($stmt);
    oci_close($conn);
}
// Check if  Collection search form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['collection_id'])) {
    // Retrieve Collection ID from form
    $collection_id = $_POST['collection_id'];

    // Establish database connection
    $conn = oci_connect('x9j25', 'x9j25');

    // Check connection
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    // Prepare SQL statement
    $stmt = oci_parse($conn, "SELECT * FROM Collection WHERE CollectionID = :Collection_id");

    // Bind parameters
    oci_bind_by_name($stmt, ':collection_id', $collection_id);

    // Execute SQL statement
    oci_execute($stmt);

    // Display results
    echo "<h2>Collection Search Results:</h2>";
    echo "<table>
        <tr>
            <th>CollectionID</th>
            <th>CollectionDate</th>
            <th>CollectionTime</th>
            <th>PurchaseID</th>
        </tr>";
    while ($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>";
        foreach ($row as $item) {
            echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Free statement and close connection
    oci_free_statement($stmt);
    oci_close($conn);
}
// Check if Collection search form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['collectionEmployee_id'])) {
    // Retrieve Collection ID from form
    $collectionEmployee_id = $_POST['collectionEmployee_id'];

    // Establish database connection
    $conn = oci_connect('x9j25', 'x9j25');

    // Check connection
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    // Prepare SQL statement
    $stmt = oci_parse($conn, "SELECT * FROM CollectionEmployee WHERE EmployeeID = :collectionEmployee_id");

    // Bind parameters
    oci_bind_by_name($stmt, ':collectionEmployee_id', $collectionEmployee_id);

    // Execute SQL statement
    oci_execute($stmt);

    // Display results
    echo "<h2>CollectionEmployee Search Results:</h2>";
    echo "<table>
        <tr>
            <th>EmployeeID</th>
            <th>Name</th>
            <th>Position</th>
            <th>Email</th>
            <th>PhoneNumber</th>
            <th>StoreID</th>
        </tr>";
    while ($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>";
        foreach ($row as $item) {
            echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Free statement and close connection
    oci_free_statement($stmt);
    oci_close($conn);
}
// Check if Delivery search form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deliveryEmployee_id'])) {
    // Retrieve Delivery ID from form
    $deliveryEmployee_id = $_POST['deliveryEmployee_id'];

    // Establish database connection
    $conn = oci_connect('x9j25', 'x9j25');

    // Check connection
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    // Prepare SQL statement
    $stmt = oci_parse($conn, "SELECT * FROM DeliveryEmployee WHERE EmployeeID = :deliveryEmployee_id");

    // Bind parameters
    oci_bind_by_name($stmt, ':deliveryEmployee_id', $deliveryEmployee_id);

    // Execute SQL statement
    oci_execute($stmt);

    // Display results
    echo "<h2>DeliveryEmployee Search Results:</h2>";
    echo "<table>
        <tr>
            <th>EmployeeID</th>
            <th>Name</th>
            <th>Position</th>
            <th>Email</th>
            <th>PhoneNumber</th>
            <th>StoreID</th>
        </tr>";
    while ($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>";
        foreach ($row as $item) {
            echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Free statement and close connection
    oci_free_statement($stmt);
    oci_close($conn);
}

    ?>

    <h2>Browse Products</h2>
    <?php
    // Establish database connection
    $conn = oci_connect('x9j25', 'x9j25');

    // Check connection
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    // Prepare SQL statement
    $stmt = oci_parse($conn, "SELECT * FROM Product");

    // Execute SQL statement
    oci_execute($stmt);

    // Display results
    echo "<table>
        <tr>
            <th>Product ID</th>
            <th>Description</th>
            <th>Price</th>
            <th>Dimensions</th>
            <th>Weight</th>
        </tr>";
    while ($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>";
        foreach ($row as $item) {
            echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Free statement and close connection
    oci_free_statement($stmt);
    oci_close($conn);
    
    ?>

    <?php
    // Establish database connection
    $conn = oci_connect('x9j25', 'x9j25');

    // Check connection
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    // Prepare SQL statement
    $stmt = oci_parse($conn, "SELECT * FROM Customer");

    // Execute SQL statement
    oci_execute($stmt);

    // Display results
    echo "<h2>All Customers:</h2>";
    echo "<table>
        <tr>
            <th>Customer ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone Number</th>
        </tr>";
    while ($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>";
        foreach ($row as $item) {
            echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Free statement and close connection
    oci_free_statement($stmt);
    oci_close($conn);
    ?>
<?php
    // Establish database connection
    $conn = oci_connect('x9j25', 'x9j25');

    // Check connection
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    // Prepare SQL statement
    $stmt = oci_parse($conn, "SELECT * FROM Employee");

    // Execute SQL statement
    oci_execute($stmt);

    // Display results
    echo "<h2>All Employee:</h2>";
    echo "<table>
        <tr>
            <th>EmployeeID</th>
            <th>Name</th>
            <th>Position</th>
            <th>Email</th>
            <th>PhoneNumber</th>
            <th>StoreID</th>
        </tr>";
    while ($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>";
        foreach ($row as $item) {
            echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Free statement and close connection
    oci_free_statement($stmt);
    oci_close($conn);
    ?>

    <?php
    // Establish database connection
    $conn = oci_connect('x9j25', 'x9j25');

    // Check connection
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    // Prepare SQL statement
    $stmt = oci_parse($conn, "SELECT * FROM Purchase");

    // Execute SQL statement
    oci_execute($stmt);

    // Display results
    echo "<h2>All Purchase:</h2>";
    echo "<table>
        <tr>
            <th>PurchaseID</th>
            <th>PurchaseDate</th>
            <th>Quantity</th>
            <th>TotalPrice</th>
            <th>CustomerID</th>
            <th>ProductID</th>
            <th>StoreID</th>
        </tr>";
    while ($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>";
        foreach ($row as $item) {
            echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Free statement and close connection
    oci_free_statement($stmt);
    oci_close($conn);
    ?>
    <?php
    // Establish database connection
    $conn = oci_connect('x9j25', 'x9j25');

    // Check connection
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    // Prepare SQL statement
    $stmt = oci_parse($conn, "SELECT * FROM Delivery");

    // Execute SQL statement
    oci_execute($stmt);

    // Display results
    echo "<h2>All Delivery:</h2>";
    echo "<table>
        <tr>
            <th>DeliveryID</th>
            <th>TrackingNumber</th>
            <th>DeliveryDate</th>
            <th>ShippingCost</th>
            <th>PurchaseID</th>
        </tr>";
    while ($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>";
        foreach ($row as $item) {
            echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Free statement and close connection
    oci_free_statement($stmt);
    oci_close($conn);
    ?>
    <?php
    // Establish database connection
    $conn = oci_connect('x9j25', 'x9j25');

    // Check connection
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    // Prepare SQL statement
    $stmt = oci_parse($conn, "SELECT * FROM Supplier");

    // Execute SQL statement
    oci_execute($stmt);

    // Display results
    echo "<h2>All Suppliers</h2>";
    echo "<table>
        <tr>
            <th>SupplierID</th>
            <th>Name</th>
            <th>Address</th>
            <th>ContactPerson</th>
            <th>PhoneNumber</th>
        </tr>";
    while ($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>";
        foreach ($row as $item) {
            echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Free statement and close connection
    oci_free_statement($stmt);
    oci_close($conn);
    ?>
    <?php
    // Establish database connection
    $conn = oci_connect('x9j25', 'x9j25');

    // Check connection
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    // Prepare SQL statement
    $stmt = oci_parse($conn, "SELECT * FROM Collection");

    // Execute SQL statement
    oci_execute($stmt);

    // Display results
    echo "<h2>All Collection:</h2>";
    echo "<table>
        <tr>
            <th>CollectionID</th>
            <th>CollectionDate</th>
            <th>CollectionTime</th>
            <th>PurchaseID</th>
        </tr>";
    while ($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>";
        foreach ($row as $item) {
            echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Free statement and close connection
    oci_free_statement($stmt);
    oci_close($conn);
    ?>

    <?php
    // Establish database connection
    $conn = oci_connect('x9j25', 'x9j25');

    // Check connection
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    // Prepare SQL statement
    $stmt = oci_parse($conn, "SELECT * FROM Store");

    // Execute SQL statement
    oci_execute($stmt);

    // Display results
    echo "<h2>All Store:</h2>";
    echo "<table>
        <tr>
            <th>Store ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone Number</th>
        </tr>";
    while ($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>";
        foreach ($row as $item) {
            echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Free statement and close connection
    oci_free_statement($stmt);
    oci_close($conn);
    
    ?>
    <?php
    // Establish database connection
    $conn = oci_connect('x9j25', 'x9j25');

    // Check connection
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    // Prepare SQL statement
    $stmt = oci_parse($conn, "SELECT * FROM CollectionEmployee");

    // Execute SQL statement
    oci_execute($stmt);

    // Display results
    echo "<h2>All CollectionEmployee:</h2>";
    echo "<table>
        <tr>
        <th>EmployeeID</th>
        <th>Name</th>
        <th>Position</th>
        <th>Email</th>
        <th>PhoneNumber</th>
        <th>StoreID</th>
        </tr>";
    while ($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>";
        foreach ($row as $item) {
            echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Free statement and close connection
    oci_free_statement($stmt);
    oci_close($conn);
    
    ?>
    <?php
    // Establish database connection
    $conn = oci_connect('x9j25', 'x9j25');

    // Check connection
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    // Prepare SQL statement
    $stmt = oci_parse($conn, "SELECT * FROM DeliveryEmployee");

    // Execute SQL statement
    oci_execute($stmt);

    // Display results
    echo "<h2>All DeliveryEmployee:</h2>";
    echo "<table>
        <tr>
        <th>EmployeeID</th>
        <th>Name</th>
        <th>Position</th>
        <th>Email</th>
        <th>PhoneNumber</th>
        <th>StoreID</th>
        </tr>";
    while ($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>";
        foreach ($row as $item) {
            echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Free statement and close connection
    oci_free_statement($stmt);
    oci_close($conn);
    
    ?>
    <?php
// Database connection
$conn = oci_connect('x9j25', 'x9j25');

// Check connection
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Function to add purchase to database
function addPurchase($purchase_id, $customer_id) {
    global $conn;
    // Prepare SQL statement
    $stmt = oci_parse($conn, "INSERT INTO Purchase (PurchaseID, CustomerID) VALUES (:purchase_id, :customer_id)");

    // Bind parameters
    oci_bind_by_name($stmt, ':purchase_id', $purchase_id);
    oci_bind_by_name($stmt, ':customer_id', $customer_id);

    // Execute SQL statement
    oci_execute($stmt);
}

// Check if purchase search form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['purchase_id'])) {
    // Retrieve purchase ID from form
    $purchase_id = $_POST['purchase_id'];

    // Retrieve customer ID from session (assuming it's set after customer login)
    $customer_id = $_SESSION['customer_id'];

    // Add purchase to database
    addPurchase($purchase_id, $customer_id);

    // Display search results...
}

// Display previous purchases for the logged-in customer
if (isset($_SESSION['customer_id'])) {
    // Retrieve customer ID from session
    $customer_id = $_SESSION['customer_id'];

    // Prepare SQL statement to retrieve purchase history for the customer
    $stmt = oci_parse($conn, "SELECT * FROM Purchase WHERE CustomerID = :customer_id");
    oci_bind_by_name($stmt, ':customer_id', $customer_id);
    oci_execute($stmt);

    // Display purchase history
    echo "<h2>Previous Purchases:</h2>";
    echo "<ul>";
    while ($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<li>" . htmlentities($row['PurchaseID'], ENT_QUOTES) . "</li>";
    }
    echo "</ul>";
}

// Close database connection
oci_close($conn);
?>
    <a href="LoginD.php">Return to Home</a>
</body>
</html>
