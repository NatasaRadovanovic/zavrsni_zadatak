<?php
    //dodavanje konekcije sa bazom podataka
    include('include/connection.php');
    
    //dodavanje hedera
    include('include/header.php');
?>


<?php

$sql = "SELECT p.Id, p.Title,p.Body,p.Created_at,u.first_name,u.last_name FROM posts as p 
INNER JOIN users as u on p.User_id = u.id ORDER BY p.created_at DESC";

$posts = database($sql,$connection,'fetchAll');
   
?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">
       
            <?php 
    
            foreach($posts as $post){
        
            ?>

            <div class="blog-post">
                <a href="single-post.php?Id=<?php echo($post['Id']) ?>"> <h2 class="blog-post-title"><?php echo($post['Title'])?></h2></a>
                <p class="blog-post-meta"><?php echo($post['Created_at'])?>by <a href="#"><?php echo($post['first_name']).' '.($post['last_name'])?></a></p>
                <p><?php echo($post['Body'])?></p>
            
            </div><!-- /.blog-post -->

            <?php  } ?>
            
            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div><!-- /.blog-main -->
       

        <?php 
            //dodavanje sidebar-a
            include('include/sidebar.php');
        ?>

    </div><!-- /.row -->

</main><!-- /.container -->

<?php
    // dodavanje futera
    include('include/footer.php');
?>
