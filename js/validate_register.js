$(document).ready(function() {

	var control_name = false;
	var control_email = false;
	var control_password = false;

	var nombre = "";
	var email = "";
	var password = "";

	$("#nameError").hide();
	$("#mailError").hide();
	$("#passError").hide();



	$("#entryName").focusout(function() {

		checkName();

	});


	$("#entryMail").focusout(function() {

		chekEmail();

	});

	$("#entryContra").focusout(function() {

		chekPassword();

	});




	$("#btn_submit").click(function() {

		if (control_name == true && control_email == true && control_password == true)
		{
			$.ajax({
				url: "php/validate_register.php",
				method: "POST",
				data:{email:email,password:password,nombre:nombre},
				cache : "false",
				beforeSend:function() {
					$("#btn_submit").val("Registrando...");
				},
				success:function(data) {
					if(data  == "1")
					{
						$("#btn_submit").val("REGISTER");
						$("#text_message").html("<br><div class='alert alert.dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong><p style='font-size:16px;'>¡Error!</strong> Email or user already exists.</p></div>");
					}
					else if (data == "2")
					{
						$(location).attr("href","dashboard.php");
					}

				}

			});
		}
		else
		{
			
		}

	});


	function checkName()
	{
		nombre = $("#entryName").val().length;
		if (nombre < 4)
		{	
			control_name = false;
			$("#nameError").html("Minimum 4 characters.");
			$("#nameError").show();
				
		}
		else
		{
			nombre = $("#entryName").val();
			control_name = true;
			$("#nameError").hide();
		}
	}


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