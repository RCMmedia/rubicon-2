<div class="overlay-bg"></div>
	
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
	
	$(document).ready(function(){
		$('.logo img:nth-child(2)').hide();
    $(window).scroll(function(){
        if ($(window).scrollTop() > 0){
					$('.logo img:nth-child(1)').fadeOut(function(){
						$('.logo img:nth-child(2)').fadeIn();
					});
					//$('.logo img:nth-child(2)').hide();
        } else {
	        $('.logo img:nth-child(2)').fadeOut(function(){
						$('.logo img:nth-child(1)').fadeIn();
					}); 
					//$('.logo img:nth-child(1)').hide();
        }
    });
});


$('#submit_button').click(function () {
	var url = 'http://localhost/rubicon-vue/gravityformsapi/forms/1/submissions';
	submitForm( url );
});
var $sending = $('.sending');
var $results = $('.results');

function submitForm(url){

	var inputValues = {
	    input_1: $('#input_1').val(),
	    input_2: $('#input_2').val()

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



$('.menu-icon').click(function () {
	$(this).toggleClass('open');
	$(this).parent().toggleClass('active');
	$('.menu').toggleClass('active');
	$('.overlay-bg').toggleClass('active');	
});

$('.menu a').click(function () {
	$('.menu-icon').removeClass('open');
	$('.menu-icon').parent().removeClass('active');
	$('.menu').removeClass('active');
	$('.overlay-bg').removeClass('active');
});

</script>
</body>
</html>