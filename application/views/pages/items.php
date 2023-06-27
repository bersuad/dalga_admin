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
                                <h4 class="card-title">All Item List</h4>
                            </div>
                            <div class ="col-lg-8" align="right">
                                <a href="<?php echo base_url('/new-items') ?>" class="btn btn-primary" type="button">
                                    Add New Item
                                </a>
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
                                        <th>Price</th>
                                        <th>Quan</th>
                                        <th>Color List</th>
                                        <th>Created at</th>
                                        <th>Category</th>
                                        <th>Item Visitor</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  if(!empty($items)){
                                        foreach ($items as $key => $item) {?>
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td>
                                                    <div class="row">
                                                        <?php 
                                                            if(!empty($item->item_image)){
                                                                $image_list     = json_decode($item->item_image);
                                                                foreach ($image_list as $key => $value) {
                                                                    echo "<div class='col-md-5'><img src='".base_url().'assets/images/uploads/'.$value."' style='max-width: 150px; min-width: auto; height: 100px; border-radius: 10px;'/></div>";
                                                                    if ($key == 3) break;
                                                                }
                                                            }
                                                        ?>
                                                    </div>
                                                </td>
                                                <td><?php echo $item->item_name; ?></td>
                                                <td><?php echo number_format($item->item_price);?> $</td>
                                                <td><?php echo $item->qun; ?></td>
                                                <td><div style="height: 25px; width: 25px; border-radius:100%; background:<?php echo $item->item_colors;?>;"></div></td>
                                                <td><?php echo date('Y-M-d', strtotime($item->created_date));  ?></td>
                                                <td><?php echo $item->category_name; ?></td>
                                                <td><?php echo $item->visitor; ?></td>
                                                <td>
                                                    <?php
                                                        if( $item->status == 0 ){?>
                                                            <label class="switch">
                                                                <input type="checkbox" checked id="active<?php echo $item->item_id ?>">
                                                                <span class="slider round"></span>
                                                            </label>
                                                    <?php }else{ ?>
                                                        <label class="switch">
                                                            <input type="checkbox" id="suspend<?php echo $item->item_id ?>">
                                                            <span class="slider round"></span>
                                                        </label>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-info shadow btn-xs sharp me-1" type="button" data-bs-toggle="modal" data-bs-target=".viewItem<?php echo $item->item_id; ?>"><i class="fa fa-eye"></i></a>
                                                    <a href="<?php echo base_url('edit-item/'.$item->item_id) ?>" class="btn btn-warning shadow btn-xs sharp me-1" type="button"><i class="fa fa-pencil"></i></a>
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

    <?php   if(!empty($items)){
                foreach ($items as $key => $item) {?>
                <div class="modal fade viewItem<?php echo $item->item_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">View <?php echo$item->item_name;?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            <div class="modal-body">
                                <h4>Name: <span><?php echo $item->item_name;?></span></h4>
                                <div class="row">
                                    <?php 
                                        if(!empty($item->item_image)){
                                            $image_list     = json_decode($item->item_image);
                                            foreach ($image_list as $key => $value) {
                                                echo "<div class='col-md-6'><img src='".base_url().'assets/images/uploads/'.$value."' style='max-width: 350px; min-width: auto; max-height: 350px; min-height: auto; border-radius: 10px;'/></div>";
                                            }
                                        }
                                    ?>
                                </div><br/>
                                <?php 
                                    if(!empty($item->item_old_price)){?>
                                        <h4>Price: <span><?php echo $item->item_old_price;?> $</span></h4>
                                <?php
                                    }
                                ?>
                                <h4>Color: <div style="height: 25px; width: 25px; border-radius:100%; background:<?php echo $item->item_colors;?>;"></div></h4>
                                <h4>Size: <span><?php echo $item->item_size;?> </span></h4>
                                <h4>Price: <span><?php echo $item->item_price;?> $</span></h4>
                                <h4>Qun: <span><?php echo $item->qun;?> </span></h4><br/>
                                <h5>Description: </h5>
                                <p><?php echo $item->item_description; ?></p>
                                <h5>Additional Info: </h5>
                                <p><?php echo $item->item_additional_info; ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <script src="<?php echo base_url('assets/'); ?>js/jquery.min.js"></script>  
            <script>
                $('#active<?php echo $item->item_id ?>').change(function(e){
                    var id = <?php echo $item->item_id ?>;
                    console.log(id);
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url()?>item/changeStatus',
                        data:{
                            id: id,
                        },
                        success: function(data){
                            // console.log(data);
                            location.reload(true);
                        },
                        error: function (error) {
                            alert('error; ' + eval(error));
                        }
                    });
                });
            </script>
            <script>
                $('#suspend<?php echo $item->item_id ?>').change(function(e){
                    var id = <?php echo $item->item_id ?>;
                    console.log(id);
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url()?>item/changeStatus',
                        data:{
                            id: id,
                        },
                        success: function(data){
                            // console.log(data);
                            location.reload(true);
                        },
                        error: function (error) {
                            console.log(error);
                            alert('error; ' + eval(error));
                        }
                    });
                });
            </script>
        <?php  }
                            
    } ?>               
    

    
</div>