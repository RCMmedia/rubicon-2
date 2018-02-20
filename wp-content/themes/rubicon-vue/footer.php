<div class="overlay-bg"></div>
<div class="contact-form">
	<div class="inner">
		<div class="close-form">
			<img src="<?php bloginfo('template_url') ?>/images/x-close.png" alt="x-close" width="20" height="20" />
		</div>
		<div>
			<h3>CONTACT US</h3>
			<p>Please fill out the form below and we'll get back to you as soon as possible</p>
		</div>
		<form id="gf_web_api_demo_form">
			<input id="input_2_1" name="input_2_1" type="text" placeholder="First Name"/><br/>
			<input id="input_2_2" name="input_2_2" type="text" placeholder="Last Name"/><br/>
			<input id="input_2_3" name="input_2_3" type="text" placeholder="Email"/><br/>
			<textarea id="input_2_4" name="input_2_4" placeholder="Questions/Comments"></textarea><br/>
		</form>
		<div>
			<button id="submit_button" class="button button-primary button-large">Submit Form</button>
		</div>
		<div class="sending" >
			sending...
		</div>
		
		<div class="results">
		
		</div>
	</div>
</div><!-- contact-form -->
	<?php wp_footer(); ?>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="<?php bloginfo('url') ?>/store-locator/libs/handlebars.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyDyNBeSUduNzvgbZpfZWQltogkvJw1nqiM&region=US"></script>
    <script src="<?php bloginfo('url') ?>/store-locator/plugins/storeLocator/jquery.storelocator.js"></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/vue.js"></script>
<!--     <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/vue-resource.js"></script> -->
		<script src="<?php bloginfo('template_url') ?>/js/axios.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/vue-router.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/app.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/waypoints.js"></script>
<!--     <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/instascan.min.js"></script> -->

    
<script>

/*
	$('.logo img').matchHeight({
		//property: 'height'
	});
*/



	$(document).ready(function(){
		
		//match logo heights
		var rubyLogoHeight = $('#ruby-logo'); 
		$('#dapper-logo').css({ height: rubyLogoHeight.height() });
		
		$('.logo img:nth-child(2)').hide();
    $(window).scroll(function(){
        if ($(window).scrollTop() > 0){
					$('.logo img:nth-child(1)').fadeOut('fast', function(){
						$('.logo img:nth-child(2)').fadeIn('fast');
					});
					
					//$('.logo img:nth-child(1)').hide();
        } else {
	        $('.logo img:nth-child(2)').fadeOut('fast', function(){
						$('.logo img:nth-child(1)').fadeIn('fast');
					}); 
					//$('.logo img:nth-child(2)').hide();
        }
    });
});






$('.menu-icon, .overlay-bg').click(function () {
	$(this).toggleClass('open');
	$(this).parent().toggleClass('active');
	$('.menu').toggleClass('active');
	$('.overlay-bg').toggleClass('active');	
});

$('.menu a, .overlay-bg').click(function () {
	$('.menu-icon').removeClass('open');
	$('.menu-icon').parent().removeClass('active');
	$('.menu').removeClass('active');
	$('.overlay-bg').removeClass('active');
});

$('.fake-select').click(function () {
	$('.fake-select-options').fadeToggle();
});

$('.contact-form-toggle, .close-form').click(function () {
	$('.contact-form').toggleClass('active');
	$('.overlay-bg').toggleClass('active');	
	$('.menu-icon-wrap.contact').toggleClass('active');
	$('.contact .menu-icon').toggleClass('open');
});

//gform submission
$('#submit_button').click(function () {
	var url = 'http://localhost/rubicon-vue/gravityformsapi/forms/2/submissions';
	submitForm( url );
});
var $sending = $('.sending');
var $results = $('.results');

function submitForm(url){

	var inputValues = {
	    input_1: $('#input_2_1').val(),
	    input_2: $('#input_2_2').val(),
	    input_3: $('#input_2_3').val(),
	    input_4: $('#input_2_4').val()
	};

	var data = {
	    input_values: inputValues
	};

	$.ajax({
	    url: url,
	    type: 'POST',
	    data: JSON.stringify(data),
	    beforeSend: function (xhr, opts) {
	        $sending.show();
	    }
	})
	.done(function (data, textStatus, xhr) {
	    $sending.hide();
	    var response = JSON.stringify(data.response.confirmation_message, null, '\t');
	    $results.html(response.replace(/\"/g, ""));
	})
}


</script>
</body>
</html>