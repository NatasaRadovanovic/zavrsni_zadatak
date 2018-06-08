<?php 
include("include/connection.php");

if(!isset($_POST['postDel'])){
    header("location:index.php");
}else{
    $postId = $_POST['post_id'];

    $sql = "DELETE FROM comments where Post_id = {$postId}";
    $statement = $connection->prepare($sql);
    $statement->execute();
  
    $sql = "DELETE FROM posts where Id={$postId}";
    $statement = $connection->prepare($sql);
    $statement->execute();

    header("location:index.php");
}

?>