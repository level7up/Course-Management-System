<table width="800px" class="table  table-bordered table-hover">
    <thead>
        <tr>
            <th>Post ID</th>
            <th>Title</th>
            <th>Image</th>
            <th>Author</th>
            <th>Category</th>
            <th>Status</th>
            <th>Comments</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php find_all_posts();?>
        <?php delete_post();?>
        <?php //edit($post_id)?>

            
    </tbody>
</table>











