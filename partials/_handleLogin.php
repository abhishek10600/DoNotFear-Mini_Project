<?php
    $showError = "false";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        include "_dbconnect.php";
        $userEmail = $_POST['loginEmail'];
        $userPassword = $_POST['loginPassword'];
        $sql = "SELECT * FROM `users` WHERE userEmail = '$userEmail'"; 
        $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);
        if($numRows == 1)
        {
            $row = mysqli_fetch_assoc($result);
            if(password_verify($userPassword,$row['userPassword']))
            {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['userEmail'] = $userEmail;
                echo "Logged in ".$userEmail;
            }
            header("Location: /Minor-Project/index.php");
        }
        header("Location: /Minor-Project/index.php");
    }
?>