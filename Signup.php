<?php
session_start();

    include("connection.php");
    include("function.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        if(!empty($first_name) && !empty($last_name) && !empty($user_name) && !empty($password) && !empty($email) && !is_numeric($user_name))
        {
            //save to data base
            $user_id = random_num(20);
            $query = "insert into table1 (user_id,first_name,last_name,user_name,password,email) values ('$user_id','$first_name','$last_name','$user_name','$password','$email')";
            
            mysqli_query($con, $query);

            
            header("location: login.php");
            die;
            
        }else
        {
            echo "Please enter some valid information!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body {
            background-image: url("f2.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            margin: 0;
            font-family: 'Times New Roman', Times, serif;
            padding-top: 65px;
        }

        #box {
            background-color: rgba(255, 255, 255, 0.9);
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 300px;
            margin: auto;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            margin-top: 50px;
        }

        #head {
            text-align: center;
            font-size: 35px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        .input-group {
            margin-bottom: 20px;
            width: 100%;
        }

        .input-group input {
            height: 40px;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            border: 1px solid #ccc;
            margin-top: 10px;
            box-sizing: border-box;
        }

        #button {
            padding: 10px;
            width: 100%;
            color: white;
            background-color: #3498db;
            border: none;
            border-radius: 5px;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
        }

        #link {
            margin-top: 20px;
            color: #333;
            text-align: center;
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
            <div id="head">Sign Up</div>

            <div class="input-group">
                <input type="text" name="first_name" placeholder="First Name">
            </div>

            <div class="input-group">
                <input type="text" name="last_name" placeholder="Last Name">
            </div>

            <div class="input-group">
                <input type="text" name="user_name" placeholder="Create Username">
            </div>

            <div class="input-group">
                <input type="password" name="password" placeholder="Create Password">
            </div>

            <div class="input-group">
                <input type="email" name="email" placeholder="Email">
            </div>

            <input id="button" type="submit" value="Sign Up">

            <div id="link">Already a Member? <a href="login.php">Login</a></div>
        </form>
    </div>

</body>
</html>
