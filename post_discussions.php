<?php include 'partials/starterTemplate.php'; ?>
<?php include 'partials/_dbconnect.php'; ?>
<?php include 'partials/_navbar.php'; ?>

<?php
    $post_ID = $_GET['post_id'];
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == "POST"){
        $response = $_POST['post_response'];
        $sql = "INSERT INTO `postsresponses` (`postresponses_post_ID`, `postresponses_content`, `postresponses_user_ID`, `postresponses_time`) VALUES ('$post_ID', '$response', '0', current_timestamp());";
        $result = mysqli_query($conn,$sql);
        $showAlert = true;
        if($showAlert == true){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Thank you for responding!</strong> Your response has been successfully posted.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
        }
    }
?>

<?php
    $post_ID = $_GET['post_id'];
    $sql = "SELECT * FROM `posts` WHERE post_ID = $post_ID";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $post_ID = $row['post_ID'];
        $post_title = $row['post_title'];
        $post_description = $row['post_description'];
    echo'
    <div class="container my-4">
        <div class="p-5 mb-4 rounded-3 bg-light">
            <h1 class="display-5 fw-bold">'.$post_title.'</h1>
            <p class="col-md-12 fs-4">'.$post_description.'</p>
             <h3 class="fs-4">Posted By: <b>Anonymous User</b></h3>
        </div>
    </div>';
    }
?>

<div class="container">
        <h1 class="lightGreen">Respond To This Post</h1>
<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
    echo '
    
        <form class="my-4" action = "'.$_SERVER["REQUEST_URI"].'" method = "post">
            <div class="mb-3">
                <div class="form-floating textarea-color">
                    <textarea class="form-control" placeholder="Leave a comment here" id="post_response" name="post_response" style="height: 100px"></textarea>
                    <label for="post_response">Type Here....</label>
                </div>
            </div>
            <button type="submit" class="btn postBtn lightGreen">Post</button>
        </form>
    </div>';
}
else
{
    echo '<div class="container my-4">
    <div class="p-5 mb-4 rounded-3 bg-danger">
        <h3 class="fw-bold">You are not logged in. Please login to post!</h3>
    </div>
</div>';
}
?>
<div class="container">
    <h1 class="lightGreen">Recent Responses</h1>
    <?php
        $post_ID = $_GET['post_id'];
        $sql = "SELECT * FROM `postsresponses` WHERE postresponses_post_ID = $post_ID"; 
        $result = mysqli_query($conn,$sql); 
        $noResult = true;
        while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
            $post_response_ID = $row['postresponses_ID'];
            $post_response_post_ID = $row['postresponses_post_ID'];
            $postresponses_content = $row['postresponses_content'];
            $postresponses_user_ID = $row['postresponses_user_ID'];
            $postresponses_time = $row['postresponses_time'];
            echo '<div class="Posts my-4 bg-light">
                    <div class="userName px-4">
                        <p class="fs-3 my-2"><b>Anonymous User: Posted on '.$postresponses_time.'</b></p>
                    </div>
                    <div class="postTitle px-4 py-4">
                        <p class="fs-2">'.$postresponses_content.'</p>
                    </div>
                </div>';
        }
        if($noResult){
            echo 'Be The First Person To Respond To This Post';
        }   
    ?>
</div>
    </div>

<?php include 'partials/_footer.php';?>  
<?php include 'partials/endingTemplate.php'; ?>