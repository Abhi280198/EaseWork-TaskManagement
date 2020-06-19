                <div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
                    <div class="mdk-drawer__content">
                        <div class="sidebar sidebar-light sidebar-left simplebar" data-simplebar>
                            <?php
                                $select_query="select * from tbluser where Uid='".$_SESSION['UserID']."'";
                                $Execute_Q=mysqli_query($con,$select_query) or die(mysqli_error($con));
                                $fetch=mysqli_fetch_array($Execute_Q);
                                $imageName=$fetch['ProfilePic'];
                                              
                                if($imageName=="" || !file_exists("images/profile/$imageName"))
                                {
                                    $imageName="No.png";
                                }
                            ?>
                            <div class="d-flex align-items-center sidebar-p-a border-bottom sidebar-account">
                                <a href="profile.php?Uid=<?php echo $_SESSION['UserID'];?>" class="flex d-flex align-items-center text-underline-0 text-body">
                                    <span class="avatar mr-3">
                                        <img src="images/profile/<?php echo $imageName;?>" alt="avatar" class="avatar-img rounded-circle">
                                    </span>
                                    <span class="flex d-flex flex-column">
                                        <strong><?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname'];?></strong>
                                    </span>
                                </a>
                                <div class="dropdown ml-auto">
                                    <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-item-text dropdown-item-text--lh">
                                            <div><strong><?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname'];?></strong></div>
                                            <div><?php echo $_SESSION['Emailid'];?></div>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="index.php?Uid=<?php echo $_SESSION['UserID'];?>">Dashboard</a>
                                        <a class="dropdown-item" href="profile.php?Uid=<?php echo $_SESSION['UserID'];?>">My profile</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="logout.php">Logout</a>
                                    </div>
                                </div>
                            </div>

                            <div class="sidebar-heading sidebar-m-t">Menu</div>
                            <ul class="sidebar-menu">
                            <?php
                                $Tid=$_GET['Tid'];
                                $team_query="select * from tblteam where Tid=$Tid";
                                $Execute_team=mysqli_query($con,$team_query) or die(mysqli_error($con));
                                $fetch=mysqli_fetch_array($Execute_team);
                                $teamname=$fetch['Tname'];
                                $tid=$fetch['Tid'];
                            ?>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" data-toggle="collapse" href="#dashboards_menu">
                                        <a class="sidebar-menu-button" href="TeamPage.php?Uid=<?php echo $_SESSION['UserID'];?>">
                                            <span class="sidebar-menu-text"><?php echo $teamname; ?></span>
                                        </a>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="Team_boards.php?Tid=<?php echo $tid;?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">aspect_ratio</i>
                                        <span class="sidebar-menu-text">Boards</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="Team_members.php?Tid=<?php echo $tid;?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">person</i>
                                        <span class="sidebar-menu-text">Members</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="Team_profile.php?Tid=<?php echo $tid;?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">tune</i>
                                        <span class="sidebaxr-menu-text">Profile</span>
                                    </a>
                                </li>          
                                    
                            </ul>

                        </div>
                    </div>
                </div>
            