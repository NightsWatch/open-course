<?php

session_start();


include 'header.php';

if(isset($_SESSION['status']))
{
    include 'sidebar.php';
}

?>

<section class="content-header">
	<h1 style="text-align:center"><i class="fa fa-edit"></i> Search Results</h1>
</section>

<br/>
 <section class="content">
	
	<h2><?php $category ?></h2>

	<?php 
	while($row = mysql_fetch_array($result) )
	{
		if($category=="Users")
		{ ?>
		
		<div class="col-md-6">
 		 <div class="box box-success" style="position: relative;">
            <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center"><a href="thread.php"><?php $row['username'] ?></a></h3>
            </div>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
            <div class="box-body" style="overflow: hidden; width: auto;">
              <ul>
              	<li>Email: <?php $row['email_id']?>
              	</li>
              	<li>Usertype: <?php $row['usertype'] ?> </li>
              </ul>
            </div>
        </div>
        </div>
 		
 	</div>

  <?php	}

  if($category=="Students")
		{ ?>
		
		<div class="col-md-6">
 		 <div class="box box-success" style="position: relative;">
            <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center"><a href="thread.php"><?php $row['name'] ?></a></h3>
            </div>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
            <div class="box-body" style="overflow: hidden; width: auto;">
              <ul>
              	<li>Program: <?php $row['program'] ?></li>
               <li>Batch: <?php $row['batch'] ?></li>
               <li>Department: <?php $row['department'] ?> </li>
               <li>Roll Noumber: <?php $row['roll'] ?></li>
              </ul>
            </div>
        </div>
        </div>
 		
 	</div>


<?php } 

} ?>


 </section>

<?php

include 'footer.php';

?>