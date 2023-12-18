<?php
session_start();

include("connection.php");
include("function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        // Check the database for the provided username and password
        $query = "SELECT * FROM table1 WHERE user_name = '$user_name' AND password = '$password'";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // Login successful
            $user_data = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $user_data['user_id'];
            header("location: index.html"); // Redirect to a welcome page or dashboard
            die;
        } else {
            // Incorrect username or password
            echo '<script> alert("Incorrect username or password. Please try again.");</script>';
        }
    } else {
        echo '<script>alert("Please enter valid information!");</script>';
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        #box {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            color: #333;
            max-width: 400px;
            width: 100%;
        }

        #head {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #3498db;
        }

        input[type="text"],
        input[type="password"] {
            height: 40px;
            border: 1px solid #ccc;
            padding: 10px;
            width: 100%;
            margin: 10px 0;
            border-radius: 5px;
            outline: none;
            box-sizing: border-box;
        }

        #button {
            padding: 12px;
            width: 100%;
            color: #fff;
            font-weight: bold;
            font-size: 16px;
            background-color: #3498db;
            border: none;
            margin: 10px 0;
            border-radius: 5px;
            cursor: pointer;
        }

        #button:hover {
            background-color: #267bb5;
        }

        #link,
        #link1 {
            color: #555;
            margin-top: 15px;
            display: block;
        }

        #link1 {
            margin-top: 10px;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div id="box">
        <form method="post">
            <div id="head">Login</div>
            <input type="text" name="user_name" placeholder="Username">
            <input type="password" name="password" placeholder="Password">

            <a href="forgotpass.php" id="link1">Forgot Password?</a>
            <input type="submit" value="Login" id="button">

            <div id="link">Not yet a member? <a href="Signup.php">Sign Up</a></div>
        </form>
    </div>

</body>
</html>
