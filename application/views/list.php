<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application - View Users</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assests/css/bootstrap.min.css';?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
    <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />


</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">CRUD</a>
        </div>
    </nav>
    <div class="container">
        <div class="col-md-8"><h3>View Users profile</h3></div>
        <div class="col-md-6 text-right">
            <a href="<?php echo base_url().'index.php/user/create'?>" class="btn btn-success">Create</a>
        </div>
        <hr>
        <div>
            <?php $this->load->view('alert'); ?>
        </div>
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
                    <tr id='<?php echo $user['user_id']?>'>
                        <td><?php echo $user['user_id']?></td>
                        <td><?php echo $user['name']?></td>
                        <td><?php echo $user['email']?></td>
                        <td>
                            <a href="<?php echo base_url().'index.php/user/edit/'.$user['user_id'];?>" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-danger remove">Delete</button>
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

<script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(isConfirm) {
            if (isConfirm) {
            $.ajax({
                url: "<?php echo base_url().'index.php/user/delete/'.$user['user_id'];?>",
                type: 'DELETE',
                error: function() {
                    alert('Something is wrong');
                },
                success: function(data) {
                    $("#"+id).remove();
                }
            });
            } else {
            swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
    });
</script>

</body>
</html>