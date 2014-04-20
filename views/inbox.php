<?php

session_start();


include_once 'header.php';

include_once '../models/messages.php';

$msg = New messages();


$senderid=$msg->getUserid($_SESSION["username"]);
$loggedinuserid = $senderid;
//$rows=$msg->getInbox($senderid);


           

if(isset($_SESSION['status']))
{
    include_once 'sidebar.php';
}
?>

<section class="content-header">
<h1 style="text-align:center"><i class="fa fa-inbox"></i> Inbox</h1>
</section>
<br/>
                <!-- Main content -->
<section class="content">
    <!-- MAILBOX BEGIN -->
    <div class="mailbox row">

        <div class="col-xs-12">

            <!-- <div class="box box-solid">
                <div class="box-body"> -->
                    <div class="row">

                        <div class="col-md-4">
                            <div class="box box-solid">
                                <div class="box-header">
                                    <i class="fa fa-group"></i>
                                    <h3 class="box-title">People</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                <table class="table table-mailbox">
                                    
                                    <?php 

                                        $rows=$msg->getInboxUsers($senderid);
                                        while($row = mysql_fetch_array($rows))
                                        {
                                            //$message = $row['message'];
                                            $fromusername = $row['username'];
                                            $loggedinuserid = $senderid;
                                            $unread = $msg->doesExistUnread($msg->getUserid($fromusername),$loggedinuserid);
                                            //echo $message, $username, $seen;

                                            if($unread==1)
                                            {
                                                echo '<tr class="unread">
                                        <td style="width:150px"><img src="img/avatar.png" alt="user image" class="online" style="width: 80px;height: 80px;border: 2px solid transparent;-webkit-border-radius: 50% !important;
                                        -moz-border-radius: 50% !important;border-radius: 50% !important;"></td>
                                        <td><a href="inbox.php?username='.$fromusername.'">Unread Message From </a></td>
                                        <td class="name"><a href="inbox.php?username='.$fromusername.'">'.$fromusername.'</a></td>
                                    </tr>';
                                            }

                                            else
                                            {
                                            //mistake here
                                                echo '<tr>
                                        <td style="width:150px"><img src="img/avatar.png" alt="user image" class="online" style="width: 80px;height: 80px;border: 2px solid transparent;-webkit-border-radius: 50% !important;
                                        -moz-border-radius: 50% !important;border-radius: 50% !important;"></td>
                                        <td class="name"><a href="inbox.php?username='.$fromusername.'">'.$fromusername.'</a></td>
                                    </tr>';
                                        
                                            }
                                        }
                                    ?>
                                </table>
                                </div><!-- /.box-body -->
                            </div>
                        </div>
                        <div class="col-md-8">
                            <a class="btn btn-large btn-primary" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-pencil"></i> Compose Message</a>
                            <p><p/>
                            <div class="box box-solid">

                                <div class="box-header">
                                   
                                    <?php 

                                        if(isset($_GET['username']))
                                           { echo ' <i class="fa fa-inbox"></i><h3 class="box-title">Conversation with '.$_GET['username'].'</h3>';}

                                        else
                                           { echo '<br/><div class="alert alert-info alert-dismissable">
                                        <i class="fa fa-info"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b> Choose an user on left to see conversation with that user 
                                    </div>';}
                                        ?>

                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="box-body chat" id="chat-box" style="overflow: hidden; width: auto; height: auto;">
                                    
                                    <?php
                                    //echo '<h4>'.$fromusername.'</th>';
                                     if(isset($_GET['username']))
                                    {
                                    $fromuserid = $msg->getUserid($_GET['username']);

                                    $rows=$msg->getInboxMessages($loggedinuserid,$fromuserid);
                                    
                                        while($row = mysql_fetch_array($rows))
                                        {
                                            $hrdate = date("H:i, d M Y", strtotime($row['timestamp']));
                                        
            // <img src="img/avatar2.png" alt="user image" class="offline">
                                            echo '<div class="item">
                                             <img src="img/avatar3.png" alt="user image" class="offline">
                                            <p class="message">
                                                <a href="#" class="name">
                                                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> '.$hrdate.'</small>
                                                    '.$msg->getUsername($row['senderid']).'</a>
                                               '.$row['message'].'
                                            </p>
                                            </div><hr>';
                                        }
                                        echo ' </div>';
                                        $msg->setAllSeen($fromuserid,$loggedinuserid);
                                    }
                                    ?>
                                </table>
                                </div><!-- /.box-body -->
                            </div>
                        </div>
                     </div>
    <!-- MAILBOX END -->

</section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<!-- COMPOSE MESSAGE MODAL -->
<div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Compose New Message</h4>
            </div>
            <form action="../controller/messages.php" method="POST" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">TO:</span>
                            <input name="receiverusername" id="receiverusername" type="username" class="form-control" placeholder="Enter username of receiver">
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="message" id="message" class="form-control" placeholder="Message" style="height: 120px;"></textarea>
                    </div><!-- 
                    <div class="form-group">                                
                        <div class="btn btn-success btn-file">
                            <i class="fa fa-paperclip"></i> Attachment
                            <input type="file" name="attachment"/>
                        </div>
                        <p class="help-block">Max. 32MB</p>
                    </div> -->
                </div>
                <div class="modal-footer clearfix">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Discard</button>
                    <button type="submit" name="messages" class="btn btn-primary pull-left"><i class="fa fa-envelope"></i> Send Message</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/AdminLTE/app.js" type="text/javascript"></script>
    <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<!--
    <script type="text/javascript">
        $(function() {

            "use strict";

            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"]').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });

            //When unchecking the checkbox
            $("#check-all").on('ifUnchecked', function(event) {
                //Uncheck all checkboxes
                $("input[type='checkbox']", ".table-mailbox").iCheck("uncheck");
            });
            //When checking the checkbox
            $("#check-all").on('ifChecked', function(event) {
                //Check all checkboxes
                $("input[type='checkbox']", ".table-mailbox").iCheck("check");
            });
            //Handle starring for glyphicon and font awesome
            $(".fa-star, .fa-star-o, .glyphicon-star, .glyphicon-star-empty").click(function(e) {
                e.preventDefault();
                //detect type
                var glyph = $(this).hasClass("glyphicon");
                var fa = $(this).hasClass("fa");

                //Switch states
                if (glyph) {
                    $(this).toggleClass("glyphicon-star");
                    $(this).toggleClass("glyphicon-star-empty");
                }

                if (fa) {
                    $(this).toggleClass("fa-star");
                    $(this).toggleClass("fa-star-o");
                }
            });

            //Initialize WYSIHTML5 - text editor
            $("#email_message").wysihtml5();
        });
    </script>
-->
    </body>
</html>