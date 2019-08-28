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
                                          <h2>Our Devices</h2>
                                        </div>
                                        <div class="panel-body no-padding">
                                          <div class="row" style="margin: 10px">
                                            <div class="ourDevices" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                   <tr>
                                                      <th>Identity</th>
                                                      <th>Mac-Address</th>
                                                      <th>IP Address</th>
                                                      <th>Version</th>
                                                      <th>Status</th>
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
            </div>
        </div>
<!-- Modal -->
<!-- Modal Add Device-->
      <form id="add-row-form" action="<?php echo site_url('discover/addDevice')?>" method="post">
         <div class="modal fade" id="ModalAddDevice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title" id="device_name">Device</h4>
                   </div>
                   <div class="modal-body" id="detail">
                      <h2 name="device_identity" >Router Name</h2>
                                                 
                   </div>
                   <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="add-row" class="btn btn-success">Add</button>
                   </div>
                    </div>
            </div>
         </div>
     </form>

<!-- Modal Reset-->
         <div class="modal fade" id="ModalBTNReboot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title" id="myModalLabel">Add Device</h4>

                   </div>
                   <div class="modal-body">
                                <strong>Apakah anda yakin ingin mereboot device ini?</strong><br>                     
                   </div>
                   <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a type="button" class="btn" style="background-color: #FF5722; color: #FFF" href="<?php echo site_url('discover/rebootDevice/').$mac?>">Reboot</a>
                   </div>
                    </div>
            </div>
         </div>
     
<!-- /Switcher -->
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
    var table = $('#ourDevices').dataTable({
      "processing" : true,
      "severSide"  : true,
      "order" : [],
      "ajax" : {
        "url" : "<?php echo site_url('discover/ourDevicesJSON') ?>",
        "type" : "POST",
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
          {"data" : "action"},
        ],

    });
      function detailRouter(identity,mac,address){
            // $('#example').on('click','.detail_device',function(){
        
            var device_id=$(this).data('id');
            var device_identity=identity;
            var device_MAC=$(this).data('mac');
            var device_IPv4=$(this).data('ip');
            var device_OSVersion=$(this).data('version');
              $('#ModalAddDevice').modal('show');
              getDetail(mac,address);
                $('[id="device_name"]').val(device_identity);
                $('[name="device_identity"]').val(device_identity);
                $('[name="device_MAC"]').val(device_MAC);
                $('[name="device_IPv4"]').val(device_IPv4);
                $('[name="device_OSVersion"]').val(device_OSVersion);
                // });
        return false;
      }

      function getDetail(mac,address) {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url() . '/discover/getdetaildevice'; ?>",
            data:'mac=' + mac + '&address=' + address,
            success: function(resp) {
                $("#detail").html(resp);
            },
            error: function(event, textStatus, errorThrown) {
                $("#detail").html('Error Message: ' + textStatus + ' , HTTP Error: ' + errorThrown);
            }
        });
    }

      $('#example').on('click','.btn_reboot',function(){
            // var device_id=$(this).data('id');
            // var device_identity=$(this).data('identity');
            var device_MAC=$(this).data('mac');
            var device_IPv4=$(this).data('ip');
            // var device_OSVersion=$(this).data('version');
            $('#ModalBTNReboot').modal('show');
                $('[name="MAC"]').val(device_MAC);
       //          $('[name="device_IPv4"]').val(device_IPv4);
            });
            // table: var table = $('#ourDevices').DataTable();
      //       $('#ourDevices tbody').on('click', ' tr', function() {
      //           var data = table.row(this).data();
      //         console.log('API row values : ', data['device_IPv4'] );
      //       })
        // function modal(){
            
        //  $('#modal_form').modal('show');
            
        // }

    </script>
    <!-- End loading page level scripts-->

    </body>
</html>