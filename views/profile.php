<?php

session_start();


include 'header.php';

if(isset($_SESSION['status']))
{
    include 'sidebar.php';
}
?>
<section class="content-header">
<h1 style="text-align:center"><i class="fa fa-user"></i> Profile</h1>
</section>
<section class="content">
<div class="row">
	
	<div class="col-md-4 col-md-offset-3">
		
							<form role="form">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" placeholder="Name">
                                        </div>

                                         <div class="form-group">
                                            <label>Roll number</label>
                                            <input type="text" class="form-control" placeholder="Roll number" >
                                        </div>
                                        <div class="form-group">
                                            <label>Batch</label>
                                            <input type="text" class="form-control" placeholder="Joining year" >
                                        </div>
                                         <div class="form-group">
                                            <label>Department</label>
                                            <input type="text" class="form-control" placeholder="Department">
                                        </div>
                                        <div class="form-group">
                                            <label>Program</label>
                                            <input type="text" class="form-control" placeholder="Program" >
                                        </div>

                            </form>

                            <hr>

							<form role="form">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" placeholder="Name">
                                        </div>

                                         <div class="form-group">
                                            <label>Faculty roll number</label>
                                            <input type="text" class="form-control" placeholder="Faculty roll number" >
                                        </div>
                                        <div class="form-group">
                                            <label>Designation</label>
                                            <input type="text" class="form-control" placeholder="Designation" >
                                        </div>
                                         <div class="form-group">
                                            <label>Department</label>
                                            <input type="text" class="form-control" placeholder="Department">
                                        </div>
                                        <div class="form-group">
                                            <label>Joined</label>
                                            <input type="text" class="form-control" placeholder="Joining year" >
                                        </div>

                            </form>
                            <button type="submit" class="btn bg-olive btn-block">Submit</button>



	</div>
	<div class="col-md-4">
		<img src="img/avatar.png" alt="user image" class="online" style="width: 150px;height: 150px;border: 2px solid transparent;-webkit-border-radius: 50% !important;-moz-border-radius: 50% !important;border-radius: 50% !important;">

		<p>Username</p>
	</div>

</div>
<?php
include 'footer.php';
?>