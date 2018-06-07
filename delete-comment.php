<?php 
include("include/connection.php");

if(!isset($_POST['deleteComm'])){
    header("location:index.php");
}else{
    $postId = $_POST['post_id'];
    $commentId = $_POST['comment_id'];

 $sql = "DELETE FROM comments where Id={$commentId}";
    $statement = $connection->prepare($sql);
    $statement->execute();

    header("location:single-post.php?Id={$postId}");

}
?>

