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
                            <h4 class="card-title">Address List</h4>
                        </div>
                        <div class="col-lg-4"></div>
                        <div class ="col-lg-4" align="right">
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target=".addNewLocation">
                                Add Location
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>N<sup><u>o</u></sup></th>
                                        <th>City</th>
                                        <th>Branch Name</th>
                                        <th>Specific Name</th>
                                        <th>Phone Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php  if(!empty($location_list)){
                                    foreach ($location_list as $key => $location) {?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $location->location ?></td>
                                            <td><?php echo $location->name ?></td>
                                            <td><?php echo $location->specific_name ?></td>
                                            <td>
                                                <?php 
                                                    $phone_list     = json_decode($location->phone_no);
                                                    if(!empty($location->phone_no)){
                                                        $phone_list     = json_decode($location->phone_no);
                                                        foreach ($phone_list as $key => $value) {
                                                            echo $value."<br/>";
                                                        }
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-info shadow btn-xs sharp me-1" type="button" data-bs-toggle="modal" data-bs-target=".editLocation<?php echo $location->location_id; ?>"><i class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp me-1" type="button" data-bs-toggle="modal" data-bs-target=".deleteLocation<?php echo $location->location_id; ?>"><i class="fa fa-ban"></i></a>
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
    <div class="modal fade addNewLocation" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Location</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                <div class="basic-form">
                    <?php echo form_open_multipart('address/AddNewLocation');?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>City</label>
                                    <input type="text" name="city" class="form-control input-default " placeholder="City"  autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>Branch Name</label>
                                    <input type="text" name="branch_name" class="form-control input-default " placeholder="Branch Name"  autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>Location</label>
                                    <input type="text" name="location" class="form-control input-default " placeholder="Location"  autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>Phone N<u>o</u></label>
                                    <input type="text" name="phone[]" class="form-control input-default " placeholder="Phone Number"  autocomplete="off" required>
                                </div>
                            </div>    
                            <div id="new_line"></div>                
                            <button class="btn btn-primary btn-md" id="add_phone"><i class="fa fa-plus fa-md"></i> Add Phone</button>
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
    <script type="text/javascript">
        $(document).ready(function(){

            var i = 1;
            $('#add_phone').click(function(e){
                event.preventDefault();
                i++;

                $('#new_line').append('<div class="row" id="row'+i+'">'+
                '<div class="col-lg-10 col-md-10">'+
                '<label>Phone N<u>o</u> '+i+'</label>'+
                '<input type="text" name="phone[]" class="form-control input-default " placeholder="Phone Number"  autocomplete="off" required>'+
                '</div>'+
                '<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">'+
	                '<label style="padding-right:0px; padding-top: 0px; margin-top: -15px"> &nbsp; &nbsp;</label>'+
	                '<button class="btn btn-warning btn-sm btn_remove" id="'+i+'" name="remove"><i class="fa fa-minus fa-sm"></i></button>'+
	            '</div>'+
                '</div>');

	        });

            $(document).on('click', '.btn_remove',function(){
            event.preventDefault();
            var button_id= $(this).attr("id");
            $('#row'+button_id+'').remove();
            });
        
        });
    </script>

    <?php  if(!empty($location_list)){
        foreach ($location_list as $key => $location) {?>
        <div class="modal fade editLocation<?php echo $location->location_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit <?php echo $location->name ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="basic-form">
                        <?php echo form_open_multipart('address/editLocation/'.$location->location_id);?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label>City</label>
                                        <input type="text" name="city" class="form-control input-default " placeholder="City"  autocomplete="off" required value="<?php echo $location->location ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label>Branch Name</label>
                                        <input type="text" name="branch_name" class="form-control input-default " placeholder="Branch Name"  autocomplete="off" required value="<?php echo $location->name ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label>Location</label>
                                        <input type="text" name="location" class="form-control input-default " placeholder="Location"  autocomplete="off" required value="<?php echo $location->specific_name ?>">
                                    </div>
                                </div>
                                <?php 
                                    if(!empty($location->phone_no)){
                                        $phone_list     = json_decode($location->phone_no);
                                        foreach ($phone_list as $key => $value) {
                                ?>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label>Phone N<u>o</u></label>
                                            <input type="text" name="phone[]" class="form-control input-default " placeholder="Phone Number"  autocomplete="off" required value="<?php echo $value ?>">
                                        </div>
                                    </div>
                                <?php
                                    }
                                }else{
                                ?>
                                    <label>Phone No</label>
                                    <input type="text" name="phone[]" class="form-control input-default " placeholder="Phone Number"  autocomplete="off" required/>
                                <?php
                                    }
                                ?>
                                <div id="edit_line<?php echo $location->location_id ?>"></div>                
                                <button class="btn btn-info btn-md" id="edit_phone<?php echo $location->location_id; ?>"><i class="fa fa-plus fa-md"></i> Add Phone</button>
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

        <div class="modal fade deleteLocation<?php echo $location->location_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Are you sure you want to remove <?php echo $location->name ?>??</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>Remove <?php echo $location->name ?>?</h3>  
                    </div>
                    <div class="modal-footer">
                        <?php echo form_open_multipart('address/delete_address/'.$location->location_id);?>
                            <button type="button" class="btn btn-default light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger"> Remove </button>
                        <?php echo form_close()?>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function(){

                var i = 1;
                $('#edit_phone<?php echo $location->location_id; ?>').click(function(e){
                    event.preventDefault();
                    i++;

                    $('#edit_line<?php echo $location->location_id; ?>').append('<div class="row" id="row'+i+'">'+
                    '<div class="col-lg-10 col-md-10">'+
                    '<label>Phone N<u>o</u> '+i+'</label>'+
                    '<input type="text" name="phone[]" class="form-control input-default " placeholder="Phone Number"  autocomplete="off" required>'+
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
    <?php }
    }?>

    
</div>