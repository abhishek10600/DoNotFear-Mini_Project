<?php
    $showError = "false";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        include '_dbconnect.php';
        $userName = $_POST['userName'];
        $signupEmail = $_POST['signupEmail'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $existSql = "SELECT * FROM `users` WHERE userEmail = $signupEmail";
        $result = mysqli_query($conn, $existSql);
        $numRows = mysqli_num_rows($result);
        if($numRows > 0)
        {
            $showError = "User with this e-mail already exists.";
        }
        else
        {
            if($password == $cpassword)
            {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`userName`, `userEmail`, `userPassword`) VALUES ('$userName', '$signupEmail', '$hash')";
                $result = mysqli_query($conn, $sql);
                if($result)
                {
                    $showAlert = true;
                    header("Location:/Minor-Project/index.php?signupsuccess=true");
                    exit();
                }
            }
            else
            {
                $showError = "Password do not match";
            }
        }
        header("Location:/Minor-Project/index.php?signupsuccess=false&error=$showError");
    }
?>