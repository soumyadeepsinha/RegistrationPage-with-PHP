<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Welcome to Shopper Store</title>
    </head>
    <body style="background-color: azure">

        <?php
        $username = filter_input(INPUT_POST, 'username');
        $number = filter_input(INPUT_POST, 'number');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        if (!empty($username)) {
           if (!empty($email)) {
            if (!empty($password)) {
                $host = "localhost";
                $dbusername = "root";
                $dbpassword = "";
                $dbname = "mystore";
// Create connection
                $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
                if (mysqli_connect_error()) {
                    die('Connect Error (' . mysqli_connect_errno() . ') '
                            . mysqli_connect_error());
                } else {
                    $sql = "INSERT INTO registration (username, number, email, password)
values ('$username','$number','$email', '$password')";
                    if ($conn->query($sql)) {
                        echo "<h2><center>You've Registered Sucessfully"
                        . "<br>WELCOME TO OUR WEBSITE"
                                . "<br>tHANK yOU PLEASE vISIT AGAIN!!</ceneter></h2>";
                        echo "<a href = index.php><center>Go Back to Registration Page</ceneter></a>";
                    } else {
                        echo "Error: " . $sql . "
" . $conn->error;
                    }
                    $conn->close();
                }
            } else {
                echo "<h2><center>Password should not be empty</center></h2>";
                echo "<center><img src = 'images/opps.png' alt = 'images/opps.png' width='300' height='150' border='1' />"
                . "</center><br>";
                echo "<center><img src = 'images/tryagain' alt = 'images/tryagain' width='300' height='150' border='1' />"
                . "</center>";
                die();
            }
        } else {
            echo "<h2><center>Email should not be empty</center></h2>";
            echo "<center><img src = 'images/opps.png' alt = 'images/opps.png' width='300' height='150' border='1' />"
                . "</center><br>";
            die();
        }
        
        } else {
            echo "<h2><center>Username should not be empty</center></h2>";
            echo "<center><img src = 'images/tryagain' alt = 'images/tryagain' width='300' height='150' border='1' />"
                . "</center>";
            die();
        }
        ?>

    </body>
</html>

