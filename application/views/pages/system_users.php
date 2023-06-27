<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <div class="row" style="background-color: transparent!important;">
                <div class="col-md-4">
                               
                </div>
                <div class="col-md-8">
                    <?php if ($this->session->flashdata('warning')) { ?>
                        <div class="alert alert-warning alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                            <strong>Warning!</strong> <?= $this->session->flashdata('warning') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                            </button>
                        </div>
                    <?php }?>
                    <?php if ($this->session->flashdata('message')) { ?>
                        <div class="alert alert-success alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
                            <strong>Success!</strong> <?= $this->session->flashdata('message') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                            </button>
                        </div>
                    <?php }?>
                    <?php if ($this->session->flashdata('error')) { ?>
                        <div class="alert alert-danger alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                            <strong>Suspended!</strong> <?= $this->session->flashdata('error') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                            </button>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                        <!-- <div class="row"> -->
                        <!-- </div> -->
                    <div class="card-header">
                        <div class ="col-lg-4">
                            <h4 class="card-title">Admin List</h4>
                        </div>
                        <div class="col-lg-4"></div>
                        <div class ="col-lg-4" align="right">
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target=".addNewUser">
                                Add New Admin
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>N<sup><u>o</u></sup></th>
                                        <th>User Name</th>
                                        <th>Full Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php  if(!empty($users)){
                                    foreach ($users as $key => $user) {?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $user->user_name ?></td>
                                            <td><?php echo $user->full_name ?></td>
                                            <td>
                                                <?php
                                                    if( $user->status == 0 ){?>
                                                        <label class="switch">
                                                            <input type="checkbox" checked id="active<?php echo $user->system_user_id ?>">
                                                            <span class="slider round"></span>
                                                        </label>
                                                        <?php }else{ ?>
                                                    <label class="switch">
                                                        <input type="checkbox" id="suspend<?php echo $user->system_user_id ?>">
                                                        <span class="slider round"></span>
                                                    </label>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-info shadow btn-xs sharp me-1" type="button" data-bs-toggle="modal" data-bs-target=".editUser<?php echo $user->system_user_id; ?>"><i class="fa fa-pencil"></i></a>
                                            </td>
                                        </tr>
                                <?php  }
                                       
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade addNewUser" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Location</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                <div class="basic-form">
                    <?php echo form_open_multipart('SystemUsers/AddNewUser');?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>Full Name</label>
                                    <input type="text" name="full_name" class="form-control input-default " placeholder="Full Name"  autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>Username</label>
                                    <input type="text" name="user_name" class="form-control input-default " placeholder="User Name"  autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>Password</label>
                                    <input type="text" name="password" class="form-control input-default " placeholder="password"  autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"> Add </button>
                    <?php echo form_close()?>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('assets/'); ?>js/jquery.min.js"></script>  
    
    <?php  if(!empty($users)){
        foreach ($users as $key => $user) {?>
        <div class="modal fade editUser<?php echo $user->system_user_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit <?php echo $user->full_name ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="basic-form">
                        <?php echo form_open_multipart('SystemUsers/editUser/'.$user->system_user_id);?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label>City</label>
                                        <input type="text" name="full_name" class="form-control input-default " placeholder="Full Name"  autocomplete="off" required value="<?php echo $user->full_name; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label>Branch Name</label>
                                        <input type="text" name="user_name" class="form-control input-default " placeholder="user_name"  autocomplete="off" required value="<?php echo $user->user_name; ?>">
                                    </div>
                                </div>

                                <div id="edit_line<?php echo $user->system_user_id ?>"></div>                
                                <button class="btn btn-info btn-md" id="new_phone<?php echo $user->system_user_id; ?>"><i class="fa fa-plus fa-md"></i> New Password</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"> Update </button>
                        <?php echo form_close()?>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function(){

                var i = 1;
                $('#new_phone<?php echo $user->system_user_id; ?>').click(function(e){
                    event.preventDefault();
                    i++;

                    $('#edit_line<?php echo $user->system_user_id; ?>').append('<div class="row" id="row'+i+'">'+
                    '<div class="col-lg-10 col-md-10">'+
                    '<label>New Password</label>'+
                    '<input type="text" name="password" class="form-control input-default " placeholder="New password"  autocomplete="off" required>'+
                    '</div>'+
                    '<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">'+
                        '<label style="padding-right:0px; padding-top: 0px; margin-top: -15px"> &nbsp; &nbsp;</label>'+
                        '<button class="btn btn-warning btn-sm btn_remove_edit" id="'+i+'" name="remove"><i class="fa fa-minus fa-sm"></i></button>'+
                    '</div>'+
                    '</div>');

                });

                $(document).on('click', '.btn_remove_edit',function(){
                event.preventDefault();
                var button_id= $(this).attr("id");
                $('#row'+button_id+'').remove();
                });
            
            });
        </script>
        <script>
            $('#active<?php echo $user->system_user_id ?>').change(function(e){
                var id = <?php echo $user->system_user_id ?>;
                console.log(id);
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url()?>SystemUsers/suspendUser',
                    data:{
                        id: id,
                    },
                    success: function(data){
                        location.reload(true);
                    },
                    error: function (error) {
                        alert('error; ' + eval(error));
                    }
                });
            });
        </script>
        <script>
            $('#suspend<?php echo $user->system_user_id ?>').change(function(e){
                var id = <?php echo $user->system_user_id ?>;
                console.log(id);
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url()?>SystemUsers/suspendUser',
                    data:{
                        id: id,
                    },
                    success: function(data){
                        location.reload(true);
                    },
                    error: function (error) {
                        console.log(error);
                        alert('error; ' + eval(error));
                    }
                });
            });
        </script>
    <?php }
    }?>

    
</div>