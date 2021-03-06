<?php 
	$cssAnsScriptFilesTheme = array(
		//X-editable
		'/plugins/x-editable/css/bootstrap-editable.css',
		'/plugins/x-editable/js/bootstrap-editable.js' , 

		//DatePicker
		'/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js' ,
		'/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.fr.js' ,
		'/plugins/bootstrap-datepicker/css/datepicker.css',
		
		//DateTime Picker
		'/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js' , 
		'/plugins/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.fr.js' , 
		'/plugins/bootstrap-datetimepicker/css/datetimepicker.css',
		//Wysihtml5
		'/plugins/wysihtml5/bootstrap3-wysihtml5/bootstrap3-wysihtml5.css',
		'/plugins/wysihtml5/bootstrap3-wysihtml5/bootstrap3-wysihtml5-editor.css',
		'/plugins/wysihtml5/bootstrap3-wysihtml5/wysihtml5x-toolbar.min.js',
		'/plugins/wysihtml5/bootstrap3-wysihtml5/bootstrap3-wysihtml5.min.js',
		'/plugins/wysihtml5/wysihtml5.js',
		
		//SELECT2
		'/plugins/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css',
		'/plugins/bootstrap-switch/dist/js/bootstrap-switch.min.js' , 

	);
	//if ($type == Project::COLLECTION)
	//	array_push($cssAnsScriptFilesTheme, "/assets/plugins/Chart.js/Chart.min.js");
	HtmlHelper::registerCssAndScriptsFiles($cssAnsScriptFilesTheme, Yii::app()->request->baseUrl);
	$cssAnsScriptFilesModule = array(
		//Data helper
		'/js/dataHelpers.js',
		'/js/postalCode.js',
		'/js/activityHistory.js',
		'/js/news/index.js',
		'/js/default/editInPlace.js',
	);
	HtmlHelper::registerCssAndScriptsFiles($cssAnsScriptFilesModule, $this->module->assetsUrl);

	$imgDefault = $this->module->assetsUrl.'/images/thumbnail-default.jpg';
	$thumbAuthor =  @$element['profilThumbImageUrl'] ? 
                      Yii::app()->createUrl('/'.@$element['profilThumbImageUrl']) 
                      : "";
?>

<div id="menu-name" class="hidden">
	<img src="<?php echo $thumbAuthor; ?>" height="45" class="img-circle">
	<span class="font-montserrat hidden-sm hidden-xs"><?php echo @$element["name"]; ?></span>
</div>

