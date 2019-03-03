$(document).ready(function() {
	$("#btn_submit").click(function() {

		var email = $('#entryEmail').val();
		var password = $('#entryPassword').val();

		if ($.trim(email).length > 0 && $.trim(password).length > 0)
		{	
			$.ajax({
				url: "php/validate_login.php",
				method: "POST",
				data:{email:email, password:password},
				cache: "false",
				beforeSend:function() {
					$("#btn_submit").val("Connecting...");
				},
				success:function(data) {
					$("#btn_submit").val("LOGIN");
					if (data == "001")
					{
						$(location).attr("href","dashboard.php");
					}
					else if (data == "002")
					{
						$("#invalidCredentials").html("<br><div class='alert alert.dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong><p style='font-size:16px;'>¡Error!</strong> Check your username and password</p></div>");
					}
				}
			});
		};
	});
});