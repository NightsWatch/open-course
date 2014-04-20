<?php

session_start();
if(!isset($_SESSION['id']))
    header('Location: ../views/505.php');

include 'header.php';
include '../models/threads.php';
include_once '../models/user_details.php';
if(isset($_SESSION['status']))
{
    include 'sidebar.php';
}

$msg = New messages();

$loggedinuserid=$msg->getUserid($_SESSION["username"]);
$ud = New user_details();
$thrds = New threads();

$threadid = $_GET['tid'];
$rows = $thrds -> getPosts($threadid);


?>

<section class="content-header">
<h1 style="text-align:center"><i class="fa fa-bullhorn"></i> Forum for Course </h1>
<br/>

<div class="box box-success" style="position: relative;">
    <div class="box-header" style="cursor: move;">
        <h1 class="box-title" style="text-align:center"><?php echo $thrds->getTitle($threadid);?></h1>
        </div>
        <div class="box-body">
            <h4><i class="fa fa-user"></i> <?php echo $ud->getUsername($thrds->getStarter($threadid));?></h4>
                <h5 ><i class="fa fa-clock-o"></i> <?php echo date(" H:i , d M Y", strtotime($thrds->getTime($threadid)));?></h5>
    <hr>
        </div>
    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: auto;">
    <div class="box-body chat" id="chat-box" style="overflow: hidden; width: auto; height: auto;">
        
        <!-- chat item -->
        <?php 
           while($row = mysql_fetch_array($rows))
           {
            $postid = $row['postid'];
            $postusername = $msg->getUsername($row['userid']);
           
            $hrdate = date("H:i, d M Y", strtotime($row['timestamp']));
                echo'<div class="item">
                    <img src="img/avatar3.png" alt="user image" class="offline">
                    <p class="message">
                        <a href="#" class="name">
                            <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> '.$hrdate.'</small>
                            '.$postusername.'</a>
                       '.$row['content'].'
                    </p>
                    </div>';
            }
        ?>
    </div>
    <div class="slimScrollBar" style="background-color: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; z-index: 99; right: 1px; height: 161.49870801033592px; background-position: initial initial; background-repeat: initial initial;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; background-color: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px; background-position: initial initial; background-repeat: initial initial;"></div>
    <?php echo '<form action ="../controller/addpost.php?threadid='.$threadid.'" method="post" role="form">'; ?>
    <div class="box-footer">
        <div class="input-group">
            <input class="form-control" name="postmsg" type="text" placeholder="Add post to this thread...">
            <div class="input-group-btn">
                <button class="btn btn-success" title="Post"><i class="fa fa-plus"></i></button>
            </div>
        </div>
    </div>
</div>
</section>


<script src="js/jquery_clickrow.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/jquery_clickrow.js" type="text/javascript"></script>
 
</body>
</html>