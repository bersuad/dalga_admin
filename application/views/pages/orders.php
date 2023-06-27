<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <div class="row" style="background-color: transparent!important;">
                <div class="col-md-4">
                    <h3>Order List</h3>
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
                        <div class ="col-lg-4">
                            <h4 class="card-title">New order </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>N<sup><u>o</u></sup></th>
                                        <th>Orders</th>
                                        <th>Order by</th>
                                        <th>Phone N<sup><u>o</u></sup></th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>ZIP code</th>
                                        <!-- <th>Order Desc</th> -->
                                        <th>Order at</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php  if(!empty($orders)){
                                    foreach($orders as $key => $order){
                                ?>
                                    <tr>
                                        <td><?php echo $key + 1;?></td>
                                        <td>
                                            <?php 
                                                if(!empty($order->order_item)){
                                                    $image_list     = json_decode($order->order_item);
                                                    foreach ($image_list as $key => $value) {
                                                        $name = str_replace('https://usadmin.kerezhi.net/assets/images/uploads', '', $value->image);
                                                        $name = str_replace('https://usadmin.kerezhi.net//assets/images/uploads', '', $name);
                                                        echo "<div class='col-md-6 offset-1'><img src='".base_url().'assets/images/uploads/'.$name."' style='max-width: 150px; min-width: auto; height: 100px; border-radius: 10px;' loading='lazy'/></div>";
                                                        if ($key == 0) break;
                                                    }
                                                }
                                            ?>
                                            <!-- <h4 align="center"><?php echo $order->room_name ?></h4>     -->
                                        </td>
                                        <td><?php echo $order->ordered_by ?></td>
                                        <td><?php echo $order->orderer_phone_no ?></td>
                                        <td><?php echo $order->order_email ?></td>
                                        <td><?php echo $order->order_address ?></td>
                                        <td><?php echo $order->zip ?></td>
                                        <!-- <td>Orders</td> -->
                                        <!-- <td><?php echo mb_strimwidth($order->order_description, 0, 30, " ...") ?></td> -->
                                        <td><?php echo date('Y-M-d H:m:s A', strtotime($order->created_at));  ?></td>
                                        <td>
                                            <a href="#" class="btn btn-success shadow btn-xs sharp me-1" type="button" data-bs-toggle="modal" data-bs-target=".openOrder<?php echo $order->order_id; ?>"><i class="fa fa-envelope-open"></i></a>
                                            <a href="#" class="btn btn-warning shadow btn-xs sharp me-1" type="button" data-bs-toggle="modal" data-bs-target=".removeOrder<?php echo $order->order_id; ?>""><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php
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
    
    
    <?php  if(!empty($orders)){
        foreach($orders as $key => $order){
    ?>
        <div class="modal fade openOrder<?php echo $order->order_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Order from  "<b><?php echo $order->ordered_by; ?></b>"</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="basic-form">
                            <div class="row">
                                <div class="col-md-12" align="right"><small>Requested at : <?php echo date('Y-M-d h:m:s A', strtotime($order->created_at));  ?></small></div>
                                <div class="col-md-12">
                                    <strong>Ordered By : </strong><?php echo $order->ordered_by ?>
                                </div>
                                <div class="col-md-12">
                                    <br/>
                                    <strong>Email : </strong><?php echo $order->order_email ?>
                                </div>
                                <div class="col-md-12">
                                    <br/>
                                    <strong>Phone N<sup><u>o</u></sup> :</strong><?php echo $order->orderer_phone_no ?>
                                </div>
                                <div class="col-md-12">
                                    <br/>
                                    <strong>Order Address : </strong><?php echo $order->order_address ?>
                                </div>
                                <div class="col-md-12">
                                    <br/>
                                    <strong>ZIP Code : </strong><?php echo $order->zip ?>
                                </div>
                                <div class="col-lg-12">
                                    <br/>
                                    <strong>Ordered Items :</strong>
                                    <table class="table display stripe">
                                        <thead>
                                            <th></th>
                                            <th>Item</th>
                                            <th>Item Qu<u>n</u></th>
                                            <th>Item Price</th>
                                        </thead>
                                        <tbody>
                                    <?php 
                                        if(!empty($order->order_item)){
                                            $image_list     = json_decode($order->order_item);
                                            $key =1;
                                            foreach ($image_list as $key => $value) {
                                                $key++;
                                                $name = str_replace('https://usadmin.kerezhi.net/assets/images/uploads', '', $value->image);?>
                                                <tr>
                                                    <td><?php $key ?></td>
                                                    <td>
                                                        <?php echo "<img src='".base_url().'assets/images/uploads/'.$name."' style='max-width: 150px; min-width: auto; height: 100px; border-radius: 10px;' loading='lazy'/> <br/>". $value->name;?>
                                                    </td>
                                                    <td>
                                                        <?php echo $value->quantity ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $value->price ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-12">
                                    <hr/>
                                    <strong>Order Message : </strong> <br/>"<i><?php echo $order->order_description ?></i> "
                                </div>
                            </div>
                            <?php 
                                if(empty($order->transaction_number) ){?>
                                    <?php echo form_open_multipart('Messages/orderMessage');?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <br/>
                                                <input type="hidden" name="email" value="<?php echo $order->order_email ?>"/>
                                                <strong><label>Replay : </label></strong>
                                                <textarea name="messageReplay" class="form-control input-default" placeholder="Your message here..." cols="8" rows="6" style="min-height: 150px; max-width: auto; min-width: 200px; border-color: 1px solid #888!important;" required></textarea>
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
                                <strong>Replay : </strong> "<i><?php echo $order->transaction_number ?></i>"
                            <?php }?>
                            </div>
                        </div>

                </div>
            </div>
        </div>
        
        <div class="modal fade removeOrder<?php echo $order->order_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" align="center">Do you want to remove order from "<?php echo $order->ordered_by; ?>"?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 align="center"> Are you sure you want to remove the order from "<b><?php echo $order->ordered_by ?></b>"??</h4>
                    </div>
                    <div class="modal-footer">
                        <?php echo form_open_multipart('pages/removeOrder/'.$order->order_id);?>
                            <input type="hidden" name="name" value="<?php echo $order->ordered_by ?>"/>
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