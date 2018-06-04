<?php
    //dodavanje konekcije sa bazom podataka
    include('connection.php');
    //dodavanje hedera
    include('include/header.php');
?>


<?php


$sql = "SELECT * FROM posts ORDER BY posts.created_at DESC";
$statement = $connection->prepare($sql);


$statement->execute();


$statement->setFetchMode(PDO::FETCH_ASSOC);


$posts = $statement->fetchAll();


    //var_dump($posts);
    echo '</pre>';

?>



<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">
        <?php 
    foreach($posts as $post){
        ?>

            <div class="blog-post">
               <a href='single-post.php'> <h2 class="blog-post-title"><?php echo($post['Title'])?></h2></a>
                <p class="blog-post-meta"><?php echo($post['Created_at'])?>by <a href="#"><?php echo($post['Author'])?></a></p>

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