<ul id="accordion" class="accordion shadow2">
		    <li>
				<div class="iamgurdeep-pic">
					<img class="img-responsive" alt="" 
						 src="<?php echo @$element['profilMediumImageUrl'] ? Yii::app()->createUrl('/'.@$element['profilMediumImageUrl']) : $imgDefault; ?>">
					<div class="edit-pic">
						<a href="https://web.facebook.com/" target="_blank" class="fa fa-facebook"></a>
						<a href="https://www.instagram.com/gurdeeposahan/" target="_blank" class="fa fa-instagram"></a>
						<a href="https://twitter.com/gurdeeposahan1" target="_blank" class="fa fa-twitter"></a>
						<a href="https://plus.google.com/u/0/105032594920038016998" target="_blank" class="fa fa-google"></a>
					</div>
					<div class="username">
					    <h2 class="text-left">
						    <?php //echo @$element["name"]; ?><!-- <br> -->
						    <small>
						    	<?php if(@$element["address"] && @$element["address"]["addressLocality"]) {
		                				echo "<i class='fa fa-university'></i> ".$element["address"]["addressLocality"];
		                				if(@$element["address"]["postalCode"]) echo ", ";
		                			  }
		                			  if(@$element["address"] && @$element["address"]["postalCode"]) 
		                			  	echo $element["address"]["postalCode"];
		                		?>
		                	</small>
	                	</h2>
					    <!-- <p><i class="fa fa-briefcase"></i> Web Design and Development.</p> -->
					    
					    <a href="https://web.facebook.com/" target="_blank" class="btn-o"> <i class="fa fa-chain"></i> Suivre </a>
					    <a href="https://www.instagram.com/gurdeeposahan/" target="_blank"  class="btn-o"> <i class="fa fa-star"></i> Favoris </a>
					    
					    
					     <ul class="nav navbar-nav pull-right">
					        <li class="dropdown">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-ellipsis-v pull-left"></span></a>
					          <ul class="dropdown-menu pull-right">
					            <li><a href="#">Video Call <i class="fa fa-video-camera"></i></a></li>
					            <li><a href="#">Poke <i class="fa fa-hand-o-right"></i></a></li>
					            <li><a href="#">Report <i class="fa fa-bug"></i></a></li>
					            <li><a href="#">Block <i class="fa fa-lock"></i></a></li>
					          </ul>
					        </li>
					      </ul>
					   
					</div>
				    
				</div>
		        
		    </li>
			<li class="editable">
				<div class="link"><i class="fa fa-globe"></i>A propos<i class="fa fa-chevron-down"></i></div>
				<ul class="submenu">


					<?php if(@$edit==true){ ?>
							<li class="tooltips editElementDetail" data-edit-id="name" 
								data-toggle="tooltip" data-placement="right" title="cliquer pour modifier">

								<i class="fa fa-user-circle-o fa_name"></i> <?php echo Yii::t("common","Name"); ?> : 
								<a href="javascript:" id="name" data-type="text" 
									data-title="<?php echo Yii::t("person","Enter your name"); ?>" 
									data-emptytext="<?php echo Yii::t("person","Enter your name"); ?>" class="editable-context editable editable-click">

									<?php if(isset($element["name"])) echo $element["name"]; else echo ""; ?>

									<?php 
									// function clean($string) {
									//    $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
									//    $string = str_replace('-', '', $string); // Replaces all spaces with hyphens.

									//    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
									// }
									// echo clean("Jean-MichelL@p#'(ez");
									?>
								</a>
							</li>
					<?php } ?>

					<?php if(@$edit==true){ ?>
							<li class="tooltips editElementDetail" data-edit-id="username" 
								data-toggle="tooltip" data-placement="right" title="cliquer pour modifier">

								<i class="fa fa-user-secret fa_username"></i> <?php echo Yii::t("common","Username"); ?> : 
								<a href="javascript:" id="username" data-type="text" 
									data-title="<?php echo Yii::t("person","Enter your username"); ?>" 
									data-emptytext="<?php echo Yii::t("person","Enter your username"); ?>" class="editable-context editable editable-click">

									<?php if(isset($element["username"])) echo $element["username"]; else echo ""; ?>
								</a>
							</li>
					<?php } ?>

					<?php if($type==Person::COLLECTION){
						if(Preference::showPreference($element, $type, "birthDate", Yii::app()->session["userId"])){ ?>
							<li class="tooltips editElementDetail" data-edit-id="birthDate" 
								<?php if(@$edit==true){ ?>
								data-toggle="tooltip" data-placement="right" title="cliquer pour modifier"
								<?php } ?>>

								<i class="fa fa-birthday-cake fa_birthDate"></i> <?php echo Yii::t("person","Birth date"); ?> : 
								<a href="javascript:" id="birthDate" data-type="date" 
									data-title="<?php echo Yii::t("person","Birth date"); ?>" 
									data-emptytext="<?php echo Yii::t("person","Birth date"); ?>" class="editable editable-click">

									<?php echo (isset($element["birthDate"])) ? date("d/m/Y", strtotime($element["birthDate"]))  : null; ?>
								</a>
							</li>
						<?php }
					} ?>

					<?php 	if(($type==Person::COLLECTION && Preference::showPreference($element, $type, "email", Yii::app()->session["userId"])) || 
								($type!=Person::COLLECTION && $type!=Event::COLLECTION)){ ?>
								<li class="tooltips editElementDetail" data-edit-id="email" 
									<?php if(@$edit==true){ ?>
									data-toggle="tooltip" data-placement="right" title="cliquer pour modifier"
									<?php } ?>>

									<i class="fa fa-envelop fa_birthDate"></i> E-mail : 
									<a href="javascript:" id="email" data-type="text" 
										data-title="E-mail" 
										data-emptytext="E-mail" class="editable-context editable editable-click required">

										<?php echo (isset($element["email"])) ? $element["email"] : ""; ?>
									</a>
								</li>
					<?php } ?>
					

					
					<?php  if($type==Organization::COLLECTION || $type==Person::COLLECTION){ ?>
								<li class="tooltips editElementDetail" data-edit-id="phone" 
									<?php if(@$edit==true){ ?>
									data-toggle="tooltip" data-placement="right" title="cliquer pour modifier"
									<?php } ?>>

									<i class="fa fa-phone"></i> Téléphone : 
									<a href="javascript:" id="fixe" data-type="text" 
										data-title="<?php echo Yii::t("person","Phone"); ?>" 
										data-emptytext="<?php echo Yii::t("person","Phone"); ?>" class="telephone editable editable-click">

										<?php 	if(isset($element["telephone"]["fixe"])){
													foreach ($element["telephone"]["fixe"] as $key => $tel) {
														if($key > 0)
															echo ", ";
														echo $tel;
													}
												}
											?>
									</a>
								</li>
					<?php } ?>
					
					
				</ul>
			</li>
			<li class="editable">
				<div class="link"><i class="fa fa-map-marker"></i>Addresse(s)<i class="fa fa-chevron-down"></i></div>
				<ul class="submenu">
					<li>
						<a href="#">Addresse : 
						<?php if(@$element["address"] && @$element["address"]["addressLocality"]) {
                				echo "<i class='fa fa-university'></i> ".$element["address"]["addressLocality"];
                				if(@$element["address"]["postalCode"]) echo ", ";
                			  }
                			  if(@$element["address"] && @$element["address"]["postalCode"]) 
                			  	echo $element["address"]["postalCode"];
                		?>
						</a>
					</li>
				</ul>
			</li>
			<li>
				<div class="link"><i class="fa fa-picture-o"></i>Photos <small>(16)</small><i class="fa fa-chevron-down"></i></div>
				<ul class="submenu">
					<li class="photosgurdeep"><a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
					</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	    			</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	    			</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	    			</a>
	               
	                <a class="view-all" href="https://web.facebook.com/" target="_blank" >15+
	        		</a>
	    			    
					</li>
				</ul>
			</li>
			<li><div class="link"><i class="fa fa-star"></i>Favoris <small>(14)</small><i class="fa fa-chevron-down"></i></div>
				<ul class="submenu">
	    			<li class="photosgurdeep"><a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
					</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	    			</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	    			</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	    			</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	        		</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	    			</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	    			</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	        		</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	    			</a>
	               
	                <a class="view-all" href="https://web.facebook.com/" target="_blank">50+
	        		</a>
	    			    
					</li>
				</ul>
			</li>

			<li><div class="link"><i class="fa fa-user-circle"></i>Contacts <small>(24)</small><i class="fa fa-chevron-down"></i></div>
				<ul class="submenu">
	    			<li class="photosgurdeep"><a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
					</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	    			</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	    			</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	    			</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	        		</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	    			</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	    			</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	        		</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	    			</a>
	               
	                <a class="view-all" href="https://web.facebook.com/" target="_blank">50+
	        		</a>
	    			    
					</li>
				</ul>
			</li>

			<li><div class="link"><i class="fa fa-users"></i>Organisations <small>(12)</small><i class="fa fa-chevron-down"></i></div>
				<ul class="submenu">
	    			<li class="photosgurdeep"><a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
					</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	    			</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	    			</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	    			</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">               
	    			</a>
	               
	                <a class="view-all" href="https://web.facebook.com/" target="_blank">50+
	        		</a>
	    			    
					</li>
				</ul>
			</li>

			<li><div class="link"><i class="fa fa-lightbulb-o"></i>Projets <small>(4)</small><i class="fa fa-chevron-down"></i></div>
				<ul class="submenu">
	    			<li class="photosgurdeep"><a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
					</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	    			</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	    			</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	    			</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	        		</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	    			</a>
	               
	                <a class="view-all" href="https://web.facebook.com/" target="_blank">50+
	        		</a>
	    			    
					</li>
				</ul>
			</li>

			<li><div class="link"><i class="fa fa-lightbulb-o"></i>Événements <small>(3)</small><i class="fa fa-chevron-down"></i></div>
				<ul class="submenu">
	    			<li class="photosgurdeep"><a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
					</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	    			</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	    			</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	    			</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	        		</a>
	                <a href="#"><img class="img-responsive img-circle " alt="" src="<?php echo $thumbAuthor; ?>">                 
	    			</a>
	               
	                <a class="view-all" href="https://web.facebook.com/" target="_blank">50+
	        		</a>
	    			    
					</li>
				</ul>
			</li>

		</ul>

