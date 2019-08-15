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
</ul>