<div class="footer">

        <div class="copyright">
            <p>Copyright &copy; Designed &amp; Developed by <a href="https://qranbessa.net/" target="_blank">QR Anbessa</a>
                <?php echo date('Y') ?></p>
        </div>
    </div>
    <!--**********************************
        Footer end
    ***********************************-->


</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<!-- <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>   -->
<script src="<?php echo base_url() ?>assets/vendor/global/global.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

<!-- Apex Chart -->
<?php 
    if(current_url()==base_url('/visitors-list') || current_url()==base_url('/dashboard')){?>
    <script src="<?php echo base_url() ?>assets/vendor/apexchart/apexchart.js"></script>
<?php }?>
<script src="<?php echo base_url() ?>assets/vendor/nouislider/nouislider.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/wnumb/wNumb.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins-init/datatables.init.js"></script>


<!-- chart js -->
<script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins-init/chartjs-init.js"></script>


<!-- Daterangepicker -->
<!-- momment js is must -->
<script src="<?php echo base_url() ?>assets/vendor/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- clockpicker -->
<script src="<?php echo base_url() ?>assets/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
<!-- asColorPicker -->
<script src="<?php echo base_url() ?>assets/vendor/jquery-asColor/jquery-asColor.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
<!-- Material color picker -->
<script src="<?php echo base_url() ?>assets/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<!-- pickdate -->
<script src="<?php echo base_url() ?>assets/vendor/pickadate/picker.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/pickadate/picker.time.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/pickadate/picker.date.js"></script>



<!-- Daterangepicker -->
<script src="<?php echo base_url() ?>assets/js/plugins-init/bs-daterange-picker-init.js"></script>
<!-- Clockpicker init -->
<script src="<?php echo base_url() ?>assets/js/plugins-init/clock-picker-init.js"></script>
<!-- asColorPicker init -->
<script src="<?php echo base_url() ?>assets/js/plugins-init/jquery-asColorPicker.init.js"></script>
<!-- Material color picker init -->
<script src="<?php echo base_url() ?>assets/js/plugins-init/material-date-picker-init.js"></script>
<!-- Pickdate -->
<script src="<?php echo base_url() ?>assets/js/plugins-init/pickadate-init.js"></script>

<script src="<?php echo base_url() ?>assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>


<!-- Dashboard 1 -->
<script src="<?php echo base_url() ?>assets/js/dashboard/dashboard-1.js"></script>

<script src="<?php echo base_url() ?>assets/js/custom.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/dlabnav-init.js"></script>
<script src="<?php echo base_url() ?>assets/js/demo.js"></script>

