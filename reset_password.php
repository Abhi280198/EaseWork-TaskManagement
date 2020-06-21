<!-- FORGOT PASSWORD DATABASE CONNECTION -->
<?php 
    include_once("DbConnection.php");
    $tokennumber=$_GET['token'];
?>

<!--END FORGOT PASSWORD DATABASE CONNECTION -->
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" type="text/css" href="register.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Play">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- javascript validation part -->
    <script type="text/javascript">
        function validatereset()
            {

                var npassword = document.forms["myform"]["newpass"].value;
                var cpassword = document.forms["myform"]["confirmpass"].value;

                //registeration info
                if(npassword == ""){
                    document.getElementById('npass').innerHTML =" ** Please enter your Password";
                    return false;
                }else{
                    document.getElementById('npass').innerHTML ="";
                }

                if(npassword.length<=8) {
                    document.getElementById('npass').innerHTML =" ** Password should be greater than 8.";
                return false;
                }

                if(cpassword == ""){
                    document.getElementById('cpass').innerHTML =" ** Please Enter Confirm Password";
                    return false;
                }else{
                    document.getElementById('cpass').innerHTML ="";
                }

                if(npassword != cpassword ){
                    document.getElementById('cpass').innerHTML =" ** Password not matched";
                    return false;
                }else{
                    document.getElementById('cpass').innerHTML ="";

                }
                
                return true;
            }

    </script>
    <!-- javascript validation end -->
</head>

<body>
    <?php

        $email_query="select * from tbluser where Token='$tokennumber' ";
        $Execute_Query=mysqli_query($con,$email_query) or die(mysqli_error($con));
        $fetch_row=mysqli_fetch_array($Execute_Query);

        $remail = $fetch_row['Email'];
        $rtoken = $fetch_row['Token'];

        if (isset($_REQUEST['submitreset'])) 
        {
            if(isset($remail))
            {
                $newp= $_REQUEST['newpass'];
                $confirmp = $_REQUEST['comfirmpass'];

                $resetpass= "update tbluser set Password='$newp' where Email='$remail' ";
                $Exe_update=mysqli_query($con,$resetpass)or die(mysqli_error($con));
                header("location:login.php");
            }
            else{
                echo '<script type="text/javascript" id="error">alert("Wrong mail... Reset Password Failed !!!");</script>';
            }
        }

    ?>

    <!-- form design part start -->
    <div class="form-container" >
        <form class="signup" name="myform" method="POST">
            <h2 style="color:#fff;">Reset Your Password</h2>
            
            <i class="fa fa-envelope " aria-hidden="true"></i>
            <input type="email" name="emailreset" placeholder="Email Id" value="<?php echo $remail;?>" disabled>
            <br><span id="emailids" style="color: red"></span><br>
            
            <i class="fa fa-lock " aria-hidden="true"></i>
            <input type="Password" name="newpass" placeholder="New Password"><br><span id="npass" style="color: red"></span><br>
            
            <i class="fa fa-lock " aria-hidden="true"></i>
            <input type="Password" name="confirmpass" placeholder="Confirm Password"><br><span id="cpass" style="color: red"></span><br><br>
            
            <button type="submit" name="submitreset" class="btn" onclick="return validatereset();" style="width: 200px;">Update Password</button><br><br>

        </form>

    </div>  
</body>
</html>
<!-- form design part end -->