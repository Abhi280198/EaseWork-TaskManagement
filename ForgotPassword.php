<!-- FORGOT PASSWORD DATABASE CONNECTION -->

<?php 
    include_once("DbConnection.php");

    /*static $count=0;*/

    if(isset($_REQUEST['submitforgot'])) 
    {

        $sel_email="SELECT * FROM tbluser WHERE Email='".$_REQUEST['emailforgot']."' limit 1";

        $result_email=mysqli_query($con,$sel_email) or die(mysqli_error($con));

        $row=mysqli_fetch_array($result_email);

        if(mysqli_num_rows($result_email)>0)
        {
            $fname=$row['Fname'];
            $lname=$row['Lname'];
            $token=$row['Token'];
            $email=$_REQUEST['emailforgot'];

            $subject = "Reset Password";
            $body = "Hi, $fname $lname. Click here to reset your Password http://localhost/Task-Management/reset_password.php?token=$token";
            $headers = "From: poojakusingh35@gmail.com";

            if (mail($email, $subject, $body, $headers)) 
            {
                echo '<script type="text/javascript" id="error">alert("Sent Mail... Please check your email.");</script>';
            } 
            else 
            {
                echo '<script type="text/javascript" id="error">alert("Email Sending Failed....");</script>';;
            }
        }
        else
        {
            echo '<script type="text/javascript" id="error">alert("Email id not Exist !!!");</script>';
        }
    }
?>

<!--END FORGOT PASSWORD DATABASE CONNECTION -->
<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Play">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- javascript validation start  -->

    <script type="text/javascript">
        function valforgot()
            {
                var lemail = document.forms["myform"]["emailforgot"].value;

                if(lemail == ""){
                    document.getElementById('spanemailforgot').innerHTML =" ** Please fill the email";
                    return false;
                }else{
                    document.getElementById('spanemailforgot').innerHTML ="";

                }
                if(lemail.indexOf('@') <= 0){
                    document.getElementById('spanemailforgot').innerHTML =" ** @ Invalid Position";
                    return false;
                }
                if((lemail.charAt(lemail.length-4)!='.') && (lemail.charAt(lemail.length-3)!='.'))
                {
                    document.getElementById('spanemailforgot').innerHTML =" ** . Invalid Position";
                    return false;
                }
                /*windows.location.href("reset_password.php");*/
                return true;
            } 
    </script> 
    
    <!--javascript validation ends  -->

</head>

<body>
	<div class="form-container">
		<form method="POST" class="signin" name="myform" action="">
			<h2 style="color: white">Forgot Password</h2>
            
            <i  class="fa fa-envelope " aria-hidden="true"></i>
			<input type="email" name="emailforgot" placeholder="Email Id"><br><span id="spanemailforgot" style="color: red"></span><br><br>

			<button type="submit" name="submitforgot" value="submit" class="btn" onclick="return valforgot();">Send mail</button><br>
            
		   <div id="container">
	           <br>
			    <a href="login.php" style="margin-right: 0px; font-size: 13px; font-family: Tahoma, Geneva, sans-serif;">Go back to Login Page</a>
			</div><br>
		</form>
	</div>
</body>
</html>