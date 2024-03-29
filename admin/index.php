<?php include "includes/admin-header.php"?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include "includes/admin-nav.php"?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome <?php echo $_SESSION['user_role']?>
                            <small><?php echo $_SESSION['username'];?></small>
                        </h1>
                        
                    </div>
                </div>

                <!-- WIDGETS -->
                <div class="row">
                    <!-- POSTS -->
                    <div class="col-lg-3 col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php 
                                            $query ="SELECT * FROM posts";
                                            $select_all_posts =mysqli_query($connection,$query);
                                            $post_count = mysqli_num_rows($select_all_posts);
                                            echo "<div class='huge'>$post_count</div>"
                                        ?>
                                        
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- COMMENTS -->
                    <div class="col-lg-3 col-md-3">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php 
                                            $query ="SELECT * FROM comments";
                                            $select_all_comments =mysqli_query($connection,$query);
                                            $comment_count = mysqli_num_rows($select_all_comments);
                                            echo "<div class='huge'>$comment_count</div>"
                                        ?>

                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- USERS -->
                    <div class="col-lg-3 col-md-3">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php 
                                            $query ="SELECT * FROM users";
                                            $select_all_users =mysqli_query($connection,$query);
                                            $users_count = mysqli_num_rows($select_all_users);
                                            echo "<div class='huge'>$users_count</div>"
                                        ?>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- CATEGORIES -->
                    <div class="col-lg-3 col-md-3">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php 
                                            $query ="SELECT * FROM categories";
                                            $select_all_categories =mysqli_query($connection,$query);
                                            $categories_count = mysqli_num_rows($select_all_categories);
                                            echo "<div class='huge'>$categories_count</div>"
                                        ?>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- CHART -->
                <div class="row">
                    <div id="top_x_div" style="width:200px; height:400px;"></div>
                </div>
            
            </div>
        </div>
<?php include "includes/admin-footer.php"?>


<!-- GOOGLE CHART -->
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
        ['Date', 'Count'],
        <?php
            $element_text  = ['Active Posts', 'Comments', 'Users', 'Categories'];
            $element_count = [$post_count, $comment_count, $users_count, $categories_count];
            for($i=0; $i<4; $i++ ){
                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}]," ;
            }
        ?>
        // ["King's pawn (e4)", 44],
        // ["Queen's pawn (d4)", 31],
        // ["Knight to King 3 (Nf3)", 12],
        // ["Knight to King 3 (Nf3)", 12],
       
       
        ]);

        var options = {
        width: 600,
        legend: { position: 'none' },
        chart: {
            title: '',
            subtitle: '' },
        axes: {
            x: {
            0: { side: 'top', label: 'White to move'} // Top x-axis.
            }
        },
        bar: { groupWidth: "60%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
    };
</script>