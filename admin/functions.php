<?php 
    // ERRORS FUNCTIONS
    function confirm($result){
        global $connection;
        if(!$result){
            die("QUERY FAILD ." . mysqli_error($connection));
        }
    }
    // TITLE
   
    //FIND ALL POSTS
    function find_all_posts(){
        global $connection;
        $query ="SELECT * FROM posts";
        $select_posts= mysqli_query($connection, $query);
        while($row =mysqli_fetch_assoc($select_posts)){
            $post_id =$row['post_id'];
            $post_category_id =$row['post_category_id'];
            $post_title =$row['post_title'];
            $post_author =$row['post_author'];
            $post_user =$row['post_user'];
            $post_date =$row['post_date'];
            $post_image =$row['post_image'];
            $post_content =$row['post_content'];
            $post_tags =$row['post_tags'];
            $post_comment_count =$row['post_comment_count'];
            $post_status =$row['post_status'];
            $post_views_count =$row['post_views_count'];

            echo "<tr>";
            echo "<td>{$post_id}</td>";
            echo "<td>{$post_title}</td>";
            echo "<td><img style='object-fit: cover;width:70px;height:70px;border-radius: 50%;' src='../imgs/{$post_image}'></td>";
            echo "<td>{$post_author}</td>";
            $query ="SELECT * FROM categories WHERE cat_id =$post_category_id";
            $select_categories_id= mysqli_query($connection, $query);
            while($row =mysqli_fetch_assoc($select_categories_id)){
                $cat_id =$row['cat_id'];
                $cat_title =$row['cat_title'];
            echo "<td>{$cat_title}</td>";
            }
            echo "<td>{$post_status}</td>";
            echo "<td>{$post_comment_count}</td>";
            echo "<td>{$post_date}</td>";
            echo "<td><a class='btn btn-danger' href='posts.php?delete={$post_id}'>Delete</a> <a class='btn btn-primary' href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
            echo "</tr>";
        }
    }

    // ADD POST
    function add_post(){
        global $connection;
        if(isset($_POST['create_post'])){
            $post_title =$_POST['title'];
            $post_author =$_POST['author'];
            $post_category_id =$_POST['post_category_id'];
            $post_status =$_POST['post_status'];
            $post_image =$_FILES['image']['name'];
            $post_image_temp =$_FILES['image']['tmp_name'];
            $post_tags =$_POST['post_tags'];
            $post_content =$_POST['post_content'];
            $post_date = date('d-m-y');
            // $post_comment_count = 0 ;
            move_uploaded_file($post_image_temp,"../imgs/$post_image");
            $query= "INSERT INTO posts(post_title, post_author, post_category_id, post_status, post_image, post_tags, post_content, post_date) ";
            $query .=       "VALUES('{$post_title}', '{$post_author}', '{$post_category_id}', '{$post_status}','{$post_image}', '{$post_tags}', '{$post_content}', now() )";
            $create_post_query= mysqli_query($connection, $query);
            confirm($create_post_query);
            echo "<div class='alert alert-success'><h2>Post added successfully.</h2></div>";

        }
    }

   

    //DELETE POSTS
    function delete_post(){
        global $connection;
        if (isset($_GET['delete'])){
            $the_post_id = $_GET['delete'];
            $query ="DELETE FROM posts WHERE post_id ={$the_post_id}";
            $delete_query =mysqli_query($connection,$query);         
            header("location:posts.php");
            echo "<div class='alert alert-danger'><h2>Post Revmoved successfully.</h2></div>";

        }
    }

    // FIND ALL COMMENTS
    function find_all_comments(){
        global $connection;
        $query ="SELECT * FROM comments";
        $select_comments= mysqli_query($connection, $query);
        while($row =mysqli_fetch_assoc($select_comments)){
            $comment_id      = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_author  = $row['comment_author'];
            $comment_date    = $row['comment_date'];
            $comment_email   = $row['comment_email'];
            $comment_content = $row['comment_content'];
            $comment_status  = $row['comment_status'];

            echo "<tr>";
            echo "<td>{$comment_id}</td>";
            echo "<td>{$comment_author}</td>";
            echo "<td>{$comment_content}</td>";
            echo "<td>{$comment_email}</td>";
            echo "<td>{$comment_status}</td>";
            echo "<td>{$comment_date}</td>";
            $query = "SELECT * FROM posts WHERE post_id =$comment_post_id";
            $select_post_id_query = mysqli_query($connection,$query);
            while($row =mysqli_fetch_assoc($select_post_id_query)){
                $post_id=$row['post_id'];
                $post_title=$row['post_title'];
            echo "<td><a href = '../post.php?p_id=$post_id' >{$post_title}</a></td>";
            echo "<td><a class='btn btn-primary' href='comments.php?approve={$comment_id}'>Approve</a></td>";
            echo "<td><a class='btn btn-success' href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
            echo "<td><a class='btn btn-danger' href='comments.php?delete={$comment_id}'>Delete</a></td>";
            }
            echo "</tr>";
        }
    }
    
    // DELETE COMMENTS
    function delete_comment(){
        global $connection;
        if (isset($_GET['delete'])){
            $the_comment_id = $_GET['delete'];
            $query ="DELETE FROM comments WHERE comment_id ={$the_comment_id}";
            $delete_query =mysqli_query($connection,$query);         
            header("location:comments.php");
            echo "<div class='alert alert-danger'><h2>Comment Revmoved successfully.</h2></div>";

        }
    }

    // APPROVE AND UNAPPROVE COMMENTS

    function unapprove_comment(){
        global $connection;
        if (isset($_GET['unapprove'])){
            $the_comment_id = $_GET['unapprove'];
            $query ="UPDATE comments SET comment_status ='Unapproved'WHERE comment_id ={$the_comment_id}";
            $unapprove_query =mysqli_query($connection,$query);         
            header("location:comments.php");
            echo "<div class='alert alert-success'><h2>Comment Unapproved successfully.</h2></div>";

        }
    }

    function approve_comment(){
        global $connection;
        if (isset($_GET['approve'])){
            $the_comment_id = $_GET['approve'];
            $query ="UPDATE comments SET comment_status ='Approved' WHERE comment_id ={$the_comment_id}";
            $Approve_query =mysqli_query($connection,$query);         
            header("location:comments.php");
            echo "<div class='alert alert-success'><h2>Comment Approved successfully.</h2></div>";

        }
    }

    // Find all Categories
    function find_all_categories(){
        global $connection;
        $query ="SELECT * FROM categories";
        $select_categories= mysqli_query($connection, $query);
            while($row =mysqli_fetch_assoc($select_categories)){
                $cat_id =$row['cat_id'];
                $cat_title =$row['cat_title'];
                echo "<tr>";
                echo "<td>{$cat_id}</td>";
                echo "<td>{$cat_title}</td>";
                echo "<td><a class='btn btn-danger' href='categories.php?delete={$cat_id}'>Delete</a> <a class='btn btn-primary' href='categories.php?edit={$cat_id}'>Edit</a></td>";
                echo "</tr>";
            }
    }

    // INSERT CATEGORY
    function insert_categories() {
        global $connection;
        if(isset($_POST['submit'])){
            $cat_title=$_POST['cat_title'];
            if($cat_title==""| empty($cat_title)){
                echo "<div class='alert alert-danger'><h5>This field should not be empty.</h5></div>";
            }
            else{
                $query = "INSERT INTO categories(cat_title)";
                $query .= "VALUE('{$cat_title}')";
                $create_category_query = mysqli_query($connection,$query);
                echo "<div class='alert alert-success'><h5>Category Added successfully.</h5></div>";
                if(!$create_category_query){
                    die('QUERY FAILED'. mysqli_error($connection));
                }
            }
        }
    }
   
    // DELETE CATEGORIES
    function delete_categories(){
        global $connection;
        if(isset($_GET['delete'])){
            $the_cat_id= $_GET['delete'];
            $query ="DELETE FROM categories WHERE cat_id ={$the_cat_id}";
            $delete_query =mysqli_query($connection,$query);
            header("location:categories.php");
        } 
    }

    // UPDATE CATEGORIES
    function update_categories(){
        global $connection;
        if(isset($_GET['edit'])){
            $cat_id= $_GET['edit'];
            include "includes/update-category.php"; 
        }
    }
     
    // FIND ALL USERS
    function find_all_users(){
        global $connection;
        $query ="SELECT * FROM users";
        $select_users= mysqli_query($connection, $query);
        while($row =mysqli_fetch_assoc($select_users)){
            $user_id         = $row['user_id'];
            $username        = $row['username'];
            $user_firstname  = $row['user_firstname'];
            $user_lastname   = $row['user_lastname'];
            $user_email      = $row['user_email'];
            $user_image      = $row['user_image'];
            $user_role       = $row['user_role'];

            echo "<tr>";
            echo "<td>{$user_id}</td>";
            echo "<td>{$username}</td>";
            echo "<td>{$user_firstname}</td>";
            echo "<td>{$user_lastname}</td>";
            echo "<td>{$user_email}</td>";
            echo "<td>{$user_role}</td>";
            echo "<td><a class='btn btn-primary' href='users.php?admin={$user_id}'>Subscriber</a></td>";
            echo "<td><a class='btn btn-success' href='users.php?subscriber={$user_id}'>Admin</a></td>";
            echo "<td><a class='btn btn-info' href='users.php?source=edit_user&u_id={$user_id}'>Update</a></td>";
            echo "<td><a class='btn btn-danger' href='users.php?delete={$user_id}'>Delete</a></td>";
            echo "</tr>";
        }
    }

    // ADD USER
    function add_user(){
            global $connection;
            if(isset($_POST['create_user'])){
                $username       = $_POST['username'];
                $user_firstname = $_POST['user_firstname'];
                $user_lastname  = $_POST['user_lastname'];
                $user_password  = $_POST['user_password'];
                $user_email     = $_POST['user_email'];
                $user_role      = $_POST['user_role'];
                //$user_image =$_FILES['image']['name'];
                //$user_image_temp =$_FILES['image']['tmp_name'];
                //$post_date = date('d-m-y');
                // $post_comment_count = 0 ;
                //move_uploaded_file($user_image_temp,"../user-imgs/$user_image");
                $query= "INSERT INTO users(username, user_firstname, user_lastname, user_password, user_email, user_role) ";
                $query .=       "VALUES('{$username}', '{$user_firstname}', '{$user_lastname}', '{$user_password}', '{$user_email}','{$user_role}')";
                $create_user_query= mysqli_query($connection, $query);
                confirm($create_user_query);
                echo "<div class='alert alert-success'><h2>User added successfully.</h2></div>";
            }
        }

        // DELETE USER
        function delete_user(){
            global $connection;
            if(isset($_GET['delete'])){
                $the_user_id= $_GET['delete'];
                $query ="DELETE FROM users WHERE user_id ={$the_user_id}";
                $delete_query =mysqli_query($connection,$query);
                header("location:users.php");
            } 
        }

/////// USER ROLE //////////////
        // ADMIN ROLE
        function user_admin(){
            global $connection;
            if (isset($_GET['admin'])){
                $the_user_id = $_GET['admin'];
                $query ="UPDATE users SET user_role ='Subscriber'WHERE user_id ={$the_user_id}";
                $unapprove_query =mysqli_query($connection,$query);         
                header("location:users.php");
            }
        }
        // SUBSCRIBER ROLE
        function user_subscriber(){
            global $connection;
            if (isset($_GET['subscriber'])){
                $the_user_id = $_GET['subscriber'];
                $query ="UPDATE users SET user_role ='Admin' WHERE user_id ={$the_user_id}";
                $Approve_query =mysqli_query($connection,$query);         
                header("location:users.php");
            }
        }

        
    









?>