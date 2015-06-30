<?php 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile(Yii::app()->theme->baseUrl. '/assets/plugins/jquery-validation/dist/jquery.validate.min.js' , CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->theme->baseUrl. '/assets/plugins/okvideo/okvideo.min.js' , CClientScript::POS_END);

//Data helper
$cs->registerScriptFile($this->module->assetsUrl. '/js/dataHelpers.js' , CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->theme->baseUrl. '/assets/plugins/okvideo/okvideo.min.js' , CClientScript::POS_END);

?>

<div class="pull-right" style="padding:20px;">
	<a href="#" onclick="showMenu()">
		<i class="menuBtn fa fa-bars fa-3x text-white "></i>
	</a>
</div>
<script type="text/javascript">
	var  activePanel = "box-login";
	var  bgcolorClass = "bgblack";

	function showMenu(box){
		$("body.login").removeClass("bgred bggreen bgblack bgblue");
		if($(".menuBtn").hasClass("fa-times"))
		{
			$(".menuBtn").removeClass("fa-times").addClass("fa-bars");
			console.log("showMenu",box, bgcolorClass );

			$("body.login").removeClass("bgred bggreen bgblack bgblue");
			if( !box || box == "box-login" || box == "box-forget" || box == "box-register" ){
				$(".byPHRight").fadeIn();
				$("body.login").addClass("bgCity");
				bgcolorClass = "bgCity";
			}
			else{
				bgcolorClass = "bgblack";
				if(box == "box-whatisit" || box == "box-when" )
					bgcolorClass = "bgred";
				else if(box == "box-why" || box == "box-how" )
					bgcolorClass = "bggreen";
				else if(box == "box-4who" || box == "box-where" )
					bgcolorClass = "bgblue";
					
				$("body.login").removeClass("bgCity").addClass(bgcolorClass);
			}

			if(!box)
				box = "box-login";
			$('.box-menu').slideUp();
			$('.'+box).show().addClass("animated bounceInRight").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				$(this).show().removeClass("animated bounceInRight");
			});
			activePanel = box;
		}
		else 
		{
			//$("body.login").removeClass(bgcolorClass).addClass("bgCity");
			console.log("open showMenu",box, bgcolorClass );

			$("body.login").removeClass("bgred bggreen bgblack bgblue");

			$("body.login").removeClass("bgCity").addClass(bgcolorClass);
			$(".menuBtn").removeClass("fa-bars").addClass("fa-times");
			$('.'+activePanel).hide();
			$('.box-menu').slideDown();
			$(".byPHRight").fadeOut();
		}
	}

	function showVideo(id) { 
		$(".menuBtn").removeClass("fa-times").addClass("fa-bars");
		$("body.login").removeClass("bgred bggreen bgblack bgblue");
		$('.box-menu').slideUp();
		$.okvideo({ source: id,
                    volume: 0,
                    loop: false,
                    //hd:true,
                    //adproof: true,
                    //annotations: false,
                    onFinished: function() { showMenu("box-login") },
                    /*unstarted: function() { console.log('unstarted') },
                    onReady: function() { console.log('onready') },
                    onPlay: function() { console.log('onplay') },
                    onPause: function() { console.log('pause') },
                    buffering: function() { console.log('buffering') },
                    cued: function() { console.log('cued') },*/
                 });
	}
	var titleMapIndex = 1;
	var titleMap = [
		{titleRed:"CO",titleWhite:"MMU",titleWhite2:"NECTER",subTitle:"Se connecter à sa commune"},
		{titleRed:"COMMUNE",titleWhite:"CTER",subTitle:"Se connecter à sa commune"},
		{titleRed:"CO",titleWhite:"MMUNECTER",subTitle:"Coopérer et Collaborer"},
		{titleRed:"COMM",titleWhite:"UNECTER",subTitle:"Communiquons mieux localement"},
		{titleRed:"COMMU",titleWhite:"NECTER",subTitle:"Une communauté qui travail ensemble"},
		{titleRed:"COMMUN",titleWhite:"ECTER",subTitle:"Pour le bien commun"},
		{titleRed:"COMMUNE",titleWhite:"CTER",subTitle:"Pour améliorer la ville 2.2.main"}
		
	];
	function titleAnim () 
	{ 
		setTimeout(function()
		{
			console.log("titleAnim",titleMapIndex);
			var map = titleMap[titleMapIndex];
			$(".titleRed").html(map.titleRed);
			$(".titleWhite").html(map.titleWhite);
			if(map.titleWhite2){
				$(".titleWhite2").html(map.titleWhite2);
				//toggleTitle ();
			}
			else
				$(".titleWhite2").html("");
			$(".subTitle").html(map.subTitle);
			$('.loaderDots').html("");
			titleMapIndex = ( titleMapIndex == titleMap.length-1 ) ? 0 : titleMapIndex+1;
			titleAnim ();
		},3000);
	}
	function loaderPoints () { 
		/*setTimeout(function(){
			$('.loaderDots').html($('.loaderDots').html()+".");	
			loaderPoints ();
		},800)*/
	}
	/*var toggleTitleState = -1;
	function  toggleTitle (state) {

		console.log("toggleTitle",toggleTitleState); 
		setTimeout(function(){

			if(state>0)
			{
				$(".titleRed").html("COMMUNE");
				$(".titleWhite").html("CTER");
				$(".titleWhite2").html("");
			}
			else
			{
				$(".titleRed").html("CO");
				$(".titleWhite").html("MMU");
				$(".titleWhite2").html("NECTER");
			}
			toggleTitleState = -toggleTitleState; 
		},500);
	}*/
