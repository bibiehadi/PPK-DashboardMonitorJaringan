<table class="table">
	<tbody>
		<?php foreach (array_reverse($resources) as $resource) { ?>
		<tr>
			<td><? echo $resource['identity'] ?></td>
			<td class="text-right"><? echo $resource['memory-load']; ?> %</td>
			<td class="vam" style="width: 56px;">
				<div class="progress m-n">
                  <div class="progress-bar progress-bar-teal" style="width: <?echo $resource['memory-load']; ?>%"></div>
                </div>
            </td>
		</tr>
		<? } ?>
	</tbody>
</table>