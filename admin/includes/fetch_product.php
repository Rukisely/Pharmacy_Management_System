<?php
// Replace with your database connection details
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'pharmarcy';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Check if there are products
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $product_name = $row["name"];
        $buy_price = $row["buy_price"];
        $sale_price = $row["sale_price"];

        // Calculate profit
        $profit = $sale_price - $buy_price;

        // Output product details including profit
        echo "Product: $product_name, Buy Price: $buy_price, Sale Price: $sale_price, Profit: $profit<br>";
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