</script>

<div class="row">
	<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
	<a class="byPHRight" href="http://pixelhumain.com" target="_blank"><img style="height: 39px;position: absolute;right: -157px;top: 203px;z-index: 2000;" class="pull-right" src="<?php echo $this->module->assetsUrl?>/images/byPH.png"/></a>
		<!-- start: LOGIN BOX -->
		<div class="text-white text-extra-large text-bold center">
			<span class="titleRed text-red homestead" style="font-size:40px">CO</span><span  style="font-size:40px" class="titleWhite homestead">MMU</span><span  style="font-size:40px" class="titleWhite2 text-red homestead">NECTER</span><span style="font-size:40px" class="titleWhite homestead loaderDots"></span>
			
			<div class="subTitle" style="margin-top:-13px;">Se connecter à sa commune.</div>
		</div>
		<div class="box-menu box">
			<ul class="text-white text-bold" style="list-style: none; font-size: 3.1em; margin-top:50px; ">
				<li><i class="fa fa-youtube-play"></i> <a href="#" onclick="showVideo('<?php echo $this->module->assetsUrl?>/images/motion2.mov')"><img  style="height:47px;margin-bottom: 7px;" src="<?php echo $this->module->assetsUrl?>/images/logoSMclean.png"/></a></li>
				<li style="margin-left:50px"><i class="fa fa-share-alt"></i> <a href="#" style="color:white" onclick="showMenu('box-whatisit')">WHAT IS IT</a></li>
				<li style="margin-left:50px"><i class="fa fa-heart"></i> <a href="#" style="color:white" onclick="showMenu('box-why')">WHY</a></li>
				<li style="margin-left:50px"><i class="fa fa-group"></i> <a href="#" style="color:white" onclick="showMenu('box-4who')">FOR WHO</a></li>
				<li style="margin-left:50px"><i class="fa fa-laptop"></i> <a href="#" style="color:white" onclick="showMenu('box-how')">HOW</a></li>
				<li style="margin-left:50px"><i class="fa fa-calendar"></i> <a href="#" style="color:white" onclick="showMenu('box-when')">WHEN</a></li>
				<li style="margin-left:50px">&nbsp;<i class="fa fa-map-marker"></i> <a href="#" style="color:white" onclick="showMenu('box-where')">WHERE</a></li>
				<li style="margin-left:50px"><i class="fa fa-globe"></i> <a href="#" style="color:white" onclick="showMenu('box-login')">CONNECT</a></li>
				<li><i class="fa fa-youtube-play"></i> <a href="#" onclick="showVideo('74212373')"><img style="height: 70px;" src="<?php echo $this->module->assetsUrl?>/images/byPH.png"/></a></li>
			</ul>
		</div>

		<div class="box-whatisit box">
			<a href="<?php echo Yii::app()->createUrl( $this->module->id.'/login' ) ?> "><img  src="<?php echo $this->module->assetsUrl?>/images/logoSMclean.png"/></a>
			<h1><i class="fa fa-share-alt"></i> WHAT IS IT</h1>
			<section>
				a new way to live in society
				<br/> together to make it better
				<br/> It's sociatel network
			</section>
		</div>

		<div class="box-why box">
			<h1><i class="fa fa-heart"></i> WHY</h1>
			<section class="homestead">
				Because We Love you
			</section>
		</div>

		<div class="box-4who box">

			<h1><i class="fa fa-group"></i> FOR WHO</h1>
			<section>
				For the people 
				<br/> by the people 
			</section>
			<h1><i class="fa fa-group"></i> BY WHO</h1>
			<section>
				by builders , architects, thinkers, artists
				connecters, inventors, travellers, makers
			</section>
		</div>

		<div class="box-how box">
			<h1><i class="fa fa-laptop"></i> HOW</h1>
			<section>
				Computer and people 
				<br/>make a good mix 
				<br/> Build Great Things
			</section>
		</div>

		<div class="box-when box">
			<h1><i class="fa fa-calendar"></i> WHEN</h1>
			
			<section>
				If it's not 
				<br/>now it's never
			</section>
		</div>

		<div class="box-where box">
			<h1><i class="fa fa-map-marker"></i> WHERE</h1>
			<section>
				Every where there are people 
				<br/> with ideas
				<br/> motivation to change
			</section>
		</div>

		<div class="box-login box radius-20">

			<form class="form-login" action="" method="POST">
				<img style="width:100%" class="pull-right" src="<?php echo $this->module->assetsUrl?>/images/logoL.jpg"/>
				<br/>
				<?php //echo Yii::app()->session["requestedUrl"]." - ".Yii::app()->request->url; ?>
				<fieldset style="padding-left:70px;padding-right:70px;">
					<div class="form-group">
						<span class="input-icon">		
							<input type="text" class="form-control radius-10" name="email" id="email" placeholder="Email" >
							<i class="fa fa-user"></i> </span>
					</div>
					<div class="form-group form-actions">
						<span class="input-icon">
							<input type="password" class="form-control password"  name="password" id="password" placeholder="Password">
							<i class="fa fa-lock"></i>
							<a class="forgot" href="#">
								I forgot my password
							</a> </span>
					</div>
					<div class="form-actions">
						<div class="errorHandler alert alert-danger no-display">
							<i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
						</div>
						<div class="errorHandler alert alert-danger no-display loginResult">
							<i class="fa fa-remove-sign"></i> Please verify your entries.
						</div>
						<label for="remember" class="checkbox-inline">
							<input type="checkbox" class="grey remember" id="remember" name="remember">
							Keep me signed in
						</label>
						<button type="submit"  data-size="s" data-style="expand-right" style="background-color:#E33551" class="loginBtn ladda-button pull-right">
							<span class="ladda-label">Login</span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
						</button>
					</div>
					<div class="new-account">
						Don't have an account yet?
						<a href="#" class="register">
							Create an account
						</a>
					</div>
				</fieldset>
			</form>
		</div>
		<!-- end: LOGIN BOX -->
		<!-- start: FORGOT BOX -->
		<div class="box-forgot box">
			<form class="form-forgot">
				<img style="width:100%" class="pull-right" src="<?php echo $this->module->assetsUrl?>/images/logoL.jpg"/>
				<br/>
				<fieldset style="padding-left:70px;padding-right:70px;">
					<div class="form-group">
						<span class="input-icon">
							<input type="email" class="form-control" id="email2" placeholder="Email">
							<i class="fa fa-envelope"></i> </span>
					</div>
					<div class="form-actions">
						<div class="errorHandler alert alert-danger no-display">
							<i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
						</div>
						<a class="btn btn-light-grey go-back">
							<i class="fa fa-chevron-circle-left"></i> Log-In
						</a>
						<button type="submit"  data-size="s" data-style="expand-right" style="background-color:#E33551" class="forgotBtn ladda-button pull-right">
							<span class="ladda-label">Submit</span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
						</button>
					</div>
				</fieldset>
			</form>
		</div>
		<!-- end: FORGOT BOX -->
		<!-- start: REGISTER BOX -->
		<div class="box-register box">
			
			<form class="form-register">
				<img style="width:100%" class="pull-right" src="<?php echo $this->module->assetsUrl?>/images/logoL.jpg"/>
				<br/>
				
				<fieldset style="padding-left:70px;padding-right:70px;">
					<div class="form-group">
						<span class="input-icon">
							<input type="text" class="form-control" id="name" name="name" placeholder="Prénom Nom : John Doe">
							<i class="fa fa-user"></i> </span>
					</div>
					<div class="form-group">
						<span class="input-icon">
							<input type="email" class="form-control" id="email3" name="email3" placeholder="Email">
							<i class="fa fa-envelope"></i> </span>
					</div>
					<div class="form-group">
						<span class="input-icon">
							<input type="password" class="form-control" id="password3" name="password3" placeholder="Password">
							<i class="fa fa-lock"></i> </span>
					</div>
					<div class="form-group">
						<span class="input-icon">
							<input type="password" class="form-control" id="passwordAgain" name="passwordAgain" placeholder="Password again">
							<i class="fa fa-lock"></i> </span>
					</div>
					<div class="form-group">
						<span class="input-icon">
							<input type="text" class="form-control" id="cp" name="cp" placeholder="Postal Code">
							<i class="fa fa-home"></i></span>
					</div>
					<div class="form-group" id="cityDiv" style="display: none;">
						<span class="input-icon">
							<select class="selectpicker form-control" id="city" name="city" title='Select your City...'>
							</select>
						</span>
								
					</div>
					<div class="form-group">
						<div>
							<label for="agree" class="checkbox-inline">
								<input type="checkbox" class="grey agree" id="agree" name="agree">
								I agree to the Terms of <a href="#" class="bootbox-spp">Service and Privacy Policy</a>
							</label>
						</div>
					</div>

					<div class="form-actions">
						<div class="errorHandler alert alert-danger no-display registerResult">
							<i class="fa fa-remove-sign"></i> Please verify your entries.
						</div>
						Already have an account?
						<a href="#" class="go-back">
							Log-in
						</a>
						<button type="submit"  data-size="s" data-style="expand-right" style="background-color:#E33551" class="createBtn ladda-button pull-right">
							<span class="ladda-label">Submit</span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
						</button>
					</div>
				</fieldset>
			</form>
			<!-- end: COPYRIGHT -->
		</div>
		<!-- end: REGISTER BOX -->
	</div>
