<?php

session_start();
include 'header.php';

if(isset($_SESSION['status']))
{
    include 'sidebar.php';
}
?>

<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

<section class="content-header">
    <h1 style="text-align:center"><i class="fa fa-bell"></i> Notifications</h1>
</section>
<br/>
<section class="content">
    <!-- row -->
    <div class="row">        
        <?php
           include_once '../controller/notifications.php';
        ?>
    </div><!-- /.row -->

<?php

include 'footer.php';

?>