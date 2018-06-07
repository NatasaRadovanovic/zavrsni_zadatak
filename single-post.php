<?php
  
    include('include/connection.php');
    
    include('include/header.php');
?>

<?php

if(isset($_GET['Id'])){
    
   
    $sql = "SELECT p.Title,p.Body, p.Author, p.Created_at, c.Author as comment_author, c.Text,c.Id
           FROM posts as p LEFT JOIN comments as c ON p.id = c.Post_id WHERE p.id = {$_GET['Id']}";
     
     $singlePost = database($sql, $connection,'fetchAll');
   
     $comments = [];
     $count = count($singlePost);
     
    for($i = 0; $i < $count; $i++){
        $comments[$i]['Id'] = $singlePost[$i]['Id'];
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


            <form action = 'create-comment.php' method='POST'>
           <label>Name:</label><br>
           <input class="form-control" type ='text' name ='name'><br>
           <label>Comment:</label><br>
           <textarea class="form-control" name ='comment' cols ='50', rows='5'></textarea><br>
           <input type='hidden' name='id' value = "<?php echo $_GET['Id']?>" >
          
    
        <?php 
            if(isset($_GET['error']) && $_GET['error'] == 1){
              echo  "<div class='alert alert-danger'><p>Please fill in all the required fields</p></div>";
         
            }
        ?>
    <input class="btn btn-success" type ='submit' name='submit' value ='send'><br>
           </form>

                <?php
                echo '<br>';
           
                // sakrij sekiciju komentara ako nema komentara
            if($comments[0]['comment_author'] == "" && $comments[0]['Text'] == ""){
                ?> <h4>There are currently no comments</h4>
                <style type="text/css">#emptyComm{
                display:none;
                }</style>

                <?php } ?>  
                
                <div id= 'emptyComm'> 
                <button id ='showHide' class ='btn btn-default'>Hide comments</button><br/><br/>
        
        
            <div id ='showHideComm'>
                
                <h3>Comments</h3><br/>
                <?php
                
                foreach($comments as $comment){
                 ?>
               
               
                <ul>
                    <li>
                    <p><?php echo $comment['comment_author'] ?><p>
                    <?php echo $comment['Text']?>

                    <form action='delete-comment.php' method='POST'>
                    <input type ='hidden' name='post_id' value = "<?php echo $_GET['Id'] ?>">
                    <input type = 'hidden' name='comment_id' value ="<?php echo $comment['Id'] ?>">

                    <input type ='submit' name='deleteComm' value='delete'  class='btn-danger btn-sm' id='delete'>
                    </form>
                    </li>
                    
                </ul>
                
                <hr>
            
                    <?php }

                ?>
            </div> <!-- showHide -->
        </div> <!--emptyComm-->
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