</div>
<script type="text/javascript">

	jQuery(document).ready(function() {

		Main.init();
		Login.init();	
		titleAnim ();	
		loaderPoints ();
	});

var timeout;
var Login = function() {
	"use strict";
	var runBoxToShow = function() {
		var el = $('.box-login');
		if (getParameterByName('box').length) {
			switch(getParameterByName('box')) {
				case "register" :
					el = $('.box-register');
					break;
				case "forgot" :
					el = $('.box-forgot');
					break;
				default :
					el = $('.box-login');
					break;
			}
		}
		el.show().addClass("animated flipInX").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
			$(this).removeClass("animated flipInX");
		});
	};
	var runLoginButtons = function() {
		$('.forgot').on('click', function() {
			$('.box-login').removeClass("animated flipInX").addClass("animated bounceOutRight").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				$(this).hide().removeClass("animated bounceOutRight");

			});
			$('.box-forgot').show().addClass("animated bounceInLeft").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				$(this).show().removeClass("animated bounceInLeft");
			});
			activePanel = "box-forgot";
		});
		$('.register').on('click', function() {
			$('.box-login').removeClass("animated flipInX").addClass("animated bounceOutRight").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				$(this).hide().removeClass("animated bounceOutRight");

			});
			$('.box-register').show().addClass("animated bounceInLeft").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				$(this).show().removeClass("animated bounceInLeft");

			});
			activePanel = "box-register";
		});
		$('.go-back').click(function() {
			var boxToShow;
			if ($('.box-register').is(":visible")) {
				boxToShow = $('.box-register');
				activePanel = "box-register";
			} else {
				boxToShow = $('.box-forgot');
				activePanel = "box-forgot";
			}
			boxToShow.addClass("animated bounceOutLeft").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				boxToShow.hide().removeClass("animated bounceOutLeft");

			});
			$('.box-login').show().addClass("animated bounceInRight").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				$(this).show().removeClass("animated bounceInRight");

			});
		});
	};
	//function to return the querystring parameter with a given name.
	var getParameterByName = function(name) {
		name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
		var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"), results = regex.exec(location.search);
		return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	};
	var runSetDefaultValidation = function() {
		$.validator.setDefaults({
			errorElement : "span", // contain the error msg in a small tag
			errorClass : 'help-block',
			errorPlacement : function(error, element) {// render error placement for each input type
				if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {// for chosen elements, need to insert the error after the chosen container
					error.insertAfter($(element).closest('.form-group').children('div').children().last());
				} else if (element.attr("name") == "card_expiry_mm" || element.attr("name") == "card_expiry_yyyy") {
					error.appendTo($(element).closest('.form-group').children('div'));
				} else {
					error.insertAfter(element);
					// for other inputs, just perform default behavior
				}
			},
			ignore : ':hidden',
			success : function(label, element) {
				label.addClass('help-block valid');
				// mark the current input as valid and display OK icon
				$(element).closest('.form-group').removeClass('has-error');
			},
			highlight : function(element) {
				$(element).closest('.help-block').removeClass('valid');
				// display OK icon
				$(element).closest('.form-group').addClass('has-error');
				// add the Bootstrap error class to the control group
			},
			unhighlight : function(element) {// revert the change done by hightlight
				$(element).closest('.form-group').removeClass('has-error');
				// set error class to the control group
			}
		});
	};
	var runLoginValidator = function() {
		var form = $('.form-login');
		var loginBtn = null;
		Ladda.bind('.loginBtn', {
	        callback: function (instance) {
	            loginBtn = instance;
	        }
	    });
		form.submit(function(e){e.preventDefault() });
		var errorHandler = $('.errorHandler', form);
		
		form.validate({
			rules : {
				email : {
					minlength : 2,
					required : true
				},
				password : {
					minlength : 4,
					required : true
				}
			},
			submitHandler : function(form) {
				errorHandler.hide();
				loginBtn.start();
				var params = { 
				   "email" : $("#email").val() , 
                   "pwd" : $("#password").val()
                };
			      
		    	$.ajax({
		    	  type: "POST",
		    	  url: baseUrl+"/<?php echo $this->module->id?>/person/authenticate",
		    	  data: params,
		    	  success: function(data){
		    		  if(data.result)
		    		  {
		    		  	var url = "<?php echo (isset(Yii::app()->session["requestedUrl"])) ? Yii::app()->session["requestedUrl"] : null; ?>";
		    		  	if(url)
		    		  		window.location.href = url;
		        		else
		        			window.location.reload();
		    		  }
		    		  else {
						$('.loginResult').html(data.msg);
						$('.loginResult').show();
						loginBtn.stop();
		    		  }
		    	  },
		    	  dataType: "json"
		    	});
			    return false; // required to block normal submit since you used ajax
			},
			invalidHandler : function(event, validator) {//display error alert on form submit
				errorHandler.show();
				loginBtn.stop();
			}
		});
	};
	var runForgotValidator = function() {
		var form2 = $('.form-forgot');
		var errorHandler2 = $('.errorHandler', form2);
		var forgotBtn = null;
		Ladda.bind('.forgotBtn', {
	        callback: function (instance) {
	            forgotBtn = instance;
	        }
	    });
		form2.validate({
			rules : {
				email2 : {
					required : true
				}
			},
			submitHandler : function(form) {
				errorHandler2.hide();
				forgotBtn.start();
				var params = { "email" : $("#email2").val()};
		        $.ajax({
		          type: "POST",
		          url: baseUrl+"/<?php echo $this->module->id?>/person/sendemailpwd",
		          data: params,
		          success: function(data){
					if (data.result) {
						alert(data.msg);
			            window.location.reload();
					} else if (data.errId == "UNKNOWN_ACCOUNT_ID") {
						if (confirm(data.msg)) {
							$('.box-forgot').removeClass("animated flipInX").addClass("animated bounceOutRight").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
								$(this).hide().removeClass("animated bounceOutRight");
							});
							$('.box-register').show().addClass("animated bounceInLeft").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
								$(this).show().removeClass("animated bounceInLeft");

							});
						} else {
							window.location.reload();
						}
					}
		          },
		          dataType: "json"
		        });
		        return false;
			},
			invalidHandler : function(event, validator) {//display error alert on form submit
				errorHandler2.show();
				forgotBtn.stop();
			}
		});
	};
	var runRegisterValidator = function() {
		var form3 = $('.form-register');
		var errorHandler3 = $('.errorHandler', form3);
		var createBtn = null;
		Ladda.bind('.createBtn', {
	        callback: function (instance) {
	            createBtn = instance;
	        }
	    });
		form3.validate({
			rules : {
				cp : {
					required : true,
					rangelength : [5, 5],
					validPostalCode : true
				},
				city : {
					required : true,
					minlength : 1
				},
				name : {
					required : true
				},
				email3 : {
					required : true,
					email : true
				},
				password3 : {
					minlength : 8,
					required : true
				},
				passwordAgain : {
					equalTo : "#password3"
				},
				agree : {
					minlength : 1,
					required : true
				}
			},
			messages: {
				agree: "You must validate the CGU to sign up.",
			},
			submitHandler : function(form) {
				errorHandler3.hide();
				createBtn.start();
				var params = { 
				   "name" : $("#name").val(),
				   "email" : $("#email3").val(),
                   "pwd" : $("#password3").val(),
                   "cp" : $("#cp").val(),
                   "app" : "<?php echo $this->module->id?>",
                   "city" : $("#city").val()
                };
			      
		    	$.ajax({
		    	  type: "POST",
		    	  url: baseUrl+"/<?php echo $this->module->id?>/person/register",
		    	  data: params,
		    	  success: function(data){
		    		  if(data.result)
		    		  {
		    		  	$.blockUI({
    		  				message : '<i class="fa fa-spinner fa-spin"></i> Processing... <br/> '+
    		  	            '<blockquote>'+
    		  	              '<p>You will receive an email to validate your account.</p>'+
    		  	              '<cite>Welcome to the Pixel Humain</cite>'+
    		  	            '</blockquote> '
    		  			});
		        		toastr.success(data.msg);
		        		window.location.reload();
		    		  }
		    		  else {
						$('.registerResult').html(data.msg);
						$('.registerResult').show();
						createBtn.stop();
		    		  }
		    	  },
		    	  dataType: "json"
		    	});
			    return false;
			},
			invalidHandler : function(event, validator) {//display error alert on form submit
				errorHandler3.show();
				createBtn.stop();
			}
		});
	};
	return {
		//main function to initiate template pages
		init : function() {
			addCustomValidators();
			runBoxToShow();
			runLoginButtons();
			runSetDefaultValidation();
			runLoginValidator();
			runForgotValidator();
			runRegisterValidator();
			bindPostalCodeAction();
		}
	};
}();

