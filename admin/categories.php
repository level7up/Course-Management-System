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
                            Welcome
                            <small><?php echo $_SESSION['username'];?></small>
                        </h1>
                        <!-- Add Category form -->
                        <div class="col-xs-6">
                            <label for="cat-title">Add Category </label><br>
                            <!-- INSERT CATEGORIES -->
                            <?php insert_categories();?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>

                            <!-- UPDATE CATEGORIES -->
                            <?php update_categories();?>

                        </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <!-- Find all Categories -->
                                <?php find_all_categories(); ?>

                                <!-- DELETE CATEGORIES -->
                                <?php delete_categories(); ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin-footer.php"?>