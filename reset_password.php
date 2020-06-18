<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="reset_password.css">
	<style type="">
		#msg{
		visibility: hidden;
		min-width: 250px;
		background-color: yellow;
		color: #000;
		text-align: center;
		border-radius: 2px;
		padding: 16px;
		position: fixed;
		z-index: 1;
		right: 30%;
		top: 30%;
		font-size: 17px;
		margin-right: 30px;

	}
	#msg.show{
		visibility: visible;
		-webkit-animation: fadein0.5, fadeout0.5s 2.5s;
		animation: fadein0.5s, fadeout0.5s 2.5s;
	}
	@-webkit-keyframes fadein{
		from{top: 0; opacity: 0;}
		to{top: 30px; opacity: 1;}
	}
	@keyframes fadein{
		from{top: 0; opacity: 0;}
		to{top: 30px; opacity: 1;}
	}
	@-webkit-keyframes fadeout{
		from{top: 30px; opacity: 1;}
		to{top: 0; opacity: 0;}
	}
	@keyframes fadeout{
		from{top: 30px; opacity: 1;}
		to{top: 0; opacity: 0;}
	}
	</style>
</head>
<body>
	<div class="reset">

		<form>
		<h2 align="center" style="color: #fff;">Reset Password</h2>	
		<input type="Password" name="username" placeholder="Old Password"/><br><br>
		<input type="Password" name="username" placeholder="New Password"/><br><br>
		<input type="Password" name="username" placeholder="Confirm Password"/><br><br>
		<input type="submit" class="btn" name="" value="Save" onclick="myfunction()"/><br><br>
		<a href="login.php">Go back to home page</a>
		<div id="msg">Your password changed successfully</div>

		<script type="text/javascript">
			function myFunction(){
				var x=document.getElementById("msg");
				x.className="show";
				setTimeout(function(){ x.className=x.className.replace("show","");}, 3000);
			}
		</script>
		</form>
		</div>
</body>
</html>