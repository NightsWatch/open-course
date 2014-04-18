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
<div class="row">
     <div class="col-md-8">

        <div class="box box-success" style="position: relative;">
            <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center"><a href="thread.php">Thread title</a></h3>
            </div>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 50px;">
            <div class="box-body" style="overflow: hidden; width: auto; height: 250px;">
               Post by:
               Post content
               Time
            </div>
        </div>
        </div>

        <div class="box box-success" style="position: relative;">
            <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center"><a href="thread.php">Thread title</a></h3>
            </div>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 50px;">
            <div class="box-body" style="overflow: hidden; width: auto; height: 250px;">
               Post by:
               Post content
               Time
            </div>
        </div>
        </div>

        <div class="box box-success" style="position: relative;">
            <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center"><a href="thread.php">Thread title</a></h3>
            </div>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 50px;">
            <div class="box-body" style="overflow: hidden; width: auto; height: 250px;">
               Post by:
               Post content
               Time
            </div>
        </div>
        </div>
    </div>
     <div class="col-md-4">
     <div class="box box-success" style="position: relative;">
            <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center"><a href="assignments.php">Description</a></h3>
            </div>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
            <div class="box-body" style="overflow: hidden; width: auto;">
             <ul>
              <li>Course name</li>
              <li>Instructor</li>
              <li>Course no.</li>
              <li>Year</li>
              </ul>
            </div>
        </div>
        </div>
     </div>
</div>
</section>

</div>    
<?php

include 'footer.php';
?>