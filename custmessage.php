<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Messages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            margin-top: 20px;
            padding: 10px;
            background-color: #ee8719;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #bf701b;
        }
    </style>
</head>
<body>
    <?php include('employeeAC.php'); ?>
    <h2>Contact Us Messages</h2>

    <?php

    $connect = mysqli_connect("localhost", "root", "", "exotic-rentals", 3306);

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT customername, email, usermessage FROM contactus";
    $result = mysqli_query($connect, $sql);

    if ($result === false) {
        echo "<p>Error executing the query: " . mysqli_error($connect) . "</p>";
    } elseif (mysqli_num_rows($result) > 0) {
        echo "<table>
                <tr>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>User Message</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row["customername"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["usermessage"] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No contact us messages found.</p>";
    }

    mysqli_close($connect);
    ?>

    <button onclick="location.href='employeehome.php'">Go to Home</button>
</body>
</html>
