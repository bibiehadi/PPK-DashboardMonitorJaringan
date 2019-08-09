<?php $this->load->view('required/headersidebar_view'); ?>
                </div>
                </div>
                <div class="static-content-wrapper">
                    <div class="static-content">
                        <div class="page-content">
                            <ol class="breadcrumb">
                                
							<li><a href="index.html">Home</a></li>
							<li><a href="#">Hotspot</a></li>
							<li class="active"><a href="tables-data.html">User Profiles</a></li>

                            </ol>
                            <div class="container-fluid">
                            <div data-widget-group="group1">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h2>Users Hotspot</h2>
                                      <div class="panel-ctrls"></div>
                                    </div>
                                    <div class="panel-body no-padding">
                                      <div id="devices">
                                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-fixed-header m-n" id="example">
                                          <thead>
                                            <tr>
                                              <th>ID</th>
                                              <th>Profile Name</th>
                                              <th>Idle-timeout</th>
                                                <th>Keepalive-timeout</th>
                                                <th>Shared Users</th>
                                                <th >Mac Cookie Timeout</th>
                                                <th >Rate Limit</th>
                                                <!-- <th width="5%">Action</th> -->
                                              
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php foreach ($profiles as $profile) {?>
                                              <tr>
                                                <td><?echo $profile['.id'];?></td>
                                                <td><?echo $profile['name'];?></td>
                                                <td><?echo $profile['idle-timeout'];?></td>
                                                <td><?echo $profile['keepalive-timeout'];?></td>
                                                <td><?echo $profile['shared-users'];?></td>
                                                <td><?echo $profile['mac-cookie-timeout'];?></td>
                                                <td><?echo $profile['rate-limit'];?></td>
                                            <? }?>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                      <div class="panel-footer"></div>
                                    </div>
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

    
    

<!-- Modal -->
<!-- Modal Add Device-->
     <!--  <form id="add-row-form" action="<?php echo site_url('discover/addDevice')?>" method="post">
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
     </form> -->

<!-- /Switcher -->
    <!-- Load site level scripts -->

<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> -->

<?php $this->load->view('required/footer_view'); ?>


<!-- End loading site level scripts -->
    
    <!-- Load page level scripts-->
    
 <!-- Load page level scripts-->
    
<script type="text/javascript" src="<?php echo base_url('') ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url('') ?>assets/plugins/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url('') ?>assets/demo/demo-datatables.js"></script>

    <!-- End loading page level scripts-->
<script type="text/javascript">
		 $('#crudtable').DataTable({
				// "processing" : true,
				// "severSide"  : true,
				// "order" : [],
                "bProcessing": true,
                "bServerSide": true,
            // "sAjaxSource": "../server_side/scripts/server_processing.php"
                deferRender: true,
				"ajax" : {
					"url" : "<?php echo site_url('hotspot/usersJSON') ?>",
				},
                "select" : true,
				// "columnDefs": [
		  //       { 
		  //           "targets": [ 0 ], //first column / numbering column
		  //           "orderable": false, //set not orderable
		  //       },
		  //       ],
		  		"columns" : [
                {"data" : "user_id"},
		  		// {"data" : "user_server"},
		  		{"data" : "user_name"},
		  		// {"data" : "user_address"},
		  		// {"data" : "user_mac"},
      //           {"data" : "user_profile"},
                {"data" : "user_uptime"},
		  		],

			});

		 	// $('#findDevices').on('click','.add_device',function(){
		 	// var device_id=$(this).data('id');
		 	// var device_identity=$(this).data('identity');
		 	// var device_MAC=$(this).data('mac');
		 	// var device_IPv4=$(this).data('ip');
		 	// var device_OSVersion=$(this).data('version');
    //         $('#ModalAddDevice').modal('show');
	   //          $('[name="device_id"]').val(device_id);
	   //          $('[name="device_identity"]').val(device_identity);
	   //          $('[name="device_MAC"]').val(device_MAC);
	   //          $('[name="device_IPv4"]').val(device_IPv4);
	   //          $('[name="device_OSVersion"]').val(device_OSVersion);
    //   		});
			
			// table: var table = $('#findDevices').DataTable();
   //          $('#findDevices tbody').on('click', ' tr', function() {
   //              var data = table.row(this).data();
   //            console.log('API row values : ', data );
   //          })

		// function modal(){
			
		// 	$('#modal_form').modal('show');
			
		// }

	</script>
    <!-- End loading page level scripts-->

    </body>
</html>