<table width="800px" class="table  table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Comments</th>
            <th>Email</th>
            <th>Status</th>
            <th>Date</th>
            <th>Post</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php find_all_comments();?>
        <?php approve_comment(); unapprove_comment();?>
        <?php delete_comment();?>
        <?php //edit($post_id)?>

            
    </tbody>
</table>











