
<?php /* ADD POST */ add_post() ?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label for="post_category">Category</label>
        <select name="post_category_id" class="form-control" id="">
            <?php
                $query ="SELECT * FROM categories";
                $select_categories= mysqli_query($connection, $query);
                confirm($select_categories);
                while($row =mysqli_fetch_assoc($select_categories)){
                    $cat_id =$row['cat_id'];
                    $cat_title =$row['cat_title'];
                    echo "<option value='$cat_id'>{$cat_title}</option>";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="author">
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <input type="text" class="form-control" name="post_status">
    </div>
    <div class="form-group">
        <label for="post_image">Image</label>
        <input type="file" class="form-control" name="image">
    </div>
    <div class="form-group">
        <label for="tags">Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea type="text" class="form-control" name="post_content" id=""col="30" row="10"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Post">
    </div>
    
</form>