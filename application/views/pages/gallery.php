<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <div class="row">
                <div class="col-md-4">
                    <h5>Gallery List</h5>                
                </div>
                <div class="col-md-8 mb-1">
                    <?php if ($this->session->flashdata('warning')) { ?>
                        <div class="alert alert-warning alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                            <strong>Warning! </strong> <?= $this->session->flashdata('warning') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                            </button>
                        </div>
                    <?php }?>
                    <?php if ($this->session->flashdata('message')) { ?>
                        <div class="alert alert-success alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
                            <strong>Success! </strong> <?= $this->session->flashdata('message') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                            </button>
                        </div>
                    <?php }?>
                    <?php if ($this->session->flashdata('error')) { ?>
                        <div class="alert alert-danger alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                            <strong>Removed! </strong> <?= $this->session->flashdata('error') ?>
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
                                <h4 class="card-title">All Gallery Images</h4>
                            </div>
                            <div class ="col-lg-8" align="right">
                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target=".addNewGallery">
                                    Add New Image
                                </button>
                            </div>
                        <!-- </div> -->
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php  if(!empty($gallery_image)){
                                foreach($gallery_image as $key => $image){
                            ?>
                                <div class="col-md-3" align="center" id="gallery_image">
                                    <div id="buttons">
                                        <div class="row" align="center">
                                            <div class="col-md-4">
                                                <a href="#" class="btn btn-info shadow btn-xs sharp me-1" type="button" data-bs-toggle="modal" data-bs-target=".editGalleryImage<?php echo $image->gallery_image_id; ?>"><i class="fa fa-pencil"></i></a>
                                            </div>
                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-4">
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp me-1" type="button" data-bs-toggle="modal" data-bs-target=".deleteGalleryImage<?php echo $image->gallery_image_id; ?>"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <img style="max-width: 300px; min-height: auto; max-height: 300px; min-width: auto;" src="<?php echo base_url() ?>/assets/images/uploads/<?php echo $image->gallery_image ?>"/>
                                </div>
                            <?php }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade addNewGallery" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Gallery Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                <div class="basic-form">
                    <?php echo form_open_multipart('home_slider/addNewGallery');?>
                        <div class="row">
                            <div class="col-lg-12 form-group">
                                <div align="Center">
                                    <img id="blah" src="<?php echo base_url()?>assets/images/logo.jpg" style="min-width: auto; min-height: auto; max-height: 250px; max-width: 95%;" />
                                </div>

                                <input type="file" id="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" class="btn btn-info form-control" name="gallery_image" accept="image/*" required>
                            </div>                         

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">upload</button>
                    <?php echo form_close()?>
                </div>
            </div>
        </div>
    </div>

    <?php  if(!empty($gallery_image)){
        foreach($gallery_image as $key => $image){
    ?>

        <div class="modal fade editGalleryImage<?php echo $image->gallery_image_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Gallery Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="basic-form">
                        <?php echo form_open_multipart('home_slider/editGalleryImage/'.$image->gallery_image_id);?>
                            <div class="row">
                                <div class="col-lg-12 form-group">
                                    <div align="Center">
                                        <img id="blah<?php echo $image->gallery_image_id; ?>" src="<?php echo base_url() ?>/assets/images/uploads/<?php echo $image->gallery_image ?>" style="min-width: auto; min-height: auto; max-height: 250px; max-width: 95%;" />
                                    </div>
                                    <input type="hidden" name="old_gallery_image" value="<?php echo $image->gallery_image ?>"/>
                                    <input type="file" id="file" onchange="document.getElementById('blah<?php echo $image->gallery_image_id; ?>').src = window.URL.createObjectURL(this.files[0])" class="btn btn-info form-control" name="edited_gallery_image" accept="image/*" required>
                                </div>                         

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">upload</button>
                        <?php echo form_close()?>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade deleteGalleryImage<?php echo $image->gallery_image_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Do you want to delete this image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="basic-form">
                        <?php echo form_open_multipart('home_slider/removegalleryImage/'.$image->gallery_image_id);?>
                            <div class="row">
                                <div class="col-lg-12 form-group">
                                    <div align="Center">
                                        <img id="blah<?php echo $image->gallery_image_id; ?>" src="<?php echo base_url() ?>/assets/images/uploads/<?php echo $image->gallery_image ?>" style="min-width: auto; min-height: auto; max-height: 250px; max-width: 95%;" />
                                    </div>
                                </div>                         
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger light">Delete</button>
                        <?php echo form_close()?>
                    </div>
                </div>
            </div>
        </div>
        
    <?php }
    }
    ?>
</div>