<?php 
	$element["type"] = $type;
	$element["id"] = (string)$element["_id"];
?>
<script type="text/javascript">

	var elementName = "<?php echo @$element["name"]; ?>";
    var contextType = "<?php echo @$type; ?>";
    
	
	var contextData = <?php echo json_encode($element)?>;
	var showLocality = (( "<?php echo @$showLocality; ?>" == "<?php echo false; ?>")?false:true);
	if(( showLocality == true && "<?php echo Person::COLLECTION; ?>" == contextData.type ) || "<?php echo Person::COLLECTION; ?>" != contextData.type){
		contextData.geo = <?php echo json_encode(@$element["geo"]) ?>;
		contextData.geoPosition = <?php echo json_encode(@$element["geoPosition"]) ?>;
		contextData.address = <?php echo json_encode(@$element["address"]) ?>;
		contextData.addresses = <?php echo json_encode(@$element["addresses"]) ?>;
	}
	//var emptyAddress = ((typeof(contextData.address) == "undefined" || contextData.address == null || typeof(contextData.address.codeInsee) == "undefined" || (typeof(contextData.address.codeInsee) != "undefined" && contextData.address.codeInsee == ""))?true:false);
	var emptyAddress = (( "<?php echo @$emptyAddress; ?>" == "<?php echo false; ?>")?false:true);

	var mode = "view";
	var types = <?php echo json_encode(@$elementTypes) ?>;
	var countries = <?php echo json_encode($countries) ?>;
	var startDate = '<?php if(isset($element["startDate"])) echo $element["startDate"]; else echo ""; ?>';
	var endDate = '<?php if(isset($element["endDate"])) echo $element["endDate"]; else echo "" ?>';
	var allDay = '<?php echo (@$element["allDay"] == true) ? "true" : "false"; ?>';
	var edit = '<?php echo (@$edit == true) ? "true" : "false"; ?>';
	var modeEdit = '<?php echo (@$modeEdit == true) ? "true" : "false"; ?>';
	var birthDate = '<?php echo (isset($person["birthDate"])) ? $person["birthDate"] : null; ?>';
	var NGOCategoriesList = <?php echo json_encode(@$NGOCategories) ?>;
	var localBusinessCategoriesList = <?php echo json_encode(@$localBusinessCategories) ?>;
	var seePreferences = '<?php echo (@$element["seePreferences"] == true) ? "true" : "false"; ?>';
	var color = '<?php echo Element::getColorIcon($type); ?>';
	var icon = '<?php echo Element::getFaIcon($type); ?>';
	var speudoTelegram = '<?php echo @$element["socialNetwork"]["telegram"]; ?>';
	var organizer = <?php echo json_encode(@$organizer) ?>;
	var tags = <?php echo json_encode($tags)?>;

	var tags2 = <?php echo (isset($element["tags"])) ? json_encode(implode(",", $element["tags"])) : "''"; ?>;
		
	var mobile 	 = <?php echo (isset($element["telephone"]["mobile"])) 	? json_encode(implode(",", $element["telephone"]["mobile"])) : "''"; ?>;
	var fax 	 = <?php echo (isset($element["telephone"]["fax"])) 	? json_encode(implode(",", $element["telephone"]["fax"])) : "''"; ?>;
	var fixe 	 = <?php echo (isset($element["telephone"]["fixe"])) 	? json_encode(implode(",", $element["telephone"]["fixe"])) : "''"; ?>;
	var category = <?php echo (isset($element["category"])) 			? json_encode(implode(",", $element["category"])) : "''"; ?>;
	var description = <?php echo (isset($element["description"])) ? json_encode($element["description"]) : "''"; ?>;

	var TYPE_NGO = "<?php echo Organization::TYPE_NGO ?>";
	var TYPE_BUSINESS = "<?php echo Organization::TYPE_BUSINESS ?>";
	var EVENT_COLLECTION = "<?php echo Event::COLLECTION ?>";

	

	//var contentKeyBase = "<?php echo isset($contentKeyBase) ? $contentKeyBase : ""; ?>";
	//By default : view mode
	//var images = <?php //echo json_encode(@$images) ?>;
	
	//var publics = <?php //echo json_encode(@$publics) ?>;
	var isEditing = false;
	
	jQuery(document).ready(function() {
		activateEditableContext();
		manageAllDayElement(allDay);
		manageModeContextElement();
		changeHiddenIconeElement(true);
		manageDivEditElement();
		bindAboutPodElement();
		//favorite.applyColor(contextData.type,contextData.id);

		//loadNewsStream();

		$("#small_profil").html($("#menu-name").html());
		$("#menu-name").html("");

		/*CHANGED*/
		$(".editElementDetail").off();
		$(".editElementDetail, .editElementDetail a.editable-click").on("click", function(e){
				//switchModeElement();
				var id = $(this).data("edit-id");
				console.log("found id", id, isEditing);
				
				e.preventDefault();
				if(isEditing==false){
					isEditing = true;
					setTimeout(function(){
						$("#"+id).trigger("click");
						isEditing = false;
						console.log("trigger");
					}, 200);
				}
		});


		//console.log("EDIT", edit);
		if(edit == "true") {
			switchModeElement();
		}
		/*$("#btn-update-geopos").click(function(){
			findGeoPosByAddress();
		});

		$("#btn-update-locality").click(function(){
			Sig.showMapElements(Sig.map, mapData);
		});*/

		if(!emptyAddress)
			$("#btn-view-map").removeClass('hidden');

		$("#btn-update-geopos").off().on( "click", function(){
			updateLocalityEntities();
		});

		$("#btn-add-geopos").off().on( "click", function(){
			updateLocalityEntities();
		});

		$("#btn-update-organizer").off().on( "click", function(){
			updateOrganizer();
		});
		$("#btn-add-organizer").off().on( "click", function(){
			updateOrganizer();
		});

		$("#btn-remove-geopos").off().on( "click", function(){
			var msg = "<?php echo Yii::t('common','Are you sure you want to delete the locality') ;?>" ;
			if(contextData.type == "<?php echo Person::COLLECTION; ?>")
				msg = "<?php echo Yii::t('common',"Are you sure you want to delete the locality ? You can't vote anymore in the citizen council of your city."); ?> ";

			bootbox.confirm({
				message: msg + "<span class='text-red'></span>",
				buttons: {
					confirm: {
						label: "<?php echo Yii::t('common','Yes');?>",
						className: 'btn-success'
					},
					cancel: {
						label: "<?php echo Yii::t('common','No');?>",
						className: 'btn-danger'
					}
				},
				callback: function (result) {
					if (!result) {
						return;
					} else {
						param = new Object;
				    	param.name = "locality";
				    	param.value = "";
				    	param.pk = contextData.id;
						$.ajax({
					        type: "POST",
					        url: baseUrl+"/"+moduleId+"/element/updatefields/type/"+contextType,
					        data: param,
					       	dataType: "json",
					    	success: function(data){
						    	//
						    	if(data.result){
									if(contextData.type == "<?php echo Person::COLLECTION ;?>"){
										//Menu Left
										$("#btn-geoloc-auto-menu").attr("href", "javascript:");
										$('#btn-geoloc-auto-menu > span.lbl-btn-menu').html("Communectez-vous");
										$("#btn-geoloc-auto-menu").attr("onclick", "communecterUser()");
										$("#btn-geoloc-auto-menu").off().removeClass("lbh");
										//Dashbord
										$("#btn-menuSmall-mycity").attr("href", "javascript:");
										$("#btn-menuSmall-citizenCouncil").attr("href", "javascript:");
										//Multiscope
										$(".msg-scope-co").html("<i class='fa fa-cogs'></i> Paramétrer mon code postal</a>");
										//MenuSmall
										$(".hide-communected").show();
										$(".visible-communected").hide();
									}
									toastr.success(data.msg);
									loadByHash("#"+contextData.controller+".detail.id."+contextData.id);
						    	}
						    }
						});
					}
				}
			});	

		});

		

		$("#btn-update-geopos-admin").click(function(){
			findGeoPosByAddress();
		});

		$("#btn-view-map").click(function(){
			showMap(true);
		});

		//console.log("contextDatacontextData", contextData, contextData.type,contextData.id);
		//buildQRCode(contextData.type,contextData.id.$id);

		$(".toggle-tag-dropdown").click(function(){ mylog.log("toogle");
			if(!$("#dropdown-content-multi-tag").hasClass('open'))
			setTimeout(function(){ $("#dropdown-content-multi-tag").addClass('open'); }, 300);
			$("#dropdown-content-multi-tag").addClass('open');
		});
		$(".toggle-scope-dropdown").click(function(){ mylog.log("toogle");
			if(!$("#dropdown-content-multi-scope").hasClass('open'))
			setTimeout(function(){ $("#dropdown-content-multi-scope").addClass('open'); }, 300);
		});

		if(emptyAddress){
			$(".cobtn,.whycobtn").removeClass("hidden");
			$(".cobtn").click(function () { 
				updateLocalityEntities();
			});
			mylog.log("modeEdit",modeEdit);
			if(modeEdit == "true"){
				switchModeElement();
			}
		}
	});


</script>
