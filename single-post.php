<?php
    include('include/connection.php');
    
    include('include/header.php');
?>

<?php

if(isset($_GET['Id'])){
   
    $sql = "SELECT p.Title,p.Body, p.Author, p.Created_at, c.Author as comment_author, c.Text
           FROM posts as p INNER JOIN comments as c ON p.id = c.Post_id WHERE c.Post_id = {$_GET['Id']}";
     
     $singlePost = database($sql, $connection,'fetchAll');
   
     $comments = [];
     $count = count($singlePost);
     
    for($i = 0; $i < $count; $i++){
        $comments[$i]['comment_author'] = $singlePost[$i]['comment_author'];
        $comments[$i]['Text'] = $singlePost[$i]['Text'];
    }
  
?>
    <main role="main" class="container">

        <div class="row">

         <div class="col-sm-8 blog-main">
            
            <div class="blog-post">
                
                <h2 class="blog-post-title"><?php echo $singlePost[0]['Title'];?></h2>
                <p class="blog-post-meta"><?php echo $singlePost[0]['Created_at']; ?> by <a href="#"><?php echo $singlePost[0]['Author']?></a></p>
                <p><?php echo $singlePost[0]['Body']; ?></p><br>

                <button id ='showHide' class ='btn btn-default'>Hide comments</button><br/><br/>
                
            <div id ='showHideComm'>
                
                <h3>Comments</h3><br/>
                <?php
                
                foreach($comments as $comment){

                ?>
                <p><?php echo $comment['comment_author'] ?><p>
               
                <ul>
                    <li><?php echo $comment['Text']?></li>
                </ul>
                
                <hr>
            
                    <?php }

                ?>
            </div> <!-- showHide -->
                <?php
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

   
      
<script src = 'main.js'>

</script>
  <?php       
   
    include('include/footer.php');
    ?>    


