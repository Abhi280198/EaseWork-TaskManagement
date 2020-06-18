<!-- LOGIN DATABASE CONNECTION -->

<?php 
    include_once("DbConnection.php");

    /*static $count=0;*/

    if(isset($_REQUEST['submit'])) 
    {

        $sel="SELECT * FROM tbluser 
                WHERE Email='".$_REQUEST['email']."'
                 AND Password='".$_REQUEST['pass']."' limit 1";

        $result=mysqli_query($con,$sel) or die(mysqli_error($con));

        $row=mysqli_fetch_array($result);

        if(mysqli_num_rows($result)==1)
        {
            $_SESSION['UserID']=$row['Uid'];
            $_SESSION['Firstname']=$row['Fname'];
            $_SESSION['Lastname']=$row['Lname'];
            $_SESSION['Emailid']=$row['Email'];
            $_SESSION['Pass']=$row['Password'];
            $_SESSION['Mobileno']=$row['Mobile'];
            header('location: index_home.php');
        }
        else
        {
            echo '<script type="text/javascript" id="error">alert("Invalid Credentials");</script>';
        }
    }
?>

<!--END LOGIN DATABASE CONNECTION -->

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Play">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- javascript validation start  -->

    <script type="text/javascript">
        function validate()
            {
                var lemail = document.forms["myform"]["email"].value;
                var lpass = document.forms["myform"]["pass"].value;

                    //login username and password
                if(lemail == ""){
                    document.getElementById('emails').innerHTML =" ** Please fill the email";
                    return false;
                }else{
                    document.getElementById('emails').innerHTML ="";

                }
                if(lemail.indexOf('@') <= 0){
                    document.getElementById('emails').innerHTML =" ** @ Invalid Position";
                    return false;
                }
                if((lemail.charAt(lemail.length-4)!='.') && (lemail.charAt(lemail.length-3)!='.'))
                {
                    document.getElementById('emails').innerHTML =" ** . Invalid Position";
                    return false;
                }

                if(lpass == ""){
                    document.getElementById('passw').innerHTML =" ** Please fill the Password";
                    return false;
                }else{
                    document.getElementById('passw').innerHTML ="";

                }
                
                return true;
            } 
    </script> 
          <!--javascript validation ends  -->

</head>

<body>
	<div class="form-container">
		<form method="POST" class="signin" name="myform" action="login.php">
			<h2 style="color: white">Log In</h2>
            
            <i  class="fa fa-envelope " aria-hidden="true"></i>
			<input type="email" name="email" placeholder="Email Id"><br><span id="emails" style="color: red"></span><br>

            <i  class="fa fa-lock " aria-hidden="true"></i>
			<input type="password" name="pass" placeholder="Password"><br><span id="passw" style="color: red"></span><br><br>


			<button type="submit" name="submit" value="submit" class="btn"  onclick="return validate();">Sign Up</button><br><br>
		   <div id="container">
			<!-- <a href="#" style="margin-right: 0px; font-size: 13px; font-family: Tahoma, Geneva, sans-serif;">Reset Password</a> --><br>
			 <a href="reset_password.php" style="margin-right: 0px; font-size: 13px; font-family: Tahoma, Geneva, sans-serif;">Forgot Password</a>	
			</div><br> 
			Don't have an account?<a href="register.php">&nbsp;Sign Up</a>
		</form>
	</div>
</body>
</html>