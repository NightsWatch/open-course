<?php

session_start();


include 'header.php';

if(isset($_SESSION['status']))
{
    include 'sidebar.php';
}
?>
<section class="content-header">
<h1 style="text-align:center"><i class="fa fa-bullhorn"></i> Forum for Course _</h1>
<br/>

<div class="box box-success" style="position: relative;">
    <div class="box-header" style="cursor: move;">

        <h3 class="box-title" style="text-align:center">Thread title</h3>

       <!--  <div class="box-tools pull-right" data-toggle="tooltip" title="" data-original-title="Status">
            <div class="btn-group" data-toggle="btn-toggle">
                <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button>                                            
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
            </div>
        </div> -->

    </div>
    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;"><div class="box-body chat" id="chat-box" style="overflow: hidden; width: auto; height: 250px;">
        <!-- chat item -->
        <div class="item">
            <img src="img/avatar.png" alt="user image" class="online">
            <p class="message">
                <a href="#" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                    Mike Doe
                </a>
                I would like to meet you to discuss the latest news about
                the arrival of the new theme. They say it is going to be one the
                best themes on the market
            </p>
            <div class="attachment">
                <h4>Attachments:</h4>
                <p class="filename">
                    Theme-thumbnail-image.jpg
                </p>
                <div class="pull-right">
                    <button class="btn btn-primary btn-sm btn-flat">Open</button>
                </div>
            </div><!-- /.attachment -->
        </div><!-- /.item -->
        <!-- chat item -->
        <div class="item">
            <img src="img/avatar2.png" alt="user image" class="offline">
            <p class="message">
                <a href="#" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                    Jane Doe
                </a>
                I would like to meet you to discuss the latest news about
                the arrival of the new theme. They say it is going to be one the
                best themes on the market
            </p>
        </div><!-- /.item -->
        <!-- chat item -->
        <div class="item">
            <img src="img/avatar3.png" alt="user image" class="offline">
            <p class="message">
                <a href="#" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
                    Susan Doe
                </a>
                I would like to meet you to discuss the latest news about
                the arrival of the new theme. They say it is going to be one the
                best themes on the market
            </p>
        </div><!-- /.item -->
    </div><div class="slimScrollBar" style="background-color: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; z-index: 99; right: 1px; height: 161.49870801033592px; background-position: initial initial; background-repeat: initial initial;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; background-color: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px; background-position: initial initial; background-repeat: initial initial;"></div></div><!-- /.chat -->
    <div class="box-footer">
        <div class="input-group">
            <input class="form-control" placeholder="Type message...">
            <div class="input-group-btn">
                <button class="btn btn-success"><i class="fa fa-plus"></i></button>
            </div>
        </div>
    </div>
    </div>

</section>

</div>    
<?php

include 'footer.php';
?>