function runShowCity(searchValue) {
	var citiesByPostalCode = getCitiesByPostalCode(searchValue);
	var oneValue = "";
	console.table(citiesByPostalCode);
	$.each(citiesByPostalCode,function(i, value) {
    	$("#city").append('<option value=' + value.value + '>' + value.text + '</option>');
    	oneValue = value.value;
	});
	
	if (citiesByPostalCode.length == 1) {
		$("#city").val(oneValue);
	}

	if (citiesByPostalCode.length >0) {
        $("#cityDiv").slideDown("medium");
      } else {
        $("#cityDiv").slideUp("medium");
      }
}

function bindPostalCodeAction() {
	$('.form-register #cp').change(function(e){
		searchCity();
	});
	$('.form-register #cp').keyup(function(e){
		searchCity();
	});
}

function searchCity() {
	var searchValue = $('.form-register #cp').val();
	if(searchValue.length == 5) {
		$("#city").empty();
		clearTimeout(timeout);
		timeout = setTimeout($("#iconeChargement").css("visibility", "visible"), 100);
		clearTimeout(timeout);
		timeout = setTimeout('runShowCity("'+searchValue+'")', 100); 
	} else {
		$("#cityDiv").slideUp("medium");
		$("#city").val("");
		$("#city").empty();
	}
}

</script>