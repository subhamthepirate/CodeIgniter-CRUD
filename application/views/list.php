<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application - View Users</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assests/css/bootstrap.min.css';?>">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">CRUD</a>
        </div>
    </nav>
    <div class="container">
        <div class="col-md-6"><h3>View Users profile</h3></div>
        <div class="col-md-6 text-right">
            <a href="<?php echo base_url().'index.php/user/create'?>" class="btn btn-success">Create</a>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-dark table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                        if(!empty($users)){foreach($users as $user){
                    ?>
                    <tr>
                        <td><?php echo $user['user_id']?></td>
                        <td><?php echo $user['name']?></td>
                        <td><?php echo $user['email']?></td>
                        <td>
                            <a href="<?php echo base_url().'index.php/user/edit/'.$user['user_id'];?>" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <a href="<?php echo base_url().'index.php/user/delete/'.$user['user_id'];?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php
                        } } else {
                    ?>
                    <tr>
                        <td colspan="5">Records not found</td>
                    </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>