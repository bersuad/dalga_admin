<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
        <h3 align="center">Add New Product</h3>
            <div class="row">
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
            <div class="col-1"></div>
            <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <?php echo form_open_multipart('item/newProduct');?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Item Name</label>
                                            <input type="text" name="item_name" class="form-control input-default " placeholder="Item Name"  autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Item Price</label>
                                            <input type="text" name="item_price" class="form-control input-default " placeholder="Item Price"  autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Item Quantity</label>
                                            <input type="text" name="item_qun" class="form-control input-default " placeholder="Item Quantity"  autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Size</label>
                                            <input type="text" name="item_size" class="form-control input-default " placeholder="Item Size"  autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Category</label>
                                            <select class="form-control input-default" required name="category">
                                                <option value="">-- Select Category --</option>
                                            <?php  if(!empty($categories)){
                                                    foreach($categories as $key => $category){
                                            ?>
                                                <option value="<?php echo $category->category_id; ?>"><?php echo $category->category_name; ?></option>
                                            <?php }
                                            }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Old Price</label>
                                            <input type="text" name="item_old_price" class="form-control input-default " placeholder="Old Price"  autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Description</label>
                                            <textarea style="height: 150px;" name="item_description" class="form-control input-default" placeholder="Item Description" rows="4" cols="50"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Additional Info</label>
                                            <textarea style="height: 150px;" name="item_info" class="form-control input-default" placeholder="Additional Information about the item" rows="4" cols="50"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Image</label>
                                            <div class="col-lg-12 form-group">
                                                <div align="Center">
                                                    <img id="blah" src="<?php echo base_url()?>assets/images/logo.jpg" style="min-width: auto; min-height: auto; max-height: 200px; max-width: 95%;" />
                                                </div>
                                                <input type="file" id="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" class="btn btn-info form-control" name="item_image[]" accept="image/*" required>
                                            </div>  
                                        </div>
                                        <div id="new_line"></div>
                                        <button class="btn btn-warning btn-block" id="add_image"><i class="fa fa-plus fa-md"></i> Add Image</button>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label><b>Add Color</b></label>
                                            <div class="col-lg-12 form-group">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div align="Center">
                                                            <img id="color_image<?php echo $key; ?>" src="<?php echo base_url()?>assets/images/logo.jpg" style="min-width: auto; min-height: auto; max-height: 200px; max-width: 95%;" />
                                                        </div>
                                                        <input type="file" onchange="document.getElementById('color_image<?php echo $key; ?>').src = window.URL.createObjectURL(this.files[0])" class="form-control input-default" name="item_color[]" accept="image/*">
                                                    </div>
                                                </div>
                                                <div id="new_color_line"></div>
                                                <button class="btn btn-warning btn-block" id="add_color_image"><i class="fa fa-plus fa-md"></i> Add Color Image</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="card-footer"align="center" >    
                        <button type="submit" class="btn btn-info"> Add Item </button>
                        <?php echo form_close()?>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</div>


<script src="<?php echo base_url('assets/'); ?>js/jquery.min.js"></script>  
<script type="text/javascript">
    $(document).ready(function(){

        var i = 1;
        $('#add_image').click(function(e){
            event.preventDefault();
            i++;

            $('#new_line').append(
                '<div class="row mb-3" id="row'+i+'">'+
                    '<label>Image</u> '+i+'</label>'+
                    '<div class="col-lg-9 form-group">'+
                        '<div align="center">'+
                            '<img id="blah'+i+'" src="<?php echo base_url()?>assets/images/logo.jpg" style="min-width: auto; min-height: auto; max-height: 200px; max-width: 95%;" />'+
                        '</div>'+
                        '<input id="'+i+'" type="file" onchange="document.getElementById(\'blah'+i+'\').src = window.URL.createObjectURL(this.files[0])" class="form-control" name="item_image[]" accept="image/*" required>'+
                    '</div>'+
                    '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" style="padding-right:0px; padding-top: 0px; margin-top: 200px">'+
                        '<label> &nbsp; &nbsp;</label>'+
                        '<button class="btn btn-success btn-sm btn_remove" id="'+i+'" name="remove"><i class="fa fa-minus fa-sm"></i></button>'+
                    '</div>'+
                '</div>');
        });
        $(document).on('click', '.btn_remove',function(){
            event.preventDefault();
            var button_id= $(this).attr("id");
            $('#row'+button_id+'').remove();
        });
    
        var j = 1;
        $('#add_color_image').click(function(e){
            event.preventDefault();
            j++;
    
            $('#new_color_line').append(
                '<div class="row mb-3" id="row'+j+'">'+
                    '<label>Color Image</u> '+j+'</label>'+
                    '<div class="col-lg-9 form-group">'+
                        '<div align="center">'+
                            '<img id="color_blah'+j+'" src="<?php echo base_url()?>assets/images/logo.jpg" style="min-width: auto; min-height: auto; max-height: 200px; max-width: 95%;" />'+
                        '</div>'+
                        '<input id="'+j+'" type="file" onchange="document.getElementById(\'color_blah'+j+'\').src = window.URL.createObjectURL(this.files[0])" class="form-control" name="item_color[]" accept="image/*" required>'+
                    '</div>'+
                    '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" style="padding-right:0px; padding-top: 0px; margin-top: 200px">'+
                        '<label> &nbsp; &nbsp;</label>'+
                        '<button class="btn btn-success btn-sm btn_remove_color" id="'+j+'" name="remove"><i class="fa fa-minus fa-sm"></i></button>'+
                    '</div>'+
                '</div>');
        });
        $(document).on('click', '.btn_remove_color',function(){
            event.preventDefault();
            var button_id= $(this).attr("id");
            $('#row'+button_id+'').remove();
        });
    });


</script>