<?php 
    include_once("DbConnection.php");
    $cardid=$_GET['Cardid']; 
    $Bid=$_GET['Bid']; 

/* delete card button*/
    if (isset($_REQUEST['deletecardspopup'])) 
    {
        $list=$_REQUEST['cardmove'];
        $delete_card = "DELETE FROM tblcard WHERE Cardid ='".$_GET['Cardid']."'";
        $Exe_delete_card=mysqli_query($con,$delete_card)or die(mysqli_error($con));
        $delete_member = "DELETE FROM tblmembercard WHERE Cardid ='".$_GET['Cardid']."'";
        $Exe_delete_cardmember=mysqli_query($con,$delete_member)or die(mysqli_error($con));

        if (mysqli_query($con,$delete_card)) 
        {
            if ($list==1||$list==2||$list==3) 
            {
                header("location:board.php?Bid=$Bid");
            } 
            if ($list==4||$list==5||$list==6||$list==7) 
            {
                header("location:Education_template.php?Bid=$Bid");
            }
            if ($list==8||$list==9||$list==10||$list==11) 
            {
                header("location:Personal_template.php?Bid=$Bid");
            }   
                
        }
    } 
/* delete card button*/

if (isset($_POST['carddetails']))
{
        $list=$_REQUEST['cardmove'];
    
        $updatecard = "UPDATE tblcard SET CardName ='".$_REQUEST['cardtitle']."',Description='".$_REQUEST['carddescription']."',Label='".$_REQUEST['cardlabel']."',LabelColor='".$_REQUEST['cardlabelcolor']."', DueDate='".$_REQUEST['cardduedate']."', Listid='".$_REQUEST['cardmove']."' WHERE Cardid='$cardid'";

        $Exe_update=mysqli_query($con,$updatecard)or die(mysqli_error($con));

        $updatemem= "UPDATE tblmembercard SET Uid='".$_REQUEST['upcardmember']."' WHERE Cardid='$cardid'";
        $Exe_updatemem=mysqli_query($con,$updatemem)or die(mysqli_error($con));
        
        if (mysqli_query($con, $updatecard)) 
        {
            if ($list==1||$list==2||$list==3) 
            {
                header("location:board.php?Bid=$Bid");
            } 
            if ($list==4||$list==5||$list==6||$list==7) 
            {
                header("location:Education_template.php?Bid=$Bid");
            }
            if ($list==8||$list==9||$list==10||$list==11) 
            {
                header("location:Personal_template.php?Bid=$Bid");
            }   
                
        } 
        else 
        {
                echo "Error updating record: ".mysqli_error($con);
        }
}
?>

<!-- Database for todo checklist -->
<?php 
    if(isset($_REQUEST['txtTodoChecklist']))
    {
        $insert_todo_cl = "INSERT into tblchecklist values(null,'".$_REQUEST['todochecklist']."','$cardid',1)";
        $run_checklist = mysqli_query($con,$insert_todo_cl)or die(mysqli_error($con));
    }
?>

<!-- END Database for todo checklist -->


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<title>EaseWork-Card Details</title>
    <?php include_once('csslinks.php');?>
    <link type="text/css" href="assets/css/board.css" rel="stylesheet">
</head>

<body class="layout-default">

	<div class="preloader"></div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">
    <!-- Header -->

        <?php include_once('header1.php');?>
        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">
            <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
                <div class="mdk-drawer-layout__content page">

                	<!-- subTitle details -->
                    <div class="container-fluid  page__heading-container">
                        <div class="page__heading">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Card Details</li>
                                </ol>
                            </nav>
                            <h1 class="m-0">Manage your card details</h1>
                        </div>
                    </div>
                    <!--  End subTitle details -->

                    <!-- Fetch Details -->
                    <?php
                        $card_query="select * from tblcard where Cardid='$cardid' ";
                        $Execute=mysqli_query($con,$card_query) or die(mysqli_error($con));
                        $fetch=mysqli_fetch_array($Execute);

                            /*$cardid = $fetch['Cardid'];*/
                            $cardname = $fetch['CardName'];
                            $carddescription=$fetch['Description'];
                            $cardlabel = $fetch['Label'];
                            $cardlabelcolor = $fetch['LabelColor'];       
                            $cardduedate = $fetch['DueDate'];
                            $listid=$fetch['Listid'];
                    ?>
                    <?php
                        $memberselected="select * from tblmembercard where Cardid='$cardid' ";
                        $Execute_selected=mysqli_query($con,$memberselected) or die(mysqli_error($con));
                        $fetch_selected=mysqli_fetch_array($Execute_selected);

                            $mid = $fetch_selected['Mcardid'];
                            $muid=$fetch_selected['Uid'];
                            $mcid = $fetch_selected['Cardid'];
                    ?>
                    <!-- Fetch Details -->
                    
