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
                          <div class="col-lg-12">
                            <table id="ourDevices" class="table table-striped table-bordered" cellspacing="0" width="100%">
                              <thead>
                                 <tr>
                                  <th>Identity</th>
                                  <th>Mac-Address</th>
                                  <th>IP Address</th>
                                  <th>Version</th>
                                  <th>Uptime</th>
                                  <th>Board</th>
                                  <th>Status</th>
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
                               <h4 class="modal-title" id="myModalLabel" name="device_id">Add Device</h4>
                           </div>
                           <div class="modal-body">
                              <div class="row" style="float: right; margin-right: 5px">
                                  <a class="btn btn-info" href="javascript:;" id="device_reboot"> reboot</a>
                                  <a class="btn btn-danger" href="javascript:;" id="device_reboot"> shutdown</a>
                              </div>
                                 <strong>Mac-Address : </strong> 
                                 <strong id="mac">Mac-Address</strong><br>
                                 <strong>IP-Address : </strong>
                                 <!-- <strong id="ip">Mac-Address</strong><br> -->
                                  <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                                    <div class="panel-heading">
                                      <h2 id="ip">Mac-Address</h2>
                                      <div>
                                        <ul class="nav nav-tabs pull-right">
                                          <li class="active"><a href="#home" data-toggle="tab">Eth 1</a></li>
                                          <li><a href="#tab2" data-toggle="tab">Eth 2</a></li>
                                          <li><a href="#tab3" data-toggle="tab">Eth 3</a></li>
                                          <li><a href="#tab4" data-toggle="tab">Eth 4</a></li>
                                        </ul>
                                      </div>
                                    </div>
                                    <div class="panel-body">
                                      <div class="tab-content">
                                        <div class="tab-pane active" id="home">
                                          <div>1</div>
                                          <div class="mychart" id="chart1" data-title="" style="height: 272px;" data-interface="E10-Bisnis100"></div>
                                        </div>
                                        <div class="tab-pane" id="tab2">
                                          <div>2</div>
                                          <div class="mychart" id="chart2" data-title="" style="height: 272px;" data-interface="E11-BPro100"></div>
                                        </div>
                                        <div class="tab-pane" id="tab3">
                                          <div class="mychart" id="chart3" data-title="" style="height: 272px;" data-interface="E12-Bisnis300"></div>
                                        </div>
                                        <div class="tab-pane" id="tab4">
                                          <div class="mychart" id="chart4" data-title="" style="height: 272px;" data-interface="E13-RadioIndosat"></div>
                                        </div>
                                        <div class="tab-pane" id="Ether5">
                                          <div class="mychart" id="chart3" data-title="" style="height: 272px;" data-interface="E12-Bisnis300"></div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                            </div>
                           <!-- <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" id="add-row" class="btn btn-success">Add</button>
                           </div> -->
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
<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">
  var _site_url = '<?php echo site_url()?>';
    $('a#device_reboot').click(function(){
      $.post('<?php echo site_url()?>/',function(respon){

      }).fail(function(){
        alert('error gan')
      })
    })
    
    $('table#ourDevices').on('click','tbody tr',function(){
      var par = {
        identity: $(this).find('td:eq(0)').html(),
        mac: $(this).find('td:eq(1)').html(),
        address:$(this).find('td:eq(2)').html()
        }
      console.log(par.address);
      $('#ModalAddDevice').modal('show');
      $('#ModalAddDevice').find('#myModalLabel').html(par.identity);
      $('#ModalAddDevice').find('#mac').html(par.mac);
      $('#ModalAddDevice').find('#ip').html(par.address);
      $('[name="device_id"]').val(par.mac);
      $('[name="device_IPv4"]').val(par.address);
      // alert(JSON.stringify(par));
    })

    var table = $('#ourDevices').dataTable({
      "processing" : true,
      "severSide"  : true,
      "order" : [],
      "ajax" : {
        "url" : "<?php echo site_url('discover/ourDevicesJSON') ?>",
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
          {"data" : "status"},
        ],

    });

    var tx = {'E10-Bisnis100': [] , 'E11-BPro100' : [], 'E12-Bisnis300': [] , 'E13-RadioIndosat' : []},
    rx = {'E10-Bisnis100': [] , 'E11-BPro100' : [], 'E12-Bisnis300': [] , 'E13-RadioIndosat' : []},
    point = {'E10-Bisnis100': [] , 'E11-BPro100' : [], 'E12-Bisnis300': [] , 'E13-RadioIndosat' : []};

    function tmpChart(iface){
        $.get(_site_url+'/dashboard/getTrafficInterface/'+iface,function(respon) {
          if (tx[iface].length == 10) {
            tx[iface].shift();
            rx[iface].shift();
            point[iface].shift();
          }
          // console.log(respon);
          tx[iface].push(parseInt(respon.tx));  
          rx[iface].push(parseInt(respon.rx));
          point[iface].push(respon.point);  
            },'json')
          // setTimeout(function(){ tmpChart(); }, 1000);
    }


  var charts = {};
  var chart;
  function requestData(iface,id) 
  {

    // $.ajax({
    //  url: _site_url+'/dashboard/getTrafficInterface/',                 
    //  type: "POST",
    //  dataType: "JSON",
    //  data: {iface:iface} ,
    //  success: function(data) { 
    //    var x = data.point[0];
    //    var y = data.tx[0];
        // console.log(tx,rx,point);
        // console.log(tx);
        charts[id].xAxis[0].setCategories(point[iface]);
        charts[id].series[0].setData(tx[iface]);
        charts[id].series[1].setData(rx[iface]);
        // charts[id].series[0].addPoint([x,y], true, true);

        // charts[id].series[1].addPoint([data.point[0], data.rx[0]], true, true);
        
        // console.log(tx);
    //  },
    //  error: function(XMLHttpRequest, textStatus, errorThrown) { 
    //    console.error("Status: " + textStatus + " request: " + XMLHttpRequest); console.error("Error: " + errorThrown); 
    //  }       
    // });
    
  }

  function graphArea(id){
      var container = $('#'+id);
      if(!container.length) return false;
      var interface = container.data('interface');
      var title = container.data('title');
      
      Highcharts.addEvent(Highcharts.Series, 'afterInit', function () {
        this.symbolUnicode = {
        circle: '●',
        diamond: '♦',
        square: '■',
        triangle: '▲',
        'triangle-down': '▼'
        }[this.symbol] || '●';
      });   


      charts[id] = new Highcharts.Chart({
          chart: {
            renderTo: id,
              type: 'area',
              animation: Highcharts.svg,
            type: 'areaspline',
              events: {
            load: function () {
              setInterval(function () {
              requestData(interface, id);
              }, 5000);
            }       
            }
          },
          title: {text: title
          },
          xAxis: {
              // type: 'datetime',
              // tickPixelInterval: 150
          },
          yAxis: {
              minPadding: 0.2,
          maxPadding: 0.2,
          title: {text: null},
          labels: {
            formatter: function () {      
            var bits = this.value;                          
            var sizes = ['bps', 'kbps', 'Mbps', 'Gbps', 'Tbps'];
            if (bits == 0) return '0 bps';
            var i = parseInt(Math.floor(Math.log(bits) / Math.log(1024)));
            return parseFloat((bits / Math.pow(1024, i)).toFixed(2)) + ' ' + sizes[i];                      
        
            },
          }, 
          },
          tooltip: {
          formatter: function () { 
          var _0x2f7f=["\x70\x6F\x69\x6E\x74\x73","\x79","\x62\x70\x73","\x6B\x62\x70\x73","\x4D\x62\x70\x73","\x47\x62\x70\x73","\x54\x62\x70\x73","\x3C\x73\x70\x61\x6E\x20\x73\x74\x79\x6C\x65\x3D\x22\x63\x6F\x6C\x6F\x72\x3A","\x63\x6F\x6C\x6F\x72","\x73\x65\x72\x69\x65\x73","\x3B\x20\x66\x6F\x6E\x74\x2D\x73\x69\x7A\x65\x3A\x20\x31\x2E\x35\x65\x6D\x3B\x22\x3E","\x73\x79\x6D\x62\x6F\x6C\x55\x6E\x69\x63\x6F\x64\x65","\x3C\x2F\x73\x70\x61\x6E\x3E\x3C\x62\x3E","\x6E\x61\x6D\x65","\x3A\x3C\x2F\x62\x3E\x20\x30\x20\x62\x70\x73","\x70\x75\x73\x68","\x6C\x6F\x67","\x66\x6C\x6F\x6F\x72","\x3A\x3C\x2F\x62\x3E\x20","\x74\x6F\x46\x69\x78\x65\x64","\x70\x6F\x77","\x20","\x65\x61\x63\x68","\x3C\x62\x3E\x4D\x69\x6B\x68\x6D\x6F\x6E\x20\x54\x72\x61\x66\x66\x69\x63\x20\x4D\x6F\x6E\x69\x74\x6F\x72\x3C\x2F\x62\x3E\x3C\x62\x72\x20\x2F\x3E\x3C\x62\x3E\x54\x69\x6D\x65\x3A\x20\x3C\x2F\x62\x3E","\x25\x48\x3A\x25\x4D\x3A\x25\x53","\x78","\x64\x61\x74\x65\x46\x6F\x72\x6D\x61\x74","\x3C\x62\x72\x20\x2F\x3E","\x20\x3C\x62\x72\x2F\x3E\x20","\x6A\x6F\x69\x6E"];var s=[];$[_0x2f7f[22]](this[_0x2f7f[0]],function(_0x3735x2,_0x3735x3){var _0x3735x4=_0x3735x3[_0x2f7f[1]];var _0x3735x5=[_0x2f7f[2],_0x2f7f[3],_0x2f7f[4],_0x2f7f[5],_0x2f7f[6]];if(_0x3735x4== 0){s[_0x2f7f[15]](_0x2f7f[7]+ this[_0x2f7f[9]][_0x2f7f[8]]+ _0x2f7f[10]+ this[_0x2f7f[9]][_0x2f7f[11]]+ _0x2f7f[12]+ this[_0x2f7f[9]][_0x2f7f[13]]+ _0x2f7f[14])};var _0x3735x2=parseInt(Math[_0x2f7f[17]](Math[_0x2f7f[16]](_0x3735x4)/ Math[_0x2f7f[16]](1024)));s[_0x2f7f[15]](_0x2f7f[7]+ this[_0x2f7f[9]][_0x2f7f[8]]+ _0x2f7f[10]+ this[_0x2f7f[9]][_0x2f7f[11]]+ _0x2f7f[12]+ this[_0x2f7f[9]][_0x2f7f[13]]+ _0x2f7f[18]+ parseFloat((_0x3735x4/ Math[_0x2f7f[20]](1024,_0x3735x2))[_0x2f7f[19]](2))+ _0x2f7f[21]+ _0x3735x5[_0x3735x2])});return _0x2f7f[23]+ Highcharts[_0x2f7f[26]](_0x2f7f[24], new Date(this[_0x2f7f[25]]))+ _0x2f7f[27]+ s[_0x2f7f[29]](_0x2f7f[28])
          },
          shared: true                                                      
        },
        series: [
          {name: 'Tx', data: [], marker: {symbol: 'circle'}}, 
          {name: 'Rx', data: [], marker: {symbol: 'circle'}}
        ],
          // plotOptions: {
          //     area: {
          //         // pointStart: function,
          //         marker: {
          //             enabled: false,
          //             symbol: 'circle',
          //             radius: 2,
          //             states: {
          //                 hover: {
          //                     enabled: true
          //                 }
          //             }
          //         }
          //     }
          // },
      });
    }

    // $('#ourDevices').on('click','.add_device',function(){
    // var device_identity=$(this).data('identity');
    // var device_MAC=$(this).data('mac-address');
    // var device_IPv4=$(this).data('address4');
    // var device_OSVersion=$(this).data('version');
    //        $('#ModalAddDevice').modal('show');
    //         $('[name="device_id"]').val(device_id);
    //         $('[name="identity"]').val(identity);
    //         $('[name="mac-address"]').val(mac-address);
    //         $('[name="address4"]').val(address4);
    //         $('[name="version"]').val(version);
    //   });
      
      // table: var table = $('#findDevices').DataTable();
   //          $('#findDevices tbody').on('click', ' tr', function() {
   //              var data = table.row(this).data();
   //            console.log('API row values : ', data );
   //          })

    // function modal(){
      
    //  $('#modal_form').modal('show');
      
    // }
    $(document).ready(function(){
      // setTimeout(function(){ table.ajax.reload(); }, 10000); // 1 Minutes
      setTimeout(function(){ updateDeviceJsonByInterval(); }, 300); // 3 Second
      $('.mychart').each(function(){
        graphArea($(this).attr('id'));
      })
      
      setInterval(function(){ tmpChart('E10-Bisnis100'); }, 10000);
      setInterval(function(){ tmpChart('E11-BPro100'); }, 10000);
      setInterval(function(){ tmpChart('E12-Bisnis300'); }, 10000);
      setInterval(function(){ tmpChart('E13-RadioIndosat'); }, 10000);
      $('.highcharts-credits').hide();     
    })
    function updateDeviceJsonByInterval(){
      $.get("<?php echo site_url()?>/discover/updateDevicesJSON",function(respon){
        setTimeout(function(){ updateDeviceJsonByInterval(); }, 100000); // 3 Second   
      }).fail(function(data){
        alert('Gagal mengambil devices data');
      })
    }
  </script>
    <!-- End loading page level scripts-->

    </body>
</html>