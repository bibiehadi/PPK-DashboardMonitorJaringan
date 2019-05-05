<?php $this->load->view('templates/headersidebar_view'); ?>
                </div>
                </div>
                <div class="static-content-wrapper">
                    <div class="static-content">
                        <div class="page-content">
                            <ol class="breadcrumb">
                                
							<li><a href="index.html">Home</a></li>
							<li><a href="#">Devices</a></li>
							<li class="active"><a href="tables-data.html">Our Devices</a></li>

                            </ol>
                            <div class="container-fluid">
                                
<div data-widget-group="group1">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Our Devices</h2>
					<div class="panel-ctrls"></div>
				</div>
				<div class="panel-body no-padding">
					<table id="findDevices" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							 <tr>
				                <th>Identity</th>
				                <th>Mac-Address</th>
				                <th>IP Address</th>
				                <th>Version</th>
				                <th style="width:40px;">Action</th>
				            </tr>
						</thead>
					</table>
				</div>
				<div class="panel-footer"></div>
			</div>
		</div>
	</div>
</div>

                            </div> <!-- .container-fluid -->
                        </div> <!-- #page-content -->
                    </div>
                    <footer role="contentinfo">
    <div class="clearfix">
        <ul class="list-unstyled list-inline pull-left">
            <li><h6 style="margin: 0;">&copy; 2015 Avenxo</h6></li>
        </ul>
        <button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i class="ti ti-arrow-up"></i></button>
    </div>
</footer>

                </div>
            </div>
        </div>

    
    <!-- Switcher -->
    <div class="demo-options">
        <div class="demo-options-icon"><i class="ti ti-paint-bucket"></i></div>
        <div class="demo-heading">Demo Settings</div>

        <div class="demo-body">
            <div class="tabular">
                <div class="tabular-row">
                    <div class="tabular-cell">Fixed Header</div>
                    <div class="tabular-cell demo-switches"><input class="bootstrap-switch" type="checkbox" checked data-size="mini" data-on-color="success" data-off-color="default" name="demo-fixedheader" data-on-text="&nbsp;" data-off-text="&nbsp;"></div>
                </div>
                <div class="tabular-row">
                    <div class="tabular-cell">Boxed Layout</div>
                    <div class="tabular-cell demo-switches"><input class="bootstrap-switch" type="checkbox" data-size="mini" data-on-color="success" data-off-color="default" name="demo-boxedlayout" data-on-text="&nbsp;" data-off-text="&nbsp;"></div>
                </div>
                <div class="tabular-row">
                    <div class="tabular-cell">Collapse Leftbar</div>
                    <div class="tabular-cell demo-switches"><input class="bootstrap-switch" type="checkbox" data-size="mini" data-on-color="success" data-off-color="default" name="demo-collapseleftbar" data-on-text="&nbsp;" data-off-text="&nbsp;"></div>
                </div>
            </div>
        </div>

        <div class="demo-body">
            <div class="option-title">Topnav</div>
            <ul id="demo-header-color" class="demo-color-list">
                <li><span class="demo-cyan"></span></li>
                <li><span class="demo-light-blue"></span></li>
                <li><span class="demo-blue"></span></li>
                <li><span class="demo-indigo"></span></li>
                <li><span class="demo-deep-purple"></span></li> 
                <li><span class="demo-purple"></span></li> 
                <li><span class="demo-pink"></span></li> 
                <li><span class="demo-red"></span></li>
                <li><span class="demo-teal"></span></li>
                <li><span class="demo-green"></span></li>
                <li><span class="demo-light-green"></span></li>
                <li><span class="demo-lime"></span></li>
                <li><span class="demo-yellow"></span></li>
                <li><span class="demo-amber"></span></li>
                <li><span class="demo-orange"></span></li>               
                <li><span class="demo-deep-orange"></span></li>
                <li><span class="demo-midnightblue"></span></li>
                <li><span class="demo-bluegray"></span></li>
                <li><span class="demo-bluegraylight"></span></li>
                <li><span class="demo-black"></span></li> 
                <li><span class="demo-gray"></span></li> 
                <li><span class="demo-graylight"></span></li> 
                <li><span class="demo-default"></span></li>
                <li><span class="demo-brown"></span></li>
            </ul>
        </div>

        <div class="demo-body">
            <div class="option-title">Sidebar</div>
            <ul id="demo-sidebar-color" class="demo-color-list">
                <li><span class="demo-cyan"></span></li>
                <li><span class="demo-light-blue"></span></li>
                <li><span class="demo-blue"></span></li>
                <li><span class="demo-indigo"></span></li>
                <li><span class="demo-deep-purple"></span></li> 
                <li><span class="demo-purple"></span></li> 
                <li><span class="demo-pink"></span></li> 
                <li><span class="demo-red"></span></li>
                <li><span class="demo-teal"></span></li>
                <li><span class="demo-green"></span></li>
                <li><span class="demo-light-green"></span></li>
                <li><span class="demo-lime"></span></li>
                <li><span class="demo-yellow"></span></li>
                <li><span class="demo-amber"></span></li>
                <li><span class="demo-orange"></span></li>               
                <li><span class="demo-deep-orange"></span></li>
                <li><span class="demo-midnightblue"></span></li>
                <li><span class="demo-bluegray"></span></li>
                <li><span class="demo-bluegraylight"></span></li>
                <li><span class="demo-black"></span></li> 
                <li><span class="demo-gray"></span></li> 
                <li><span class="demo-graylight"></span></li> 
                <li><span class="demo-default"></span></li>
                <li><span class="demo-brown"></span></li>
            </ul>
        </div>



    </div>

