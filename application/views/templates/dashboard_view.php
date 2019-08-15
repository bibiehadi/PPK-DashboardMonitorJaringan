<?php $this->load->view('required/headersidebar_view'); ?>
    </div>
</div>
<div class="static-content-wrapper">
    <div class="static-content">
        <div class="page-content">
            <ol class="breadcrumb">
				<li class=""><a href="index.html">Home</a></li>
				<li class="active"><a href="index.html">Dashboard</a></li>
            </ol>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3">
						<div class="info-tile tile-info">
							<div class="tile-icon"><i class="ti ti-stats-up"></i></div>
							<div class="tile-heading"><span>MikroTik Online</span></div>
							<div class="tile-body"><span><?php echo $online; ?> / <?php echo $all; ?></span></div>
							<div class="tile-footer"><span class="text-success">5.2% <i class="fa fa-level-up"></i></span></div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="info-tile tile-info">
							<div class="tile-icon"><i class="ti ti-user"></i></div>
							<div class="tile-heading"><span>Hotspot Users</span></div>
							<div class="tile-body"><span><?php echo $user; ?></span></div>
							<div class="tile-footer"><span class="text-danger">-25.4%</span></div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="info-tile tile-info">
							<div class="tile-icon"><i class="ti ti-user"></i></div>
							<div class="tile-heading"><span>Users Connect</span></div>
							<div class="tile-body"><span><?php echo $connect; ?></span></div>
							<div class="tile-footer"><span class="text-danger">-25.4%</span></div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="info-tile info-tile-alt tile-blue">
							<div class="tile-icon"><i class="ti ti-user"></i></div>
							<div class="tile-heading"><span>Users Login</span></div>
							<div class="tile-body"><span><?php echo $active; ?></span></div>
							<div class="tile-footer"><span class="text-danger">-25.4%</span></div>
						</div>
					</div>
				</div>

				<div data-widget-group>
					<div class="row">
						<div class="col-md-6">
							<div class="panel panel-info" data-widget='{"id" : "wiget9", "draggable": "false"}'>
								<div class="panel-heading">
									<h2>E10-Bisnis 100</h2>
									<div class="panel-ctrls button-icon-bg" 
										data-actions-container="" 
										data-action-collapse='{"target": ".panel-body"}'
										data-action-colorpicker=''
										data-action-refresh-demo='{"type": "circular"}'
										>
									</div>
								</div>
								<div class="panel-editbox" data-widget-controls=""></div>
								<div class="panel-body">					
									<div class="mychart" id="chart1" data-title="" style="height: 272px;" data-interface="E10"></div>

								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="panel panel-info" data-widget='{"id" : "wiget9", "draggable": "false"}'>
								<div class="panel-heading">
									<h2>E11-Bisnis Pro 100</h2>
									<div class="panel-ctrls button-icon-bg" 
										data-actions-container="" 
										data-action-collapse='{"target": ".panel-body"}'
										data-action-colorpicker=''
										data-action-refresh-demo='{"type": "circular"}'
										>
									</div>
								</div>
								<div class="panel-editbox" data-widget-controls=""></div>
								<div class="panel-body">					
									<div class="mychart" id="chart2" data-title="" style="height: 272px;" data-interface="E11"></div>

								</div>
							</div>
						</div>

					</div>
					
					<div class="row">
						<div class="col-md-6">
							<div class="panel panel-info" data-widget='{"id" : "wiget9", "draggable": "false"}'>
								<div class="panel-heading">
									<h2>E12-Bisnis 300</h2>
									<div class="panel-ctrls button-icon-bg" 
										data-actions-container="" 
										data-action-collapse='{"target": ".panel-body"}'
										data-action-colorpicker=''
										data-action-refresh-demo='{"type": "circular"}'
										>
									</div>
								</div>
								<div class="panel-editbox" data-widget-controls=""></div>
								<div class="panel-body">					
									<div class="mychart" id="chart3" data-title="" style="height: 272px;" data-interface="E12"></div>

								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="panel panel-info" data-widget='{"id" : "wiget9", "draggable": "false"}'>
								<div class="panel-heading">
									<h2>E13-Radio Indosat</h2>
									<div class="panel-ctrls button-icon-bg" 
										data-actions-container="" 
										data-action-collapse='{"target": ".panel-body"}'
										data-action-colorpicker=''
										data-action-refresh-demo='{"type": "circular"}'
										>
									</div>
								</div>
								<div class="panel-editbox" data-widget-controls=""></div>
								<div class="panel-body">
									<!-- <div id="socialstats" style="height: 272px;" class="mt-sm mb-sm"></div> -->
									<div class="mychart" id="chart4" data-title="" style="height: 272px;" data-interface="E13"></div>

								</div>
							</div>
						</div>
					<!-- </div> -->


					<!-- <div class="row"> -->
						<div class="col-md-6">
							<div class="panel panel-gray" data-widget='{"id" : "wiget1", "draggable": "false"}'>
				                <div class="panel-heading">
				                	<h2>Log Main Router</h2>
					                <div class="panel-ctrls button-icon-bg" 
										data-actions-container="" 
										data-action-collapse='{"target": ".panel-body"}'
										data-action-colorpicker=''
										data-action-refresh-demo='{"type": "circular"}'
										>
									</div>
								</div>
								<div class="panel-body scroll-pane" style="height: 320px;" >
									<div class="scroll-content" data-konten='log_router'>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="panel panel-teal" data-widget='{"id" : "wiget2", "draggable": "false"}'>
								<div class="panel-heading">
									<h2>CPU Load</h2>
									<div class="panel-ctrls button-icon-bg" 
										data-actions-container="" 
										data-action-collapse='{"target": ".panel-body"}'
										data-action-colorpicker=''
										data-action-refresh-demo='{"type": "circular"}'
										>
									</div>
								</div>
								<div class="panel-body scroll-pane no-padding" style="height: 320px;">
									<div class="scroll-content" data-konten='cpu_load'>
										
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="panel panel-teal" data-widget='{"id" : "wiget2", "draggable": "false"}'>
								<div class="panel-heading">
									<h2>Memory Load</h2>
									<div class="panel-ctrls button-icon-bg" 
										data-actions-container="" 
										data-action-collapse='{"target": ".panel-body"}'
										data-action-colorpicker=''
										data-action-refresh-demo='{"type": "circular"}'
										>
									</div>
								</div>
								<div class="panel-body no-padding scroll-pane" style="height: 320px;">
									<div class="scroll-content" data-konten='memory_load'>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- .container-fluid -->
		</div> <!-- #page-content -->
    <!-- </div> -->
