<?php
    
    include('include/header.php');
    ?>
  <main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">
        <div class="blog-post">
    
    <div class="blog-post">
    <form action='create-post.php' method='POST'>
    <input type='text'  class="form-control"  name='author' placeholder='Enter your name'><br>
    <input type = 'text' class="form-control" name='title' placeholder='Title'><br>
    <textarea name='newPost' class="form-control" cols='50' rows='5' placeholder = 'Your post'></textarea><br>
    <input type='submit' class="btn btn-success" name='sendPost' value='send'>

    </form>

    </div><!-- /.blog-post -->
        
        </div><!-- blog-main-->  
        
        
        
   </div><!-- /.row -->
   <?php
        include("include/sidebar.php");
        ?>
        </main>
    
        <?php 
   
    include('include/footer.php');
        