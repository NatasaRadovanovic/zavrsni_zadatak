<?php 
    //dodavanje konkencije
    include('include/connection.php');
    
    if(!isset($_POST['submit'])){
        header("Location:single-post.php?Id=$id");
    }else{
        $name = $_POST['name'];
        $comment  = $_POST['comment'];
        $id = $_POST['id'];

        if(empty($name) || empty ($comment)){
            header("location:single-post.php?error=1&Id=$id");
        }else{
            //kreiranje upita za unos podataka u bazu podataka 
            $sql = "INSERT INTO comments (Author,Text,Post_id) VALUES ('$name','$comment','$id')";
    
            $statement = $connection->prepare($sql);
            $statement->execute();
    
           header("Location:single-post.php?Id=$id");
        }
    }

    

    
?>
