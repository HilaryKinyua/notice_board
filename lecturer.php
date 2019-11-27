<?php include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice Board APP| Notice Upload</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css" />
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">


    <link rel="stylesheet" type="text/css" href="css/theme.css" />
    <link rel="stylesheet" type="text/css" href="css/dashboard.css" />

</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="lecturer_notices.php" title="Notice Board">Notice Board</a>
            <i class=" navbar-brand fa fa-comments text-center" style="font-size: 24px;padding-left: 200px;">&nbsp;
                <!--Greetings-->
                <script>
                    var myDate= new Date();
                    var hours=myDate.getHours();
                    var greet;
                    if(hours<12){
                        greet='Good Morning,';
                    }
                    else if(hours>=12 && hours<17){
                        greet='Good Afternoon,';
                    }
                    else if(hours>=17 && hours<=24){
                        greet='Good Evening,';
                    }
                    document.write(greet);
                </script>
                <?php echo "Mr Lecturer";echo"!";?>
            </i>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li><a href="lecturer_notices.php"><i class="glyphicon glyphicon-th"></i>Lecturer Notices</a></li>
                <li class="nav nav-list nav-list-expandable nav-list-expanded">
                    <a><i class="fa fa-user"></i> Lecturer's Activities <span class="caret"></span></a>
                    <ul class="nav navbar-nav">
                        <li><a href="lecturer_notice_gallery.php"><i class="fa fa-picture-o"></i>Lecturer Notice Gallery</a></li>
                        <li><a href="lecturer_upload_notices.php"><i class="fa fa-upload"></i>Lecturer Notice Upload</a></li>

                    </ul>
                </li>
                <li><a href="lecturer_chat_bot.php"><i class="fa fa-comments"></i>Lecturer Chat Bot</a></li>
                <li class="nav nav-list nav-list-expandable">
                    <a><i class="fa fa-location-arrow"></i> Lecturer's Actions<span class="caret"></span></a>
                    <ul class="nav navbar-nav">
                        <li><a href="lecturer_manage_notices.php"><i class="fa fa-file-photo-o"></i>Manage Notices</a></li>

                    </ul>
                <li>
            </ul>
            <ul class="nav navbar-nav navbar-right navbar-user">
                <li class="dropdown messages-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Notices <span class="label label-danger">
                                                           <?php
                                                           global $connection;

                                                           $today_date=strtotime(date("y-m-d"));

                                                           $sql="SELECT count(id) AS total FROM notice_upload";
                                                           $query=mysqli_query($connection,$sql);
                                                           $values=mysqli_fetch_assoc($query);
                                                           $num_rows=$values['total'];
                                                           echo"$num_rows";
                                                           ?>
                            </span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">2 New Messages</li>
                        <li class="message-preview">
                            <a href="#">
                                <span class="avatar"><i class="fa fa-bell"></i></span>
                                <span class="message">Security alert</span>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li class="message-preview">
                            <a href="#">
                                <span class="avatar"><i class="fa fa-bell"></i></span>
                                <span class="message">Security alert</span>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#">Go to Inbox <span class="badge">2</span></a></li>
                    </ul>
                </li>
                <li class="dropdown user-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <img src='img/profile.png' class='img-circle' width='25' height='25'>
                        <?php echo "Mr Admin" ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="profile.php"><i class="fa fa-user"></i>Profile</a></li>
                        <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div id="grid">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h2 class="text-center">Welcome to Lecturer's Panel</h2>
                        </div>
                        <div class="panel-body">







                        </div>
                    </div>





                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>


<script type="text/javascript" src="js/theme.js"></script>
<script type="text/javascript" src="js/gridData.js"></script>

</body>
</html>
