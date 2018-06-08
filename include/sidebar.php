<?php 
    include_once('include/connection.php');
?>

<?php
    $sql = 'SELECT * FROM posts ORDER BY posts.Created_at DESC LIMIT 5';
    $limitPosts = database($sql, $connection,'fetchAll');
?>
<aside class="col-sm-3 ml-sm-auto blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>Latest posts</h4>

<?php 
        
 foreach($limitPosts as $post){
                   
?>
     <p>
        <a href =single-post.php?Id=<?php echo $post['Id'] ?>><?php echo $post['Title'] ?></a>
    </p>
            
 <?php 
    }
?>
           
     </div>
 </aside><!-- /.blog-sidebar -->
       
       

    