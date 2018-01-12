<!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />
<style type="text/css">
*, *:before, *:after {-moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;}	
.clearfix:after{content:".";display:block;height:0;clear:both;visibility:hidden}
body {margin:0; padding:0; border:0;}
img  {border:0; }
a 	 {text-decoration: none;outline:none;}
div  {margin:0; padding:0; border:0; vertical-align: baseline;}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
	
<form id="gf_web_api_demo_form">
	<input id="input_1" name="input_1" type="text" placeholder="Name"/><br/>
	<input id="input_2" name="input_2" type="text" placeholder="Email"/><br/>
</form>
<div>
	<button id="submit_button" class="button button-primary button-large">Submit Form</button>
</div>
<div class="sending" style="display: none">
	sending...
</div>

<div class="results">
	
</div>
	
<script>
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
</script>
</body>
</html>
