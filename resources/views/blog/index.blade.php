@extends('layouts.main')

@section('title', 'Blog')

@section('content')
    @include('partials.disclaimer')
       <!-- Page Content -->
    <div class="container">

        <div class="row" style="margin-top:40px;">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
               
                <?php
    /*
    
                    if(isset($_GET['p_id'])) {
                        
                        $p_id = $_GET['p_id'];
                        
                    }
                        
                        $query = "SELECT * FROM posts WHERE post_id = {$p_id} ";
                        $select_post = mysqli_query($connection, $query);
                    

                        while($row = mysqli_fetch_assoc($select_post)) {

                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                            
                            */
            
                ?>

                    <!-- First Blog Post -->
                    <h2>
                        <?php /* echo $post_title */ ?>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php /* echo $post_author */ ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php /* echo $post_date */ ?></p>
                    <hr>
<!--                    <img class="img-thumbnail" src="admin/images/<?php /* echo $post_image */ ?>" alt="">-->
                    <hr>
                    <p>
                    <?php /*
                        echo $post_content;
                        if(isset($_SESSION['role'])) {
                            $query = "SELECT * FROM users WHERE user_id = {$_SESSION['id']}";
                            $result = mysqli_query($connection, $query);
                            $row = mysqli_fetch_assoc($result);
                            $_SESSION['role'] = $row['user_role'];
                            $role = $_SESSION['role'];
                            if($role == 'admin') {
                                echo "<a href='admin/posts.php?source=edit_post&p_id={$p_id}'>edit post</a>";
                            }
                        }
                        */
                    ?>
                </p>

                    <hr>

            <?php /* } */?>
            
            <!-- Blog Comments -->
                
                <?php /*
                
                    if(isset($_POST['submit-comment'])) {
                        
                        global $connection;
                        
                        $post_id = $_GET['p_id'];
                        
                        $author = $_POST{'com_author'};
                        $email = $_POST{'com_email'};
                        $content = $_POST['com_content'];
                        
                        $query = "INSERT INTO comments(com_post_id, com_author, com_email, com_content, com_status, com_date) ";
                        $query .= "VALUES ($post_id, '$author', '$email', '$content', 'pending approval', now() ) ";
                        
                        $execute_query = mysqli_query($connection, $query);
                        
                        $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                        $query .= "WHERE post_id = $post_id ";
                        
                        mysqli_query($connection, $query);
                        
                        header("Location: post.php?p_id={$post_id}");
                        
                        
                    }
                */
                ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                       
                        <div class="form-group">
                            <label for="author">Your Name</label>
                            <input type="text" class="form-control" name="com_author" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <input type="email" class="form-control" name="com_email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="comment">Your Comment</label>
                            <textarea class="form-control" name="com_content" id="" cols="30" rows="5" required></textarea>  
                        </div>
                        
                        <button type="submit" class="btn btn-primary" name="submit-comment">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                    <?php
                        /*
                    
                        if(isset($_GET['p_id'])) {
                            
                            $p_id = $_GET['p_id'];
                        
                            $get_comments_query = "SELECT * FROM comments WHERE com_post_id = {$p_id} AND com_status = 'approved' ORDER BY com_date DESC ";
                            
                            $result = mysqli_query($connection, $get_comments_query);
                            
                            while($row = mysqli_fetch_assoc($result)) {
                                
                                $com_author = $row['com_author'];
                                $com_email = $row['com_email'];
                                $com_status = $row['com_status'];
                                $com_content = $row['com_content'];
                                $com_date = $row['com_date'];
                                
                                $com_date = date("m/d/Y", strtotime($com_date));
                                    
                                ?>
                                     <!-- Comment -->
                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><?php echo $com_author; ?>
                                                <small><?php echo $com_date; ?></small>
                                            </h4>
                                                <?php echo $com_content; ?>
                                        </div>
                                    </div>
                               <?php       
                                }
                            }   
                            
                        */
                    ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            @include('partials.sidebar')

        </div>
        <!-- /.row -->

        <hr>
</div>
@endsection