<?php
    include('include/connection.php');
    
    include('include/header.php');
?>

<?php

if(isset($_GET['Id'])){
   
    $sql = "SELECT p.Title,p.Body, p.Author, p.Created_at, c.Author as comment_author, c.Text
           FROM posts as p INNER JOIN comments as c ON p.id = c.Post_id WHERE c.Post_id = {$_GET['Id']}";
     //$sql = "SELECT * FROM posts INNER JOIN comments ON posts.Id = comments.Post_id WHERE posts.Id = {$_GET['Id']}";
     $singlePost = database($sql, $connection,'fetch');
     

?>
    <main role="main" class="container">

        <div class="row">

         <div class="col-sm-8 blog-main">
            
            <div class="blog-post">
                
                <h2 class="blog-post-title"><?php echo $singlePost['Title'];?></h2>
                <p class="blog-post-meta"><?php echo $singlePost['Created_at']; ?> by <a href="#"><?php echo $singlePost['Author']?></a></p>
                <p><?php echo $singlePost['Body']; ?></p>

                <h3>Comments</h3>

                <?php 
                
                $comments = database($sql, $connection,'fetchAll');
                
                   
                    foreach($comments as $comment){

                ?>
                <p><?php echo $comment['comment_author'] ?><p>
               
                <ul>
                    <li><?php echo $comment['Text']?></li>
                </ul>
                
                <hr>
                    <?php }
                    }else{
                        echo "post id is not passt by url";
                    }
                    ?>

            </div><!-- /.blog-post -->
        
         </div><!-- blog-main-->  
            
    <?php
            include('include/sidebar.php');

    ?>
        </div><!-- /.row -->

</main><!-- /.container -->

   
      

  <?php       
   
    include('include/footer.php');
    ?>    


