<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <div class="row">
                <div class="col-md-4">
                    <h5>Category List</h5>                
                </div>
                <div class="col-md-8 mb-1">
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
                    <div class="card-header">
                        <!-- <div class="row"> -->
                            <div class ="col-lg-4">
                                <h4 class="card-title">All Category List</h4>
                            </div>
                            <div class ="col-lg-8" align="right">
                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target=".addNewCategory">
                                    Add New Category
                                </button>
                            </div>
                        <!-- </div> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>N<sup><u>o</u></sup></th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Created at</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php  if(!empty($category_list)){
                                    foreach($category_list as $key => $category){
                                ?>
                                    <tr>
                                        <td><?php echo $key + 1;?></td>
                                        <td><img src="<?php echo base_url() ?>/assets/images/uploads/<?php echo $category->category_image ?>" style="width: auto; height: 180px; border-radius: 10px;"/></td>
                                        <td><?php echo $category->category_name ?></td>
                                        <td><?php echo date('Y-M-d', strtotime($category->created_date));  ?></td>
                                        <td>
                                            <?php
                                                if( $category->category_status == 0 ){?>
                                                    <label class="switch">
                                                        <input type="checkbox" checked id="active<?php echo $category->category_id ?>">
                                                        <span class="slider round"></span>
                                                    </label>
                                                    <!-- <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input btn-sm btn-success" checked id="active<?php echo $category->category_id ?>">
                                                        <label class="custom-control-label" for="active<?php echo $category->category_id ?>">Active</label>
                                                    </div> -->
                                            <?php }else{ ?>
                                                <label class="switch">
                                                    <input type="checkbox" id="suspend<?php echo $category->category_id ?>">
                                                    <span class="slider round"></span>
                                                </label>
                                                <!-- <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input btn-sm btn-danger" id="suspend<?php echo $category->category_id ?>">
                                                    <label class="custom-control-label" for="suspend<?php echo $category->category_id ?>">Suspended</label>
                                                </div> -->
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-info shadow btn-xs sharp me-1" type="button" data-bs-toggle="modal" data-bs-target=".editCategory<?php echo $category->category_id; ?>"><i class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-danger shadow btn-xs sharp me-1" type="button" data-bs-toggle="modal" data-bs-target=".suspendCategory<?php echo $category->category_id; ?>"><i class="fa fa-ban"></i></a>
                                        </td>
                                    </tr>
                                <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade addNewCategory" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                <div class="basic-form">
                    <?php echo form_open_multipart('category/AddNewCategory');?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>Category Name</label>
                                    <input type="text" name="name" class="form-control input-default " placeholder="Category Name"  autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-lg-12 form-group">
                                <div align="Center">
                                <img id="blah" src="<?php echo base_url()?>assets/images/logo.jpg" style="min-width: auto; min-height: auto; max-height: 200px; max-width: 95%;" />
                                </div>

                                <input type="file" id="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" class="btn btn-info form-control" name="category_image" accept="image/*" required>
                            </div>                         

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Register</button>
                    <?php echo form_close()?>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('assets/'); ?>js/jquery.min.js"></script>  
    <?php  if(!empty($category_list)){
        foreach($category_list as $key => $category){
    ?>
        <div class="modal fade editCategory<?php echo $category->category_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit  <?php echo $category->category_name; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="basic-form">
                        <?php echo form_open_multipart('category/editCategory/'.$category->category_id);?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label>Category Name</label>
                                        <input type="text" name="name" class="form-control input-default " placeholder="Category Name"  autocomplete="off" required value="<?php echo $category->category_name; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <div align="Center">
                                    <img id="blah<?php echo $category->category_id; ?>" src="<?php echo base_url()?>assets/images/uploads/<?php echo $category->category_image; ?>" style="min-width: auto; min-height: auto; max-height: 200px; max-width: 95%;" />
                                    </div>
                                    <input type="hidden" value="<?php echo $category->category_image; ?>" name="category_image"/>
                                    <input type="file" onchange="document.getElementById('blah<?php echo $category->category_id; ?>').src = window.URL.createObjectURL(this.files[0])" class="btn btn-info form-control" name="category_image_update" accept="image/*" />
                                </div>                         

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <?php echo form_close()?>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade suspendCategory<?php echo $category->category_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" align="center">Suspend <?php echo $category->category_name; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 align="center"> Are you sure you want to suspend <?php echo $category->category_name; ?>??</h4>
                        <div class="basic-form" align="center">
                            <img id="blah<?php echo $category->category_id; ?>" src="<?php echo base_url()?>assets/images/uploads/<?php echo $category->category_image; ?>" style="min-width: auto; min-height: auto; max-height: 200px; max-width: 95%;" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php echo form_open_multipart('category/suspendCategory/'.$category->category_id);?>
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Remove</button>
                        <?php echo form_close()?>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('#active<?php echo $category->category_id ?>').change(function(e){
                var id = <?php echo $category->category_id ?>;
                console.log(id);
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url()?>category/changeStatus',
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
            $('#suspend<?php echo $category->category_id ?>').change(function(e){
                var id = <?php echo $category->category_id ?>;
                console.log(id);
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url()?>category/changeStatus',
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