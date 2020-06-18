
<?php 
	include_once("DbConnection.php");
	if(isset($_POST['submit']))
	{
		$first=$_POST['first_name'];
		$last=$_POST['last_name'];
		$emailid=$_POST['email_id'];
		$pass=$_POST['pass'];
		$phone=$_POST['mob'];

		$query="insert into tbluser(Fname,Lname,Email,Password,Mobile,Date,IsActive)values('$first','$last','$emailid','$pass', '$phone',now(),1)";
		$run=mysqli_query($con,$query);

		if($run){

		?>
		    <!--echo"Data insert successfully...";-->
		    <script type="text/javascript">alert("Data inserted successfully");</script>

		<?php
		}   
		else{
		echo "error".mysqli_error($con);   
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>register</title>
	<link rel="stylesheet" type="text/css" href="register.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Play">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- msg style part -->

<style>
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

<!-- msg part style end -->

<!-- javascript validation part -->

<script type="text/javascript">
    function validate()
        {
    		var fuser = document.forms["myform"]["first_name"].value;
    		var luser = document.forms["myform"]["last_name"].value;
    		var rpass = document.forms["myform"]["pass"].value;
    		var mobile = document.forms["myform"]["mob"].value;
    		var email = document.forms["myform"]["email_id"].value;

    		//registeration info
    		if(fuser == ""){
    			document.getElementById('fname').innerHTML =" ** Please fill firstname";
    			return false;
    		}else{
                document.getElementById('fname').innerHTML ="";

            }
    		if(luser == ""){
    			document.getElementById('lname').innerHTML =" ** Please fill lastname";
    			return false;
    		}else{
                document.getElementById('lname').innerHTML ="";

            }

            if(email == ""){
    			document.getElementById('emailids').innerHTML =" ** Please fill Email Id";
    			return false;
    		}else{
                document.getElementById('emailids').innerHTML ="";

            }
    		if(email.indexOf('@') <= 0){
    			document.getElementById('emailids').innerHTML =" ** @ Invalid Position";
    			return false;
    		}
    		if((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.'))
    		{
    			document.getElementById('emailids').innerHTML =" ** . Invalid Position";
    			return false;
    		}


    		if(rpass == ""){
    			document.getElementById('rpass').innerHTML =" ** Please fill the Password";
    			return false;
    		}else{
                document.getElementById('rpass').innerHTML ="";

            }

    		if(mobile == ""){
    			document.getElementById('mobileno').innerHTML =" ** Please fill mobile number";
    			return false;
    		}else{
                document.getElementById('mobileno').innerHTML ="";

            }
    		if (mobile.length!=10) {
    			document.getElementById('mobileno').innerHTML =" ** Mobile number must be 10 digits only.";
    			return false;
    		}
    		if (isNaN(mobile)) {
    			document.getElementById('mobileno').innerHTML =" ** User must write digits only not characters.";
    			return false;
    		}
    		
			return true;
    	}

</script>
<!-- javascript validation end -->
</head>
<body>

<!-- form design part start -->
	<div class="form-container" >
		<form class="signup" action="register.php" name="myform" method="POST">
			<h2 style="color:#fff;">Sign In</h2>

			<i class="fa fa-user " aria-hidden="true"></i>
			<input type="text" id="register-fname" name="first_name" placeholder="First Name"><br><span id="fname" style="color: red"></span><br>

			<i class="fa fa-user " aria-hidden="true"></i>
			<input type="text" name="last_name" placeholder="Last Name"><br><span id="lname" style="color: red"></span><br>
			
			<i class="fa fa-envelope " aria-hidden="true"></i>
			<input type="email" name="email_id" placeholder="Email Id"><br><span id="emailids" style="color: red"></span><br>
			
			<i class="fa fa-lock " aria-hidden="true"></i>
			<input type="Password" name="pass" placeholder="Password"><br><span id="rpass" style="color: red"></span><br>
			
			<i class="fa fa-mobile " aria-hidden="true"></i>
			<input type="text" name="mob" placeholder="Mobile No."><br><span id="mobileno" style="color: red"></span><br><br>
			
			<button type="submit" name="submit" class="btn"  onclick="return validate();">Sign Up</button><br><br>
			<!-- <div id="msg">Sign up successfully!!!</div> -->
			<!-- <script>
				function myFunction(){
					var x=document.getElementsById("msg");
					x.className="show";
					setTimeout(function(){x.className=
						x.className.replace("show","");}, 3000);
				}
			</script> -->
			Already have account? <a href="login.php">&nbsp; Log In</a>
		</form>

	</div>	
</body>
</html>
<!-- form design part end -->