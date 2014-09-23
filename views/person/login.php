<?php 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile(Yii::app()->theme->baseUrl. '/assets/plugins/jquery-validation/dist/jquery.validate.min.js' , CClientScript::POS_END);
?>
<div class="row">
	<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		<div class="logo">
			<img height="30" src="<?php echo $this->module->assetsUrl?>/images/COMMUNECTION.png"/>
		</div>
		<!-- start: LOGIN BOX -->
		<div class="box-login">
			<img height="80" class="pull-right" src="<?php echo $this->module->assetsUrl?>/images/logo.png"/>
			<h3>Sign in to your account</h3>
			<p>
				Please enter your name and password to log in.
			</p>
			<form class="form-login" action="<?php echo Yii::app()->createUrl("/teeo/person/authenticate")?>" method="POST">
				<div class="errorHandler alert alert-danger no-display">
					<i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
				</div>
				<div class="errorHandler alert alert-danger no-display loginResult">
					<i class="fa fa-remove-sign"></i> Please verify your entries.
				</div>
				<fieldset>
					<div class="form-group">
						<span class="input-icon">
							<input type="text" class="form-control" name="email" id="email" placeholder="Email">
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
						<label for="remember" class="checkbox-inline">
							<input type="checkbox" class="grey remember" id="remember" name="remember">
							Keep me signed in
						</label>
						<button type="submit" class="btn btn-green pull-right">
							Login <i class="fa fa-arrow-circle-right"></i>
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
			<!-- start: COPYRIGHT -->
			<div class="copyright">
				2014  <?php echo (isset($this->projectImage)) ? '<img height="30" src="'.$this->module->assetsUrl.$this->projectImage.'"/>' : "<i class='fa fa-close'>/i>";?>
			</div>
			<!-- end: COPYRIGHT -->
		</div>
		<!-- end: LOGIN BOX -->
		<!-- start: FORGOT BOX -->
		<div class="box-forgot">
			<h3>Forget Password?</h3>
			<p>
				Enter your e-mail address below to get your password by email.
			</p>
			<form class="form-forgot">
				<div class="errorHandler alert alert-danger no-display">
					<i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
				</div>
				<fieldset>
					<div class="form-group">
						<span class="input-icon">
							<input type="email" class="form-control" id="email2" placeholder="Email">
							<i class="fa fa-envelope"></i> </span>
					</div>
					<div class="form-actions">
						<a class="btn btn-light-grey go-back">
							<i class="fa fa-chevron-circle-left"></i> Log-In
						</a>
						<button type="submit" class="btn btn-green pull-right">
							Submit <i class="fa fa-arrow-circle-right"></i>
						</button>
					</div>
				</fieldset>
			</form>
			<!-- start: COPYRIGHT -->
			<div class="copyright">
				2014  <?php echo (isset($this->projectImage)) ? '<img height="30" src="'.$this->module->assetsUrl.$this->projectImage.'"/>' : "<i class='fa fa-close'>/i>";?>
			</div>
			<!-- end: COPYRIGHT -->
		</div>
		<!-- end: FORGOT BOX -->
		<!-- start: REGISTER BOX -->
		<div class="box-register">
			<h3>Sign Up</h3>
			<p>
				Enter your personal details below:
			</p>
			<form class="form-register">
				<div class="errorHandler alert alert-danger no-display">
					<i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
				</div>
				<fieldset>
					<div class="form-group">
						<span class="input-icon">
							<input type="email" class="form-control" id="email3" placeholder="Email">
							<i class="fa fa-envelope"></i> </span>
					</div>
					<div class="form-group">
						<span class="input-icon">
							<input type="password" class="form-control" id="password3" placeholder="Password">
							<i class="fa fa-lock"></i> </span>
					</div>
					<div class="form-group">
						<span class="input-icon">
							<input type="text" class="form-control" id="cp" placeholder="Postal Code">
							<i class="fa fa-home"></i></span>
					</div>
					<div class="form-group">
						<div>
							<label for="agree" class="checkbox-inline">
								<input type="checkbox" class="grey agree" id="agree" name="agree">
								I agree to the Terms of Service and Privacy Policy
							</label>
						</div>
					</div>

					<div class="form-actions">
						Already have an account?
						<a href="#" class="go-back">
							Log-in
						</a>
						<button type="submit" class="btn btn-green pull-right">
							Submit <i class="fa fa-arrow-circle-right"></i>
						</button>
					</div>
				</fieldset>
			</form>
			<!-- start: COPYRIGHT -->
			<div class="copyright">
				2014  <?php echo (isset($this->projectImage)) ? '<img height="30" src="'.$this->module->assetsUrl.$this->projectImage.'"/>' : "<i class='fa fa-close'>/i>";?>
			</div>
			<!-- end: COPYRIGHT -->
		</div>
		<!-- end: REGISTER BOX -->
	</div>
