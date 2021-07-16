<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application - Edit Users</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assests/css/bootstrap.min.css';?>">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">CRUD</a>
        </div>
    </nav>
    <div class="container">
        <h3>Update Users profile</h3>
        <div class="col-md-12">
        <a href="<?php echo base_url().'index.php/user/index';?>" class="btn btn-success">Go back to List</a>
        </div>
        <hr>
        <div class="row">
            <form method="post" name="editUser" action="<?php echo base_url().'index.php/User/edit/'.$user['user_id'];?>">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="<?php echo set_value('name',$user['name']);?>" class="form-control">
                        <?php echo form_error('name');?>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="<?php echo set_value('email',$user['email']);?>" class="form-control">
                        <?php echo form_error('email');?>
                    </div>
                    <br>
                    <div class="form-group">
                        <button class="btn btn-primary">Update</button>
                        <a href="<?php echo base_url().'index.php/user/index';?>" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>