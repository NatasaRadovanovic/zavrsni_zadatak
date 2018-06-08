<?php
    include('include/connection.php');
    include('include/header.php');
  
        
         
    if(!isset($_POST['sendPost'])){
        header("Location:create.php");
    }else{
        $author = $_POST['author'];
        $title = $_POST['title'];
        $newPost = $_POST['newPost'];

        if(empty($author) || empty ($title) || empty ($newPost)){
            header("location:create.php?error=1");
        }else{
            
         
            $sql = "INSERT INTO posts (Title,Body,User_id) VALUES ('$title','$newPost','$author')";
    
            $statement = $connection->prepare($sql);
            $statement->execute();
    
           header("Location:index.php");
        }
    }

      
    ?>
    
    



