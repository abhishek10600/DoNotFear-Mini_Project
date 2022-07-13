<?php include 'partials/starterTemplate.php'; ?>
<?php include 'partials/_dbconnect.php'; ?>
<?php include 'partials/_navbar.php'; ?>
<div class="container">

            <?php 
            $sql = "SELECT * FROM `doctors`";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result))
            {
                $doctrosID = $row['doctorID'];
                $doctorName = $row['doctorName'];
                $doctorEmail = $row['doctorEmail'];
                $doctorPhone = $row['doctorPhone'];
                $doctorDegree = $row['doctorDegree'];
                $doctorAbout = $row['doctorAbout'];

            echo '<div class="Posts my-4 bg-light">
            <div class="userName px-4">
                        <h1 class=" my-2">D.R '.$doctorName.'('.$doctorDegree.')</h1>
                    </div>
                    <div class="userName px-4 py-2">
                    <h4 class="mx-2">Email: '.$doctorEmail.'</h4>
                    </div>
                    <div class="userName px-4 py-2">
                    <h4 class="mx-2">Phone: '.$doctorPhone.'</h4>
                    </div>
                    <div class="postTitle px-4">
                        <p class="text-center">'.$doctorAbout.'</p>
                    </div>
                </div>';
            }
?>
</div>


<?php include 'partials/_footer.php';?>  
<?php include 'partials/endingTemplate.php'; ?>