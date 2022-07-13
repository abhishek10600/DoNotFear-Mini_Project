<?php include 'partials/starterTemplate.php'; ?>
<?php include 'partials/_dbconnect.php'; ?>
<?php include 'partials/_navbar.php'; ?>

<?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == "POST"){
        $post_title = $_POST['post_title'];
        $post_description = $_POST['post_description'];

        $sql = "INSERT INTO `posts` (`post_user_ID`, `post_title`, `post_description`, `post_time`) VALUES ('0', '$post_title', '$post_description', current_timestamp())";
        $result = mysqli_query($conn,$sql);
        $showAlert = true;
        if($showAlert == true){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Thank you for posting!</strong> Discussion will start soon.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>';
        }
    }
?>

<div class="container-fluid d-flex">
    <div class="headerLeft">
        <div class="headerLeftText">
            <h1 class="text-center display-1 sm-display-6">Welcome To Do Not Fear</h1>
            <h3 class="text-center">You are not <span id="text_1">alone</span></h3>
        </div>
    </div>
    <div class="headerImage">
        <img id="headerImg" src="images/Tree.jpg" alt="">
    </div>
</div>
<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
echo'
<div class="container my-4">
    <h1>Write How You Feel!</h1>
    <form class="my-4" action = "/Minor-Project/index.php" method = "post">
        <div class="mb-3">
            <label for="post_title" class="form-label">Title</label>
            <input type="text" class="form-control" id="post_title" name="post_title" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <div class="form-floating textarea-color">
                <textarea class="form-control" placeholder="Leave a comment here" id="post_description" name="post_description" style="height: 100px"></textarea>
                <label for="post_description">Describe Your Feelings</label>
            </div>
        </div>
        <button type="submit" class="btn postBtn lightGreen">Post</button>
    </form>
</div>';
}
else
{
    echo ' <div class="container my-4">
    <h1>Write How You Feel!</h1>
    <div class="p-5 mb-4 rounded-3 bg-danger">
        <h3 class="fw-bold">You are not logged in. Please login to post!</h3>
    </div>
</div>';
}
?>
<div class="container my-4 ">
    <h1 class="lightGreen">Recent Posts</h1>
    <?php
            $sql = "SELECT * FROM `posts` ";
            $result = mysqli_query($conn,$sql);
            $noResult = true;
            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $post_ID = $row['post_ID'];
                $post_user_ID = $row['post_user_ID']; 
                $post_title = $row['post_title'];
                $post_description = $row['post_description'];
                $post_time = $row['post_time'];
            echo '<div class="Posts my-4 bg-light">
            <div class="userName px-4">
                        <p class="fs-3 my-2">Anonymous User: Posted on '.$post_time.'</p>
                    </div>
                    <div class="userName px-4 py-2">
                    <h4 class="mx-2"><a href="post_discussions.php?post_id='.$post_ID.'">'.$post_title.'</a></h4>
                    </div>
                    <div class="postTitle px-4">
                        <p class="text-center">'.substr($post_description,0,250).'...</p>
                    </div>
                </div>';
            }
            if($noResult){
                echo 'Be The First Person To post';
            }
            ?>
</div>


<?php include 'partials/_footer.php';?>      
<?php include 'partials/endingTemplate.php'; ?>