<?php $this->load->view('required/headersidebar_view'); ?>
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
												<h2>Discover Another Router</h2>
											</div>
											<div class="panel-body no-padding">
												<div class="row" style="margin: 10px">
													<div class="col-lg-12">
														<table id="findDevices" class="table table-striped table-bordered" cellspacing="0" width="100%">
															<thead>
																 <tr>
													                <th>Identity</th>
									                                <th>Mac-Address</th>
									                                <th>IP Address</th>
									                                <th>Version</th>
									                                <th>Uptime</th>
									                                <th>Board</th>
													                <th style="width:40px;">Action</th>
													            </tr>
															</thead>
														</table>
													</div>
													
												</div>
												
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
				<!-- Modal -->
				<!-- Modal Add Device-->
				      <form id="add-row-form" action="<?php echo site_url('discover/addDevice')?>" method="post">
				         <div class="modal fade" id="ModalAddDevice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				            <div class="modal-dialog">
				               <div class="modal-content">
				                   <div class="modal-header">
				                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				                       <h4 class="modal-title" id="myModalLabel">Add Device</h4>
				                   </div>
				                   <div class="modal-body">
				                   	<a class="btn btn-info" href="javascript:;" id="device_reboot"> reboot</a>
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
				    <!-- Load site level scripts -->

<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> -->

<?php $this->load->view('required/footer_view'); ?>


<!-- End loading site level scripts -->
    
    <!-- Load page level scripts-->
    
<script type="text/javascript" src="<?php echo base_url('') ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url('') ?>assets/plugins/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url('') ?>assets/demo/demo-datatables.js"></script>
<script type="text/javascript">
		$('a#device_reboot').click(function(){
			$.post('<?php echo site_url()?>/',function(respon){

			}).fail(function(){
				alert('error gan')
			})
		})
		var table = $('#findDevices').dataTable({
			"processing" : true,
			"severSide"  : true,
			"order" : [],
			"ajax" : {
				"url" : "<?php echo site_url('discover/findNewDevicesJSON') ?>",
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
		  		{"data" : "identity"},
		        {"data" : "mac-address"},
		        {"data" : "address4"},
		        {"data" : "version"},
		        {"data" : "uptime"},
		        {"data" : "board"},
		  		{"data" : "action"},
	  		],

		});

	 	$('#findDevices').on('click','.add_device',function(){
	 	var device_identity=$(this).data('identity');
	 	var device_MAC=$(this).data('mac-address');
	 	var device_IPv4=$(this).data('address4');
	 	var device_OSVersion=$(this).data('version');
            $('#ModalAddDevice').modal('show');
            $('[name="identity"]').val(device_identity);
            $('[name="mac-address"]').val(device_mac-address);
            $('[name="address4"]').val(device_address4);
            $('[name="version"]').val(device_version);
    	});
			
			// table: var table = $('#findDevices').DataTable();
   //          $('#findDevices tbody').on('click', ' tr', function() {
   //              var data = table.row(this).data();
   //            console.log('API row values : ', data );
   //          })

		// function modal(){
			
		// 	$('#modal_form').modal('show');
			
		// }
		$(document).ready(function(){
			setTimeout(function(){ getDeviceJsonByInterval(); }, 3000); // 3 Second
		})
		function getDeviceJsonByInterval(){
			$.get("<?php echo site_url()?>/discover/findNewDevicesJSON",function(respon){
				table.ajax.reload();
				setTimeout(function(){ getDeviceJsonByInterval(); }, 3000); // 3 Second		
			}).fail(function(data){
				alert('Gagal mengambil devices data');
			})
		}
	</script>
    <!-- End loading page level scripts-->

    </body>
</html>