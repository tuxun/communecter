<div class="row">
	<div class ="col-lg-4 col-md-12">			
		<?php 
			 $this->renderPartial('../pod/sliderPhoto', array("itemId" => (string)$project["_id"], "type" => PHType::TYPE_PROJECTS));
		?>
	</div>	
	<div class="col-lg-4 col-md-12">
		<?php 
			$this->renderPartial('dashboard/description',array( "project" => $project)); ?>
	</div>
	<div class ="col-lg-4 col-md-12">
		 <?php $this->renderPartial('dashboard/contributors',array( "contributors" => $contributors, "organizationTypes" => $organizationTypes, "project" => $project)); ?>
	</div>
	<div class ="col-lg-4 col-md-12">
		 <?php $this->renderPartial('dashboard/projectChart',array( "properties" => $properties)); ?>
	</div>
</div>
<script type="text/javascript">
	var contextMap = {};
	contextMap["project"] = <?php echo json_encode($project)?>;
	contextMap["people"] = <?php echo json_encode($people) ?>;
	contextMap["organizations"] = <?php echo json_encode($organizations) ?>;
	var images = <?php echo json_encode($images) ?>;
	var contentKeyBase = "<?php echo $contentKeyBase ?>";

</script>