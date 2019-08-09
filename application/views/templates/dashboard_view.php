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
			<div class="tile-icon"><i class="ti ti-user"></i></div>
			<div class="tile-heading"><span>Hotspot Users</span></div>
			<div class="tile-body"><span><?php echo $user; ?></span></div>
			<div class="tile-footer"><span class="text-danger">-25.4%</span></div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="info-tile info-tile-alt tile-blue">
			<div class="tile-icon"><i class="ti ti-user"></i></div>
			<div class="tile-heading"><span>Active Users</span></div>
			<div class="tile-body"><span><?php echo $active; ?></span></div>
			<div class="tile-footer"><span class="text-danger">-25.4%</span></div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="info-tile tile-info">
			<div class="tile-icon"><i class="ti ti-stats-up"></i></div>
			<div class="tile-heading"><span>MikroTik Online</span></div>
			<div class="tile-body"><span><?php echo $online; ?> / <?php echo $all; ?></span></div>
			<div class="tile-footer"><span class="text-success">5.2% <i class="fa fa-level-up"></i></span></div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="info-tile tile-danger">
			<div class="tile-icon"><i class="ti ti-bar-chart-alt"></i></div>
			<div class="tile-heading"><span>Visitors</span></div>
			<div class="tile-body"><span>12,600</span></div>
			<div class="tile-footer"><span class="text-danger">10.5% <i class="fa fa-level-down"></i></span></div>
		</div>
	</div>
</div>

