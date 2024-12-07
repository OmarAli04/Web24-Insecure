<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Bookings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #ee8719;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        button {
            background-color: #ee8719;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        button:hover {
            background-color: #bf701b;
        }
    </style>
</head>
<body>
<?php include('employeeAC.php'); ?>
<?php

// Create connection
$conn = mysqli_connect("localhost", "root", "", "exotic-rentals", 3306);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch booking data from the database
$sql = "SELECT pickup, dropoff, car, customername FROM booking";
$result = $conn->query($sql);

// Check if there are rows in the result
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Pickup</th>
                <th>Dropoff</th>
                <th>Car</th>
                <th>Customer Name</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["pickup"] . "</td>
                <td>" . $row["dropoff"] . "</td>
                <td>" . $row["car"] . "</td>
                <td>" . $row["customername"] . "</td>
            </tr>";
    }
    echo "</table>";

    echo "<button onclick=\"location.href='employeehome.php'\">Go to Home Page</button>";
} else {
    echo "No bookings found.";
}

// Close connection
$conn->close();
?>

</body>
</html>

