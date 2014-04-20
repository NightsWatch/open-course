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
         <a class="btn btn-block btn-primary" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-pencil"></i> Add Thread</a><br/>
            <?php 

            include_once '../controller/add_course_description.php';
            ?>

         </div>
    </div>
</section><!-- /.content -->

</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
<!-- COMPOSE MESSAGE MODAL -->
<div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-pencil"></i> Add New Thread</h4>
            </div>
            <?php echo '<form action="../controller/newthread.php?cid='.$courseid.'" method="POST" role="form">'; ?>
                <div class="modal-body">
                    <p>Start a new thread in this course forum by mentioning the title</p>
                    <div class="form-group">
                        <textarea name="title" id="title" class="form-control" placeholder="Title" style="height: 80px;"></textarea>
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
                    <button type="submit" name="addthread" class="btn btn-primary pull-left"><i class="fa fa-check"></i> Add</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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