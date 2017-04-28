<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<h1><?php echo _("Set CID")?></h1>
<?php if (!empty($usage_list)):?>
			<div class="panel panel-default fpbx-usageinfo">
				<div class="panel-heading">
					<?php echo $usage_list['text']?>
				</div>
				<div class="panel-body">
					<?php echo $usage_list['tooltip']?>
				</div>
			</div>

<?php endif?>
			<div class="fpbx-container">
				<?php echo $content?>
			</div>
		</div>
	</div>
</div>
