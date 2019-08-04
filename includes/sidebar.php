    <div class="col-md-4">

        <!-- Blog Search Well -->
        <div class="well">
            <h4>Blog Search</h4>
            <form action="search.php" method="post">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
            </div>
            </form>
        </div>


        <!-- SIGN IN  -->
        <div class="well">
            <h4>Sign In</h4>
            <form action="includes/login.php" method="post">
            
                <div class="form-group">
                    <label for="">Username</label>
                    <input name="username" placeholder="Enter Username" type="text" value="" class="form-control">
                </div>
                
                <label for="password">Password</label>
                <div class="input-group">
                    <input name="password" placeholder="Enter Username" type="password" value="" class="form-control">
                    <span class="input-group-btn">
                    <button name="login" class="btn btn-primary" type="submit">Sign In</button>
                    </span>
                </div>
               
           
            </form>
        </div>



        <!-- Blog Categories Well -->
        <div class="well">
            <?php
                $query ="SELECT * FROM categories";
                $select_categories_sidebar= mysqli_query($connection, $query);  
            ?>
            <h4>Blog Categories</h4>
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <?php
                            while($row =mysqli_fetch_assoc($select_categories_sidebar)){
                                $cat_title =$row['cat_title'];
                                $cat_id =$row['cat_id'];
                                echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Side Widget Well -->
       <?php include "widget.php"?>

    </div>