<?php

session_start();


include 'header.php';

if(isset($_SESSION['status']))
{
    include 'sidebar.php';
}
?>


<section class="content-header">
    <h1 style="text-align:center"><i class="fa fa-edit"></i> Assignment Grading Page</h1>
</section>
<br/>
 <section class="content">
                    <div class="row">
                    <div class="col-xs-4">
                            <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title">For _ assignment of</h3>                                    

                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <ul>
                                    	<li>Student Name</li>
                                    	<li>Assignment no.</li>
										<li>Course no.</li>
                                        <li>Course name</li>
                                    </ul>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                        <div class="col-xs-8">
	                    
	                         <form role="form">
	                                <!-- text input -->
	                            <div class="box box-warning">
	                       			<div class="box-header">
	                            		<h3 class="box-title">Assignment grading</h3>                                   
	                              	</div><!-- /.box-header -->
	                        		<div class="box-body table-responsive">
		                        		<div>
		                        			<ul>
		                        			<li><a href=""><button class="btn bg-olive">Download student's assignment submission</button></a>	</li>
		                        			<li>Assignment submitted at: </li>
		                        			</ul>
		                        		</div>
		                        		<hr>
	                           		     <div class="form-group">
	                                	    <label> Marks</label>
	                                    	<input type="text" class="form-control" placeholder="Marks received">
	                                	</div>
	                                	<div class="box-footer">
	                                    	<button type="submit" class="btn bg-olive btn-block">Submit</button>
	                                    </div>                             
									</div><!-- /.box-body -->
	                    		</div><!-- /.box -->
	                    	</form>
                        </div>
                    </div>

<?php

include 'footer.php';

?>

