<table width="800px" class="table  table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
            <th>Subscriber</th>
            <th>Admin</th>
            <th>Update</th>
            <th>Delete</th>


        </tr>
    </thead>
    <tbody>

        <?php find_all_users();?>
        <?php user_subscriber(); user_admin();?>
        <?php delete_user();?>
            
    </tbody>
</table>