<!-- Modal -->
<!-- Modal Add Device-->
      <form id="add-row-form" action="<?php echo site_url('mikrotik/addDevice')?>" method="post">
         <div class="modal fade" id="ModalAddDevice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title" id="myModalLabel">Add Device</h4>
                   </div>
                   <div class="modal-body">
                                                 <strong>Anda yakin mau menambahkan device ini?</strong><br>
                                                 <strong>Device ID</strong><br>
                                                 <input type="input" name="device_id" class="form-control" readonly>
                                                 <strong>Identity</strong><br>
                                                 <input type="input" name="device_identity" class="form-control" readonly>
                                                 <strong>Mac-Address</strong><br>
                                                 <input type="input" name="device_MAC" class="form-control" readonly>
                                                 <strong>IP-Address</strong><br>
                                                 <input type="input" name="device_IPv4" class="form-control" readonly>
                                                 <strong>OS Version</strong><br>
                                                 <input type="input" name="device_OSVersion" class="form-control" readonly>
                   </div>
                   <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="add-row" class="btn btn-success">Add</button>
                   </div>
                    </div>
            </div>
         </div>
     </form>

<!-- /Switcher -->
    <!-- Load site level scripts -->

<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> -->

<?php $this->load->view('templates/footer_view'); ?>


<!-- End loading site level scripts -->
    
    <!-- Load page level scripts-->
    
<script type="text/javascript" src="<?php echo base_url('') ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url('') ?>assets/plugins/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url('') ?>assets/demo/demo-datatables.js"></script>
<script type="text/javascript">
		 $('#findDevices').dataTable({
				"processing" : true,
				"severSide"  : true,
				"order" : [],
				"ajax" : {
					"url" : "<?php echo site_url('mikrotik/findDevicesJSON') ?>",
					// "type" : "POST",
					"dataType" : "JSON"
				},
				// "columnDefs": [
		  //       { 
		  //           "targets": [ 0 ], //first column / numbering column
		  //           "orderable": false, //set not orderable
		  //       },
		  //       ],
		  		"columns" : [
		  		{"data" : "device_identity"},
		  		{"data" : "device_MAC"},
		  		{"data" : "device_IPv4"},
		  		{"data" : "device_OSVersion"},
		  		{"data" : "action"},
		  		],

			});

		 	$('#findDevices').on('click','.add_device',function(){
		 	var device_id=$(this).data('id');
		 	var device_identity=$(this).data('identity');
		 	var device_MAC=$(this).data('mac');
		 	var device_IPv4=$(this).data('ip');
		 	var device_OSVersion=$(this).data('version');
            $('#ModalAddDevice').modal('show');
	            $('[name="device_id"]').val(device_id);
	            $('[name="device_identity"]').val(device_identity);
	            $('[name="device_MAC"]').val(device_MAC);
	            $('[name="device_IPv4"]').val(device_IPv4);
	            $('[name="device_OSVersion"]').val(device_OSVersion);
      		});
			
			table: var table = $('#findDevices').DataTable();
            $('#findDevices tbody').on('click', ' tr', function() {
                var data = table.row(this).data();
              console.log('API row values : ', data );
            })

		// function modal(){
			
		// 	$('#modal_form').modal('show');
			
		// }

	</script>
    <!-- End loading page level scripts-->

    </body>
</html>