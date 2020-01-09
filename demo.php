<?php
if(isset($_POST['check']))
{
	if($_POST['new_captcha'] != $_POST['captcha']){
		echo '<script>alert("Please enter valid captch..."); var url=window.location; window.location=url;</script>';
		echo $_POST['new_captcha'];		
	}
	
}
?>
<style type="text/css">
.captcha
{
width:60px; 
background-image:url(cat.png); 
font-size:20px; 
border: 1px solid;
}
.color
{
	color:#FF0000;
}


</style>
<!-- HTML Form -->
<form method="post" onsubmit="return validateForm();">
<table width="400px" align="center" bgcolor="#EBEBEB">
<tr>
<td>Name:</td>
<td><input type="text" name="name">
<span id="name" class="color error"></span>
</td>
</tr>

<tr>
<td>&nbsp;</td>

<td>
	<input type="text" value="<?=rand(111111,999999);?>" id="new_captcha" readonly="readonly" class="captcha" style="width:59%" name="new_captcha">
	<input type="button" value="Referesh" onclick="generateCaptch()"/>
</td>
</tr>
<tr>
<td>Enter Captcha</td>
<td><input type="text" name="captcha" id="chk" placeholder="Enter captcha">
<p id="captchaError" class="color error"></p>
</td>
</tr>

<tr>
<td colspan="2" align="center">
<input type="submit" name="check">
</td>
</table>
</form>
<!-- End Form -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">

	$(document).ready(function(){
	  $("input").keypress(function(){
	    $(".error").html('');
	  });
	});		

	$('#chk,#new_captcha').bind("cut copy paste",function(e) {
	  e.preventDefault();
	});

	function generateCaptch(){
	    var a = Math.floor(100000 + Math.random() * 900000);   
	    a = String(a);
	    a = a.substring(0,6);
	    $('#new_captcha').val(a);    
	}

	function validateForm(){
		var new_captcha = $('input[name="new_captcha"]').val();
		var captcha 	= $('input[name="captcha"]').val();
		if(captcha==""){
			$('#captchaError').html('Please enter captcha...');
			return false;
		}
		else if(new_captcha!=captcha){
			$('#captchaError').html('Please enter valid captcha...');
			return false;
		}
		//return false;
	}

</script>