<div data-widget-group="group1">
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
	</div>


	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-gray" data-widget='{"draggable": "false"}'>
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
				<div class="panel-body scroll-pane" style="height: 320px;">
					<div class="scroll-content">
						<ul class="mini-timeline">
							<?php foreach (array_reverse($logs) as $log) { ?>
							<li class="mini-timeline-deeporange">
								<div class="timeline-icon"></div>
								<div class="timeline-body">
									<div class="timeline-content">
										<a href="#/" class="name"><?php echo $log['topics'] ?></a> commented on thread <a href="#/"><?php echo $log['message'] ?></a>
										<span class="time"><?php echo $log['time']; ?></span>
									</div>
								</div>
							</li>
							<? } ?>
							<!-- <li class="mini-timeline-deeporange">
								<div class="timeline-icon"></div>
								<div class="timeline-body">
									<div class="timeline-content">
										<a href="#/" class="name">Shawna Owen</a> added <a href="#/" class="name">Alonzo Keller</a> and <a href="#/" class="name">Mario Bailey</a> to project <a href="#/">Wordpress eCommerce Template</a>
										<span class="time">6 mins ago</span>
									</div>
								</div>
							</li>

							<li class="mini-timeline-info">
								<div class="timeline-icon"></div>
								<div class="timeline-body">
									<div class="timeline-content">
										<a href="#/" class="name">Christian Delgado</a> commented on thread <a href="#/">Frontend Template PSD</a>
										<span class="time">12 mins ago</span>
									</div>
								</div>
							</li>

							<li class="mini-timeline-indigo">
								<div class="timeline-icon"></div>
								<div class="timeline-body">
									<div class="timeline-content">
										<a href="#/" class="name">Jonathan Smith</a> added <a href="#/" class="name">Frend Pratt</a> and <a href="#/" class="name">Robin Horton</a> to project <a href="#/">Material Design Admin Template</a>
										<span class="time">6 hours ago</span>
									</div>
								</div>
							</li>
							<li class="mini-timeline-lime">
								<div class="timeline-icon"></div>
								<div class="timeline-body">
									<div class="timeline-content">
										<a href="#/" class="name">Vincent Keller</a> added new task <a href="#/">Admin Dashboard UI</a>
										<span class="time">4 mins ago</span>
									</div>
								</div>
							</li>

							<li class="mini-timeline-deeporange">
								<div class="timeline-icon"></div>
								<div class="timeline-body">
									<div class="timeline-content">
										<a href="#/" class="name">Shawna Owen</a> added <a href="#/" class="name">Alonzo Keller</a> and <a href="#/" class="name">Mario Bailey</a> to project <a href="#/">Wordpress eCommerce Template</a>
										<span class="time">6 mins ago</span>
									</div>
								</div>
							</li>

							<li class="mini-timeline-info">
								<div class="timeline-icon"></div>
								<div class="timeline-body">
									<div class="timeline-content">
										<a href="#/" class="name">Christian Delgado</a> commented on thread <a href="#/">Frontend Template PSD</a>
										<span class="time">12 mins ago</span>
									</div>
								</div>
							</li>

							<li class="mini-timeline-indigo">
								<div class="timeline-icon"></div>
								<div class="timeline-body">
									<div class="timeline-content">
										<a href="#/" class="name">Jonathan Smith</a> added <a href="#/" class="name">Frend Pratt</a> and <a href="#/" class="name">Robin Horton</a> to project <a href="#/">Material Design Admin Template</a>
										<span class="time">6 hours ago</span>
									</div>
								</div>
							</li>
							<li class="mini-timeline-default">
								<div class="timeline-body ml-n">
									<div class="timeline-content">
										<button type="button" data-loading-text="Loading..." class="loading-example-btn btn btn-sm btn-default">See more</button>
									</div>
								</div>
							</li> -->
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-teal" data-widget='{"draggable": "false"}'>
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
				<div class="panel-body no-padding">
					<table class="table browsers m-n">
						<tbody>
							<tr>
								<td>Google Chrome</td>
								<td class="text-right">43.7%</td>
								<td class="vam" style="width: 56px;">
									<div class="progress m-n">
	                                  <div class="progress-bar progress-bar-teal" style="width: 100%"></div>
	                                </div>
	                            </td>
							</tr>
							<tr>
								<td>Firefox</td>
								<td class="text-right">20.5%</td>
								<td class="vam">
									<div class="progress m-n">
	                                  <div class="progress-bar progress-bar-teal" style="width: 50%"></div>
	                                </div>
	                            </td>
							</tr>
							<tr>
								<td>Opera</td>
								<td class="text-right">14.6%</td>
								<td class="vam">
									<div class="progress m-n">
	                                  <div class="progress-bar progress-bar-teal" style="width: 40%"></div>
	                                </div>
	                            </td>
							</tr>
							<tr>
								<td>Safari</td>
								<td class="text-right">9.1%</td>
								<td class="vam">
									<div class="progress m-n">
	                                  <div class="progress-bar progress-bar-teal" style="width: 25%"></div>
	                                </div>
	                            </td>
							</tr>
							<tr>
								<td>Internet Explorer</td>
								<td class="text-right">5.3%</td>
								<td class="vam">
									<div class="progress m-n">
	                                  <div class="progress-bar progress-bar-teal" style="width: 12.5%"></div>
	                                </div>
	                            </td>
							</tr>
							<tr>
								<td>Torch</td>
								<td class="text-right">2.9%</td>
								<td class="vam">
									<div class="progress m-n">
	                                  <div class="progress-bar progress-bar-teal" style="width: 9%"></div>
	                                </div>
	                            </td>
							</tr>
							<tr>
								<td>Maxthon</td>
								<td class="text-right">2.3%</td>
								<td class="vam">
									<div class="progress m-n">
	                                  <div class="progress-bar progress-bar-teal" style="width: 6%"></div>
	                                </div>
	                            </td>
							</tr>
							<tr>
								<td>Others</td>
								<td class="text-right">1.6%</td>
								<td class="vam">
									<div class="progress m-n">
	                                  <div class="progress-bar progress-bar-teal" style="width: 3%"></div>
	                                </div>
	                            </td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-teal" data-widget='{"draggable": "false"}'>
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
				<div class="panel-body no-padding">
					<table class="table browsers m-n">
						<tbody>
							<tr>
								<td>Google Chrome</td>
								<td class="text-right">43.7%</td>
								<td class="vam" style="width: 56px;">
									<div class="progress m-n">
	                                  <div class="progress-bar progress-bar-teal" style="width: 100%"></div>
	                                </div>
	                            </td>
							</tr>
							<tr>
								<td>Firefox</td>
								<td class="text-right">20.5%</td>
								<td class="vam">
									<div class="progress m-n">
	                                  <div class="progress-bar progress-bar-teal" style="width: 50%"></div>
	                                </div>
	                            </td>
							</tr>
							<tr>
								<td>Opera</td>
								<td class="text-right">14.6%</td>
								<td class="vam">
									<div class="progress m-n">
	                                  <div class="progress-bar progress-bar-teal" style="width: 40%"></div>
	                                </div>
	                            </td>
							</tr>
							<tr>
								<td>Safari</td>
								<td class="text-right">9.1%</td>
								<td class="vam">
									<div class="progress m-n">
	                                  <div class="progress-bar progress-bar-teal" style="width: 25%"></div>
	                                </div>
	                            </td>
							</tr>
							<tr>
								<td>Internet Explorer</td>
								<td class="text-right">5.3%</td>
								<td class="vam">
									<div class="progress m-n">
	                                  <div class="progress-bar progress-bar-teal" style="width: 12.5%"></div>
	                                </div>
	                            </td>
							</tr>
							<tr>
								<td>Torch</td>
								<td class="text-right">2.9%</td>
								<td class="vam">
									<div class="progress m-n">
	                                  <div class="progress-bar progress-bar-teal" style="width: 9%"></div>
	                                </div>
	                            </td>
							</tr>
							<tr>
								<td>Maxthon</td>
								<td class="text-right">2.3%</td>
								<td class="vam">
									<div class="progress m-n">
	                                  <div class="progress-bar progress-bar-teal" style="width: 6%"></div>
	                                </div>
	                            </td>
							</tr>
							<tr>
								<td>Others</td>
								<td class="text-right">1.6%</td>
								<td class="vam">
									<div class="progress m-n">
	                                  <div class="progress-bar progress-bar-teal" style="width: 3%"></div>
	                                </div>
	                            </td>
							</tr>
						</tbody>
					</table>
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

<script type="text/javascript" src="<?php echo base_url('') ?>assets/demo/demo-index.js"></script> 									<!-- Initialize scripts for this page-->

    <!-- End loading page level scripts-->

    </body>
</html>	