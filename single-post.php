<?php
  
    include('include/connection.php');
    
    include('include/header.php');
?>

<?php

if(isset($_GET['Id'])){
    
    $sql = "SELECT c.Id,c.Author,p.Title,p.Body, u.first_name, u.last_name , p.Created_at,c.Text
    FROM posts as p inner JOIN users as u ON u.id = p.User_id 
    left join comments AS c ON c.Post_id = p.Id where p.id = {$_GET['Id']}";
   
    $singlePost = database($sql, $connection,'fetchAll');
     
   
     $comments = [];
     $count = count($singlePost);
     
    for($i = 0; $i < $count; $i++){
        $comments[$i]['Id'] = $singlePost[$i]['Id'];
        $comments[$i]['Author'] = $singlePost[$i]['Author'];
       $comments[$i]['Text'] = $singlePost[$i]['Text'];
    }
  
?>
    <main role="main" class="container">

        <div class="row">

         <div class="col-sm-8 blog-main">
            
            <div class="blog-post">
                
                <h2 class="blog-post-title"><?php echo $singlePost[0]['Title'];?></h2>
                <p class="blog-post-meta"><?php echo $singlePost[0]['Created_at']; ?> by <a href="#"><?php echo $singlePost[0]['first_name']." ". $singlePost[0]['last_name']?></a></p>
                <p><?php echo $singlePost[0]['Body']; ?></p><br>

                <form action='delete-post.php' method='POST' onsubmit="return checkDel()">
               <input type ='hidden' name='post_id' value="<?php echo $_GET['Id']?>">
               <input  type = 'submit' class="btn btn-primary" name='postDel' value='Delete post'>
               </form><br>

 
            <form action = 'create-comment.php' method='POST'  onsubmit = "return validationComm()">
           <input class="form-control" id='nameComm' type ='text' name ='name'placeholder='name'><br>
           <textarea class="form-control" id='txtComm'  name ='comment' cols ='50', rows='5' placeholder="comment"></textarea><br>
           <input type='hidden' name='id' value = "<?php echo $_GET['Id']?>" >
          
    
        <?php 
            if(isset($_GET['error']) && $_GET['error'] == 1){
              echo  "<div id= 'alertComm' class='alert alert-danger'><p>Please fill in all the required fields</p></div>";
         
            }
        ?>
    <input class="btn btn-success" type ='submit' name='submit' value ='Send'><br>
           </form>

                <?php
                echo '<br>';
           
               //brisanje cele sekcije komentara ako nema ni jednog komentara 
            if($comments[0]['Author'] == "" && $comments[0]['Text'] == ""){
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
                    <p><span><?php echo $comment['Author'] ?></span><p>
                    <?php echo $comment['Text']?>

                    <form action='delete-comment.php' method='POST'>
                    <input type ='hidden' name='post_id' value = "<?php echo $_GET['Id'] ?>">
                    <input type = 'hidden' name='comment_id' value ="<?php echo $comment['Id'] ?>">

                    <input type ='submit' name='deleteComm' value='Delete'  class='btn-danger btn-sm' id='delete'>
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


