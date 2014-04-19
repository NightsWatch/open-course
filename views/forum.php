<?php

session_start();
include_once 'header.php';
if(isset($_SESSION['status']))
    {
        include 'sidebar.php';
    }

$courseid = $_GET['cid'];

?>

<link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />


<section class="content-header">
    
    <h1 style="text-align:center"><i class="fa fa-bullhorn"></i> 
    <?php 
    include_once '../controller/forum_header.php'; 
    ?>
    </h1>
</section><br/>

<section class="content">
    <div class="row">
         <div class="col-md-8">

         <?php
            include_once '../controller/add_threads.php';
        ?>

        </div>
         <div class="col-md-4">

            <?php 
            include_once '../controller/add_course_description.php';
            ?>

         </div>
    </div>
</section><!-- /.content -->

</aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<script type="text/javascript">
    $(function() {
        $('#example1').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
</script>

<?php
include_once 'footer.php';
?>