<script type="text/javascript">

    dailyGraphData();
    weeklyGraphData();
    monthlyGraphData();
    CountryGraphData();

    function dailyGraphData(){
        $.ajax({

            type: 'POST',
            url: '<?php echo site_url()?>visitors/visitors_per_hour',
            data:{

            },
            success: function(data){
                var hour = [];
                var count = [];
                var rgba_color =[]; 
                var ctx = document.getElementById('users_list').getContext('2d');
                    
                $.each(jQuery.parseJSON(data), function(index, value){
                    var r = Math.floor(Math.random() * 255);
                    var g = Math.floor(Math.random() * 190);
                    var b = Math.floor(Math.random() * 210);
                    hour.push(value.hour);
                    count.push(value.web_visitor);
                    rgba_color.push('rgba('+r+','+g+','+ b+', 0.1)');
                    
                });
                    
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: hour,
                        datasets: [{
                            label: '',
                            data: count,
                            backgroundColor: rgba_color,
                            borderColor: rgba_color,
                            borderWidth: 2
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                gridLines: {
                                display: false,
                                
                                },
                            ticks: {
                                    beginAtZero: true,
                                    display:true,
                                    precision:0
                                }
                            }],
                            xAxes: [{
                                gridLines: {
                                display: false,
                                },
                                ticks: {

                                    display: true ,//this will remove only the label
                                }
                            }],
                        },
                        legend:{
                            display:false,
                        },
                        title:{
                            display:true,
                            text:'Visitors Per Hour',
                            fontSize: 20
                        },
                    }
                });
            }
        });
    }

    function weeklyGraphData(){
        $.ajax({

            type: 'POST',
            url: '<?php echo site_url()?>visitors/visitors_per_week',
            data:{

            },
            success: function(data){
                var weekdays = [];
                var count = [];
                var rgba_color =[]; 
                var ctx = document.getElementById('weekly_list').getContext('2d');
                    
                $.each(jQuery.parseJSON(data), function(index, value){
                    var r = Math.floor(Math.random() * 150);
                    var g = Math.floor(Math.random() * 80);
                    var b = Math.floor(Math.random() * 250);
                    weekdays.push(value.weekdays);
                    count.push(value.web_visitor);
                    rgba_color.push('rgba('+r+','+g+','+ b+', 0.99)');
                    
                });
                    
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: weekdays,
                        datasets: [{
                            label: '',
                            data: count,
                            backgroundColor: rgba_color,
                            borderColor: rgba_color,
                            borderWidth: 1,
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    display: false,                                
                                },
                            ticks: {
                                    beginAtZero: true,
                                    display:true,
                                    precision:0
                                }
                            }],
                            xAxes: [{
                                gridLines: {
                                    display: false,
                                },
                                ticks: {
                                    display: false,//this will remove only the label
                                }
                            }],
                        },
                        legend:{
                            display:false,
                        },
                        title:{
                            display:false,
                            text:'Visitors Per Hour',
                            fontSize: 20
                        },
                    }
                });
            }
        });
    }

    function monthlyGraphData(){
        $.ajax({

            type: 'POST',
            url: '<?php echo site_url()?>visitors/visitors_per_monthly',
            data:{

            },
            success: function(data){
                var month = [];
                var count = [];
                var rgba_color =[]; 
                var ctx = document.getElementById('monthly_list').getContext('2d');
                    
                $.each(jQuery.parseJSON(data), function(index, value){
                    
                    var r = Math.floor(Math.random() * 150);
                    var g = Math.floor(Math.random() * 80);
                    var b = Math.floor(Math.random() * 250);
                    month.push(value.month);
                    count.push(value.web_visitor);
                    rgba_color.push('rgba('+r+','+g+','+ b+', 0.99)');
                    
                });
                    
                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: month,
                        datasets: [{
                            label: '',
                            data: count,
                            backgroundColor: rgba_color,
                            borderColor: rgba_color,
                            borderWidth: 1,
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                gridLines: {
                                display: false,
                                
                                },
                            ticks: {
                                beginAtZero: true,
                                display:false
                            }
                            }],
                            xAxes: [{
                                gridLines: {
                                display: false,
                                },
                                ticks: {
                                    display: false ,//this will remove only the label
                                }
                            }],
                        },
                        legend:{
                            display:false,
                        },
                        title:{
                            display:false,
                            text:'Visitors Per Hour',
                            fontSize: 20
                        },
                    }
                });
            }
        });
    }
    
    
    function CountryGraphData(){
        $.ajax({

            type: 'POST',
            url: '<?php echo site_url()?>visitors/visitors_by_country',
            data:{

            },
            success: function(data){
                var month = [];
                var count = [];
                var rgba_color =[]; 
                var ctx = document.getElementById('country_graph').getContext('2d');
                    
                $.each(jQuery.parseJSON(data), function(index, value){
                    // console.log(value);
                    var r = Math.floor(Math.random() * 150);
                    var g = Math.floor(Math.random() * 80);
                    var b = Math.floor(Math.random() * 250);
                    month.push(value.country_name);
                    count.push(value.visitor);
                    rgba_color.push('rgba('+r+','+g+','+ b+', 0.99)');
                    
                });
                    
                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: month,
                        datasets: [{
                            label: '',
                            data: count,
                            backgroundColor: rgba_color,
                            borderColor: rgba_color,
                            borderWidth: 1,
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                gridLines: {
                                display: false,
                                
                                },
                            ticks: {
                                beginAtZero: true,
                                display:false
                            }
                            }],
                            xAxes: [{
                                gridLines: {
                                display: false,
                                },
                                ticks: {
                                    display: false ,//this will remove only the label
                                }
                            }],
                        },
                        legend:{
                            display:false,
                        },
                        title:{
                            display:false,
                            text:'Visitors Per Hour',
                            fontSize: 20
                        },
                    }
                });
            }
        });
    }
</script>

<script>
	var name = "<?php echo $_SESSION["full_name"] ?>";
	var initials = name.charAt(0);
	console.log(initials);
	document.getElementById("name").innerHTML = initials;
</script>

</body>

</html>
