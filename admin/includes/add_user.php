
<?php /* ADD POST */ add_user() ?>

<form action="" method="post" enctype="multipart/form-data">    
     
     
     
    <div class="form-group">
        <label for="title">Firstname</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    
    
    

    <div class="form-group">
        <label for="post_status">Lastname</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    
    
        <div class="form-group">
    
    <select class="form-control" name="user_role" id="">
        <option value="subscriber">Select Options</option>
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
        
    
    </select>
    
    
    
    
    </div>
    
<!--
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file"  name="image">
    </div>
-->

    <div class="form-group">
        <label for="username">Username</label>
        <input value="" type="text" class="form-control" name="username">
    </div>
    
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    
    <div class="form-group">
        <label for="password">Password</label>
        <input value="" type="password" class="form-control" name="user_password">
    </div>
    
    
    

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>


</form>