</div>
<script type="text/javascript">
	

	jQuery(document).ready(function() {
		Main.init();
		Login.init();
		
	
	});

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
		});
		$('.register').on('click', function() {
			$('.box-login').removeClass("animated flipInX").addClass("animated bounceOutRight").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				$(this).hide().removeClass("animated bounceOutRight");

			});
			$('.box-register').show().addClass("animated bounceInLeft").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				$(this).show().removeClass("animated bounceInLeft");

			});

		});
		$('.go-back').click(function() {
			var boxToShow;
			if ($('.box-register').is(":visible")) {
				boxToShow = $('.box-register');
			} else {
				boxToShow = $('.box-forgot');
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
		form.submit(function(e){e.preventDefault() });
		var errorHandler = $('.errorHandler', form);
		form.validate({
			rules : {
				username : {
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
				var params = { 
				   "email" : $("#email").val() , 
                   "pwd" : $("#password").val()
                };
			      
		    	$.ajax({
		    	  type: "POST",
		    	  url: baseUrl+"/<?php echo $this->module->id?>/api/login",
		    	  data: params,
		    	  success: function(data){
		    		  if(data.result)
		    		  {
		        		window.location.reload();
		    		  }
		    		  else {
						$('.loginResult').html(data.msg);
						$('.loginResult').show();
		    		  }
		    	  },
		    	  dataType: "json"
		    	});
			    return false; // required to block normal submit since you used ajax
			},
			invalidHandler : function(event, validator) {//display error alert on form submit
				errorHandler.show();
			}
		});
	};
	var runForgotValidator = function() {
		var form2 = $('.form-forgot');
		var errorHandler2 = $('.errorHandler', form2);
		form2.validate({
			rules : {
				email : {
					required : true
				}
			},
			submitHandler : function(form) {
				errorHandler2.hide();
				var params = { "email" : $("#email2").val()};
		        $.ajax({
		          type: "POST",
		          url: baseUrl+"/<?php echo $this->module->id?>/api/sendemailpwd",
		          data: params,
		          success: function(data){
		              alert(data.msg);
		          },
		          dataType: "json"
		        });
		        return false;
			},
			invalidHandler : function(event, validator) {//display error alert on form submit
				errorHandler2.show();
			}
		});
	};
	var runRegisterValidator = function() {
		var form3 = $('.form-register');
		var errorHandler3 = $('.errorHandler', form3);
		form3.validate({
			rules : {
				cp : {
					maxlength : 5,
					required : true
				},
				email : {
					required : true
				},
				password : {
					minlength : 4,
					required : true
				},
				agree : {
					minlength : 1,
					required : true
				}
			},
			submitHandler : function(form) {
				errorHandler3.hide();
				var params = { 
				   "email" : $("#email3").val() , 
                   "pwd" : $("#password3").val(),
                   "cp" : $("#cp").val(),
                };
			      
		    	$.ajax({
		    	  type: "POST",
		    	  url: baseUrl+"/<?php echo $this->module->id?>/api/saveUser",
		    	  data: params,
		    	  success: function(data){
		    		  if(data.result)
		    		  {
		        		window.location.reload();
		    		  }
		    		  else {
						$('.loginResult').html(data.msg);
						$('.loginResult').show();
		    		  }
		    	  },
		    	  dataType: "json"
		    	});
			    return false;
			},
			invalidHandler : function(event, validator) {//display error alert on form submit
				errorHandler3.show();
			}
		});
	};
	return {
		//main function to initiate template pages
		init : function() {
			runBoxToShow();
			runLoginButtons();
			runSetDefaultValidation();
			runLoginValidator();
			runForgotValidator();
			runRegisterValidator();
		}
	};
}();

</script>