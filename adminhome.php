<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
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
    <?php include('adminAC.php'); ?> 
    <?php

    $conn = mysqli_connect("localhost", "root", "", "exotic-rentals", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT username, pswd, email, mfa_pin, rol FROM cred";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>MFA PIN</th>
                    <th>Role</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["username"] . "</td>
                    <td>" . $row["pswd"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["mfa_pin"] . "</td>
                    <td>" . $row["rol"] . "</td>
                </tr>";
        }
        echo "</table>";

        echo "<button onclick=\"location.href='login.php'\">Sign Out</button>";
    } else {
        echo "<p>No records found.</p>";
    }

    $conn->close();
    ?>
</body>
</html>
