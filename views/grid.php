<div class="panel panel-info">
	<div class="panel-heading">
		<div class="panel-title">
			<a href="#" data-toggle="collapse" data-target="#moreinfo"><i class="glyphicon glyphicon-info-sign"></i></a>&nbsp;&nbsp;&nbsp;<?php echo _('What is Set CID?')?></div>
	</div>
	<!--At some point we can probably kill this... Maybe make is a 1 time panel that may be dismissed-->
	<div class="panel-body collapse" id="moreinfo">
		<p><?php echo _('Adds the ability to change the CallerID within a call flow.')?></p>
	</div>
</div>
<div id="toolbar-all">
	<a href="?display=setcid&amp;view=form" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo _('Add')?></a>
	<button id="remove-all" class="btn btn-danger btn-remove" data-type="extensions" disabled data-section="all">
		<i class="glyphicon glyphicon-remove"></i> <span><?php echo _('Delete')?></span>
	</button>
</div>
<table id="mygrid" data-url="ajax.php?module=setcid&amp;command=getable" data-cache="false" data-toolbar="#toolbar-all" data-maintain-selected="true" data-show-columns="true" data-show-toggle="true" data-toggle="table" data-pagination="true" data-search="true" class="table table-striped">
	<thead>
		<tr>
			<th data-field="cid_id"><?php echo _("ID")?></th>
			<th data-field="description"><?php echo _("Description")?></th>
			<th data-field="actions"><?php echo _("Actions")?></th>
		</tr>
	</thead>
</table>
