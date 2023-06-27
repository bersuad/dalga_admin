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
                    <div class="card-header">
                        <!-- <div class="row"> -->
                            <div class ="col-lg-4">
                                <h4 class="card-title">Contact Message</h4>
                            </div>
                            <!-- <div class ="col-lg-8" align="right">
                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target=".addNewCategory">
                                    Add New Category
                                </button>
                            </div> -->
                        <!-- </div> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>N<sup><u>o</u></sup></th>
                                        <th>Sender Name</th>
                                        <th>Email</th>
                                        <th>Phone N<sup><u>o</u></sup></th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Send at</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php  if(!empty($contact_messages)){
                                    foreach($contact_messages as $key => $message){
                                        if($message->view == 0){
                                ?>

                                    <tr style="background-color: rgba(0,128,0, 0.1)!important; color: #555;">
                                        <td><?php echo $key + 1;?></td>
                                        <td><?php echo $message->sender_name ?></td>
                                        <td><?php echo $message->email ?></td>
                                        <td><?php echo $message->phone_no ?></td>
                                        <td><?php echo $message->subject ?></td>
                                        <td><?php echo mb_strimwidth($message->message, 0, 30, " ...");?></td>
                                        <td><?php echo date('Y-M-d H:m:s A', strtotime($message->created_date));  ?></td>
                                        <td>
                                            <a href="#" class="btn btn-success shadow btn-xs sharp me-1" type="button" data-bs-toggle="modal" data-bs-target=".replay<?php echo $message->message_id; ?>"><i class="fa fa-envelope-open"></i></a>
                                            <a href="#" class="btn btn-warning shadow btn-xs sharp me-1" type="button" data-bs-toggle="modal" data-bs-target=".suspendCategory<?php echo $message->message_id; ?>""><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php }else{?>
                                    <tr>
                                        <td><?php echo $key + 1;?></td>
                                        <td><?php echo $message->sender_name ?></td>
                                        <td><?php echo $message->email ?></td>
                                        <td><?php echo $message->phone_no ?></td>
                                        <td><?php echo $message->subject ?></td>
                                        <td><?php echo mb_strimwidth($message->message, 0, 30, " ...");?></td>
                                        <td><?php echo date('Y-M-d H:m:s A', strtotime($message->created_date));  ?></td>
                                        <td>
                                            <a href="#" class="btn btn-success shadow btn-xs sharp me-1" type="button" data-bs-toggle="modal" data-bs-target=".replay<?php echo $message->message_id; ?>"><i class="fa fa-envelope-open"></i></a>
                                            <a href="#" class="btn btn-warning shadow btn-xs sharp me-1" type="button" data-bs-toggle="modal" data-bs-target=".removeMessage<?php echo $message->message_id; ?>""><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } 
                                    }
                                } ?>
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
    
    <?php  if(!empty($contact_messages)){
                foreach($contact_messages as $key => $message){
    ?>
        <div class="modal fade replay<?php echo $message->message_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Message from  "<b><?php echo $message->sender_name; ?></b>"</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="basic-form">
                            <div class="row">
                                <div class="col-md-12" align="right"><small>Send at : <?php echo date('Y-M-d h:m:s A', strtotime($message->created_date));  ?></small></div>
                                <div class="col-md-12">
                                    <strong>Sender : </strong><?php echo $message->sender_name ?>
                                </div>
                                <div class="col-md-12">
                                    <br/>
                                    <strong>Email : </strong><?php echo $message->email ?>
                                </div>
                                <div class="col-md-12">
                                    <strong>Phone N<sup><u>o</u></sup>: </strong><?php echo $message->phone_no ?>
                                </div>
                                <div class="col-md-12">
                                    <br/>
                                    <strong>Subject : </strong><?php echo $message->subject ?></strong>
                                </div>
                                <div class="col-md-12">
                                    <hr/>
                                    <strong>Message : </strong> <br/>"<i><?php echo $message->message ?></i> "
                                </div>
                            </div>
                            <?php 
                                if($message->replied_message == " " || empty($message->replied_message) ){?>
                                    <?php echo form_open_multipart('Messages/replayMessage/'.$message->message_id);?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <input type="hidden" name="name" value="<?php echo $message->sender_name ?>"/>
                                                <br/>
                                                <strong><label>Replay : </label></strong>
                                                <textarea name="messageReplay" class="form-control input-default" placeholder="Your message here..." cols="8" rows="6" style="min-height: 150px; max-width: auto; min-width: 200px;" required></textarea>
                                            </div>                         
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    <?php echo form_close()?>
                                    </div>
                            <?php }else{ ?>
                                <br/>
                                <strong>Replay : </strong> "<i><?php echo $message->replied_message ?></i>"
                            <?php }?>
                            </div>
                        </div>

                </div>
            </div>
        </div>
        
        <div class="modal fade removeMessage<?php echo $message->message_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" align="center">Remove "<?php echo $message->subject; ?>"</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 align="center"> Are you sure you want to remove the message from "<b><?php echo $message->sender_name ?></b>"??</h4>
                    </div>
                    <div class="modal-footer">
                        <?php echo form_open_multipart('Messages/removeMessage/'.$message->message_id);?>
                            <input type="hidden" name="name" value="<?php echo $message->sender_name ?>"/>
                            <button type="button" class="btn btn-default light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">remove</button>
                        <?php echo form_close()?>
                    </div>
                </div>
            </div>
        </div>
       
        
    <?php }
    }?>
    
</div>