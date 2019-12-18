$(document).ready(function() {

	var control_email = false;
	var control_password = false;

	var email = "";
	var password = "";

	$("#mailError").hide();
	$("#passError").hide();



	$("#entryMail").focusout(function() {

		chekEmail();

	});

	$("#entryContra").focusout(function() {

		chekPassword();

	});




	$("#btn_submit").click(function() {

		if (control_email == true && control_password == true)
		{
			$.ajax({
				url: "php/validate_register.php",
				method: "POST",
				data:{email:email,password:password},
				cache : "false",
				beforeSend:function() {
					$("#btn_submit").val("Registering...");
				},
				success:function(data) {
					if(data  == "1")
					{
						$("#btn_submit").val("REGISTER");
						$("#text_message").html("<br><div class='alert alert.dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong><p style='font-size:16px;'>¡Error!</strong> Email or user already exists.</p></div>");
					}
					else if (data == "2")
					{
						$(location).attr("href","main.php");
					}

				}

			});
		}
		else
		{
			
		}

	});


	function chekEmail()
	{
		var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[+a-zA-Z0-9._-]+\.[a-zA-Z]{2,4}$/i);
		email = $("#entryMail").val();
		if (pattern.test(email))
		{	
			$("#mailError").hide();
			control_email = true;
		}
		else
		{
			control_email = false;
			$("#mailError").html("Incorrect email format.");
			$("#mailError").show();
			
		}
	}

	function chekPassword()
	{

		password = $("#entryContra").val().length;

		if (password < 8)
		{
			$("#passError").html("At least 8 characters.");
			$("#passError").show();
			control_password = false;	
		}
		else
		{
			password = $("#entryContra").val();
			$("#passError").hide();
			control_password = true;
		}

	}


});