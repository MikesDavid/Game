<?php
    $con = mysqli_connect('localhost', 'root', '', 'szakdgame');

    if(mysqli_connect_errno())
    {
        echo "1: connection failed"; // error code #1 = connection failed
        exit();
    }

    $username = $_POST["name"];
    $password = $_POST["password"];

    //check if the username exists
    $namecheckquery = "SELECT username, password FROM users WHERE username='" . $username . "';";

    $namecheck = mysqli_query($con, $namecheckquery) or die("2: Name check query failed");
    if(mysqli_num_rows($namecheck) != 1){
        echo "3: Either no user with name, or more than one";
        exit();
    }

    //get login info from query
    $existinginfo = mysqli_fetch_assoc($namecheck);
    $pw = $existinginfo["password"];
    // if($password != $pw){
    //     echo "4: incorrect password";
    //     exit();
    // }
    if (password_verify($password, $pw))
            {
                echo "0\t";
            }
            else {
                echo '4: Incorrect password';
                exit();
            }


    //TODO descript
?>