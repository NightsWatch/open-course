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
<section class="content">
    <!-- row -->
    <div class="row">        
	        
	    <div class="col-md-4">
	    	<?php echo '<a href="../controller/clearnotifs.php?id=1"><button class="btn btn-large">Set Seen</button></a>'; ?>
	    </div>

    </div>
    <div style="height:5px"></div>
    <div class="row">
        <?php
           include_once '../controller/notificationsfac.php';

           echo '</div>';


        ?>
    

<?php

include 'footer.php';

?>