<!-- </div> -->
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

    
    <!-- Load site level scripts -->
<?php $this->load->view('required/footer_view'); ?>
    <!-- Load page level scripts-->
    
<!-- Charts -->
<script type="text/javascript" src="<?php echo base_url('') ?>assets/plugins/charts-flot/jquery.flot.min.js"></script>             	<!-- Flot Main File -->
<script type="text/javascript" src="<?php echo base_url('') ?>assets/plugins/charts-flot/jquery.flot.pie.min.js"></script>             <!-- Flot Pie Chart Plugin -->
<script type="text/javascript" src="<?php echo base_url('') ?>assets/plugins/charts-flot/jquery.flot.stack.min.js"></script>       	<!-- Flot Stacked Charts Plugin -->
<script type="text/javascript" src="<?php echo base_url('') ?>assets/plugins/charts-flot/jquery.flot.orderBars.min.js"></script>   	<!-- Flot Ordered Bars Plugin-->
<script type="text/javascript" src="<?php echo base_url('') ?>assets/plugins/charts-flot/jquery.flot.resize.min.js"></script>          <!-- Flot Responsive -->
<script type="text/javascript" src="<?php echo base_url('') ?>assets/plugins/charts-flot/jquery.flot.tooltip.min.js"></script> 		<!-- Flot Tooltips -->
<script type="text/javascript" src="<?php echo base_url('') ?>assets/plugins/charts-flot/jquery.flot.spline.js"></script> 				<!-- Flot Curved Lines -->

<script type="text/javascript" src="<?php echo base_url('') ?>assets/plugins/sparklines/jquery.sparklines.min.js"></script> 			 <!-- Sparkline -->

<script type="text/javascript" src="<?php echo base_url('') ?>assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>       <!-- jVectorMap -->
<script type="text/javascript" src="<?php echo base_url('') ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>   <!-- jVectorMap -->

<script type="text/javascript" src="<?php echo base_url('') ?>assets/plugins/switchery/switchery.js"></script>     					<!-- Switchery -->
<script type="text/javascript" src="<?php echo base_url('') ?>assets/plugins/easypiechart/jquery.easypiechart.js"></script>
<script type="text/javascript" src="<?php echo base_url('') ?>assets/plugins/fullcalendar/moment.min.js"></script> 		 			<!-- Moment.js Dependency -->
<script type="text/javascript" src="<?php echo base_url('') ?>assets/plugins/fullcalendar/fullcalendar.min.js"></script>   			<!-- Calendar Plugin -->

<!-- <script type="text/javascript" src="<?php echo base_url('') ?>assets/demo/demo-index.js"></script> 									<!-- Initialize scripts for this page-->

<script>
	var _site_url = '<?php echo site_url()?>';
	$(document).ready(function(){
		setTimeout(function(){ loadResource(); }, 3000);
		setTimeout(function(){ loadLog(); }, 3000);
	})

	function loadLog(){
		$.get(_site_url+'/dashboard/getLog',function(respon){
			$('div[data-konten="log_router"').html(respon.log);
		},'json')
		setTimeout(function(){ loadLog(); }, 3000);
	}

	function loadResource(){
		$.get(_site_url+'/dashboard/getAllResource',function(respon){
			$('div[data-konten="memory_load"]').html(respon.memory);
		},'json')
		$.get(_site_url+'/dashboard/getAllResource',function(respon){
			$('div[data-konten="cpu_load"]').html(respon.cpu);
		},'json')
		setTimeout(function(){ loadResource(); }, 2000);
	}
</script>

    <!-- End loading page level scripts-->

    </body>

</html>	