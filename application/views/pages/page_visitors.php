<div class="content-body">
    <div class="container-fluid">
        <h4 align="center">Total Unique Visitors</h4>
        <h5 align="center"><?php echo number_format($total_visitors[0]->web_visitor); ?></h5>
        <div align="center">
            <?php echo form_open_multipart('Visitors/visitors_list');?>
            <div class="row form-material">
                <div class="col-xl-5 col-xxl-5 col-md-5 mb-3">
                    <label class="form-label">Starting Date</label>
                    <input type="text" class="form-control" placeholder="<?php echo date('Y-m-d') ?>" id="start_date" name="start_date">
                </div>
                <div class="col-xl-5 col-xxl-5 col-md-5 mb-3">
                    <label class="form-label">End Date</label>
                    <input type="text" class="form-control" placeholder="<?php echo date('Y-m-d') ?>" id="end_date" name="end_date">
                </div>
                <div class="col-xl-2 col-xxl-2 col-md-2 mb-3">
                    <label class="form-label mt-3"> </label>
                    <button class="btn btn-primary btn-md form-control" type="submit">Get Data</button>
                </div>
            </div>
            <?php echo form_close()?>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Today's Vistors per hour</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="users_list"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Last 10 days Visitors</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="weekly_list"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Last six(6) Month Visitors</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="monthly_list"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Visitors By Country</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="country_graph"></canvas>
                    </div>
                </div>
            </div>           
        </div>
    </div>
</div>

