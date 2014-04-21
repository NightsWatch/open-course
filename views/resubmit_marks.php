<?php

session_start();

if(!isset($_SESSION['usertype'])  )
{
    header('Location: ../views/505.php');
}

include_once 'header.php';

if(isset($_SESSION['status']))
{
    include_once 'sidebar.php';
}

$examid = $_GET['eid'];
$studid= $_GET['studid'];

?>

<section class="content-header">
<h1 style="text-align:center"><i class="fa fa-cloud-upload"></i> Resubmit Marks page</h1>
</section>
<br/>
 <section class="content">
    <div class="row">
      
        <div class="col-md-4 col-md-offset-4">

            <div class="box box-success" style="position: relative;">
       
            <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center">Marks</h3>
            </div>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
            <div class="box-body" style="overflow: hidden; width: auto;">

              <?php
              echo '
              <form role="form" action="../controller/resubmit_marks.php?eid='.$examid.'&studid='.$studid.'" method="post" 
              enctype="multipart/form-data">
                                    <div class="box-body">
                                       
                                        <div class="form-group">
                                            <label>Student Marks</label>
                                            <input type="number" class="input-large search-query" name="marks" id="marks" required>
                                        </div>
                                        
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
                                    </div>
                                </form>'; ?>
            </div>
        </div>
        </div>
        </div>

    </div>
    
    </div>
    </div>
    </div>
    </div>
    </section>


<?php
include 'footer.php';
?>