<!-- start card details to be displayed and update -->
    <div class="container-fluid page__container">
        <div class="card card-form">
            <div class="row no-gutters">
                <div class="card-body col-lg-3" style="text-align: center;">
                    <p><h5 style="text-align: center;" class="w3-text-blue">CARD DETAILS</h5></p>
                    <p class="text-muted">Edit your card details and settings.</p>
                </div>
            <div class="card-form__body col-lg-9 card-body">
                                    
            <form class="w3-container w3-card-4" style="padding-top: 20px;" method="POST" enctype="multipart/form-data"> 
       	    <!-- <div class="form-group"> -->
           	<!-- Start Card Name Input -->
                <div class="row" style="padding-left:50px;" >
                   	<div class="col-25">   
                        <label class="w3-text-black"><b>Title</b></label>
                    </div>
                    <div class="col-75">
                        <input class="w3-input w3-border" style="width: 320px; height: 40px;" name="cardtitle" type="text" 
                        value="<?php 
                                    if(isset($cardname))
                                        echo $cardname;
                                ?>">
                   	</div>
                </div>
            <!-- End Card Name Input -->
            <!-- /div> -->
            <hr style="border-top: 1px solid #bbb;">
                                    
            <!-- Start Description Input -->
                <div class="row" style="padding-left:50px;" >
                    <div class="col-25">     
                        <label class="w3-text-black"><b>Description</b></label>
                    </div>
                    <div class="col-75">
                        <textarea name="carddescription" id="description" rows="4" class="w3-input w3-border" style="width: 320px; background-color: white;"><?php if(isset($carddescription)){echo $carddescription;}?></textarea>
                    </div>
                </div>
            <!-- End Description Input -->
            <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Checklist Input --> 
                    <div class="row" style="padding-left:50px;" >
                      <div class="col-25">     
                        <label class="w3-text-black"><b>Checklist</b></label>
                      </div>
                        <div class="col-75"  >
                            <input class="w3-input w3-border" placeholder="Enter label name" name="todochecklist" type="text" style="width: 260px; height: 40px; float: left;">

                            <input type="submit" class="w3-button w3-black w3-round" style="float: right; margin-right: 30px; height: 40px;" name="txtTodoChecklist" value="Add Item">

                        </div>
                    </div>
                    <br>

                    <div class="row" style="padding-left:160px; padding-top: 10px;" >
                         
                             <ul class="list-unstyled list-todo" id="todo">
                               <?php 
                                    $Todo_checklist = "SELECT * from tblchecklist where Cardid=$cardid";
                                    $res_checklist = mysqli_query($con,$Todo_checklist);
                                    if($res_checklist->num_rows !=0)
                                    {  
                                        while($row=$res_checklist->fetch_array())  
                                        {
                                            $ChecklistName=$row['ChecklistName'];
                                            $ChecklistID=$row['Checklistid'];
                                            
                                ?>
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1"><?php echo $ChecklistName?></label>
                                        <a href="ChecklistDelete.php?Cardid=<?php echo $cardid?>&Checklistid=<?php echo $ChecklistID;?>">Remove</center></a>
                                    </div>
                                </li>
                               <?php
                                    }
                                }
                                ?>
                            </ul>
                             
                    </div>                                  
                    <!--End Checklist Input -->

                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Member List Input -->                                                     
                    <div class="row" style="padding-left:50px;" >
                        <div class="col-25">     
                            <label class="w3-text-black"><b>Members</b></label>
                        </div>
                        <div class="col-75">
                            <select id="country" name="upcardmember" style="width:320px; height: 45px;">
                            <option value="0" selected>--Select--</option>
                                    <?php        
                                        $upmember = "SELECT * FROM tbluser Where IsActive=1 AND Uid IN (SELECT Uid FROM tblteammember Where Bid=$Bid)";  
                                        $result_upmember  = mysqli_query($con,$upmember );
                                        if($result_upmember ->num_rows!=0)
                                        {  
                                            while($row_upmember =$result_upmember ->fetch_array())  
                                            {
                                                $member=$row_upmember['Uid'];
                                                $fname=$row_upmember['Fname'];
                                                $lname=$row_upmember['Lname'];

                                                $memberselected="select * from tblmembercard where Cardid='$cardid' ";
                                                $Execute_selected=mysqli_query($con,$memberselected) or die(mysqli_error($con));
                                                $fetch_selected=mysqli_fetch_array($Execute_selected);

                                                $muid=$fetch_selected['Uid'];

                                                if ($member==$muid) 
                                                {
                                    ?>
                                                    <option selected="" value="<?php echo $member;?>">
                                                        <?php echo $fname." ".$lname;?>
                                                    </option>
                                    <?php
                                                }else
                                                {
                                    ?>
                                                    <option value="<?php echo $member;?>"><?php echo $fname." ".$lname;?></option>
                                    <?php  
                                                }
                                            }
                                        }
                                    ?>
                            </select>
                        </div>
                    </div>
                    <!-- End Member List Input --> 
                    
                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Label Input --> 
                    <div class="row" style="padding-left:50px;" >
                      <div class="col-25">     
                        <label class="w3-text-black"><b>Label Name</b></label>
                      </div>
                      <div class="col-75" >
                        <input class="w3-input w3-border" placeholder="Enter label name" name="cardlabel" type="text" style="width: 320px; height: 40px;" value="<?php if(isset($cardlabel)){echo $cardlabel;}?>">                                                
                      </div>
                    </div>
                    <!-- End Label Input -->

                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Label color Input --> 
                    <div class="row" style="padding-left:50px;" >
                        <div class="col-25">     
                            <label class="w3-text-black"><b>Label Color</b></label>
                        </div>
                        <div class="col-75" >
                            <input type="color" name="cardlabelcolor" value="<?php if(isset($cardlabelcolor)){echo $cardlabelcolor;}?>" style="width: 320px; height: 40px;">   
                        </div>
                    </div>
                    <!-- End Label color Input -->

                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Due Date Input --> 
                    <div class="row" style="padding-left:50px;" >
                      <div class="col-25">     
                        <label class="w3-text-black"><b>Due Date</b></label>
                      </div>
                      <div class="col-75">
                        <input type="date" id="birthdaytime" name="cardduedate" style="width:320px; height: 45px;" class="w3-input w3-border" 
                        value="<?php if(isset($cardduedate)){echo $cardduedate;}?>">
                      </div>
                    </div>
                    <!-- End Due Date Input --> 

                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Move to  Input --> 
                    <div class="row" style="padding-left:50px;" >
                      <div class="col-25">     
                        <label class="w3-text-black"><b>Move</b></label>
                      </div>
                      <div class="col-75" >
                        <select id="move" name="cardmove" style="width:320px; height: 45px;">
                        <?php
                            if($listid == 1)
                            {
                        ?>
                                <option value="1" selected >To Do</option><option value="2">Doing</option><option value="3">Done</option>
                        <?php
                            }
                            if($listid == 2)
                            {
                        ?>
                                <option value="1" >To Do</option><option value="2" selected>Doing</option><option value="3" >Done</option>
                        <?php
                            }
                            if($listid == 3)
                            {
                        ?>
                                <option value="1" >To Do</option><option value="2" >Doing</option><option value="3" selected>Done</option>
                        <?php
                            }    
                            if($listid == 4 )
                            {
                        ?>
                                <option value="4" selected>Syllabus Remaining</option><option value="5" >Syllabus to be covered today</option><option value="6" >Syllabus Covered</option><option value="7" >Assignments</option>
                        <?php
                            }    
                            if($listid == 5 )
                            {
                        ?>    
                                <option value="4" >Syllabus Remaining</option><option value="5" selected>Syllabus to be covered today</option><option value="6" >Syllabus Covered</option><option value="7" >Assignments</option>
                        <?php
                            }    
                            if($listid == 6 )
                            {
                        ?>
                                <option value="4" >Syllabus Remaining</option><option value="5" >Syllabus to be covered today</option><option value="6" selected>Syllabus Covered</option><option value="7" >Assignments</option>
                        <?php
                            }    
                            if($listid == 7 )
                            {
                        ?>
                                <option value="4" >Syllabus Remaining</option><option value="5" >Syllabus to be covered today</option><option value="6" >Syllabus Covered</option><option value="7" selected>Assignments</option>
                        <?php
                            }    
                            if($listid == 8)
                            {
                        ?>
                                <option value="8" selected>Todo Before Trip</option><option value="9" >Todo in Holiday</option><option value="10" >To eat and drink</option><option value="11" >Done</option>
                        <?php
                            }    
                            if($listid == 9)
                            {
                        ?>
                                <option value="8" >Todo Before Trip</option><option value="9" selected >Todo in Holiday</option><option value="10" >To eat and drink</option><option value="11" >Done</option>
                        <?php
                            }    
                            if($listid == 10)
                            {
                        ?>
                                <option value="8" >Todo Before Trip</option><option value="9" >Todo in Holiday</option><option value="10" selected>To eat and drink</option><option value="11" >Done</option>
                        <?php
                            }    
                            if($listid == 11)
                            {
                        ?>
                                <option value="8" >Todo Before Trip</option><option value="9" >Todo in Holiday</option><option value="10" >To eat and drink</option><option value="11" selected >Done</option>
                        <?php
                            }    
                        ?>
                         
                        </select>
                      </div>
                    </div>
                    <!-- End Move to Input -->

                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Button Input -->  
                    <div>
                        <center>
                            <button type="submit" name="carddetails" class="btn btn-success" style="width:150px;">Save</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="submit" name="deletecardspopup" class="btn btn-danger"style="background-color: red; width:150px;">Delete</button>

                            <p></p>
                        </center>
                    </div>
                    <!-- End Button Input -->
        

                                </div>
                            </div>
                        </div>

                    </div>

                    </form>
               

                </div>
                <!-- // END drawer-layout__content -->

                
            </div>
            <!-- // END drawer-layout -->
        </div>
        <!-- // END header-layout -->

   <?php include_once('scriptlinks.php');?>

</body>
</html>