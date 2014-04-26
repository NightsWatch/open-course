<?php

session_start();


include 'header.php';

if(isset($_SESSION['status']))
{
	include 'sidebar.php';
}

?>


<section class="content-header">
<h1 style="text-align:center"><i class="fa fa-magic"></i> Open Course</h1>
</section>
<br/>

 <section class="content">
<div class="row">
		<div class="col-md-8">
			<div class="box box-danger">
                                <div class="box-header">
                                    <h3 class="box-title">Showcase</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <img src="img/1.png" alt="First slide">
                                                <div class="carousel-caption">
                                                    Open Course
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="img/2.png" alt="Second slide">
                                                <div class="carousel-caption">
                                                    Open Course
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="img/3.png" alt="Second slide">
                                                <div class="carousel-caption">
                                                    Open Course
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="img/4.png" alt="Second slide">
                                                <div class="carousel-caption">
                                                    Open Course
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="img/5.png" alt="Second slide">
                                                <div class="carousel-caption">
                                                    Open Course
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="img/6.png" alt="Second slide">
                                                <div class="carousel-caption">
                                                    Open Course
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="img/7.png" alt="Second slide">
                                                <div class="carousel-caption">
                                                    Open Course
                                                </div>
                                            </div>
                                             <div class="item">
                                                <img src="img/8.png" alt="Second slide">
                                                <div class="carousel-caption">
                                                    Open Course
                                                </div>
                                            </div>
                                             <div class="item">
                                                <img src="img/9.png" alt="Second slide">
                                                <div class="carousel-caption">
                                                    Open Course
                                                </div>
                                            </div>
                                             <div class="item">
                                                <img src="img/10.png" alt="Second slide">
                                                <div class="carousel-caption">
                                                    Open Course
                                                </div>
                                            </div>
                                             <div class="item">
                                                <img src="img/11.png" alt="Second slide">
                                                <div class="carousel-caption">
                                                    Open Course
                                                </div>
                                            </div>
                                        </div>
                                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                        </a>
                                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                        </a>
                                    </div>
                                </div><!-- /.box-body -->
                            </div>

        </div>

		<div class="col-md-4">
			<div class="box box-info">
		        <div class="box-header">
		            <i class="fa fa-bullhorn"></i>
		            <h3 class="box-title">Features</h3>
		        </div><!-- /.box-header -->
		        <div class="box-body">
                <div class="callout callout-warning">
                        <h4>Participate in course forums</h4>
                        <p>Head over to coursepage to go to forums</p>
                    </div>
                    <div class="callout callout-warning">
                        <h4>Access course lectures, assignments and submit solutions</h4>
                        
                    </div>
		            <div class="callout callout-danger">
		                <h4>Private Messaging</h4>
		               
		            </div>
		            <div class="callout callout-danger">
		                <h4>Notifications</h4>
		                <p>Never miss anything on Open Class</p>
		            </div>

                    <div class="callout callout-info">
                        <h4> Assignment submissions and grade them</h4>
                        <p>Upload lectures, assignments. Upload solutions of assignmnets.</p>
                    </div>
                    

                    <div class="callout callout-info">
                        <h4>Courses</h4>
                        <p>Register, Create, Allot Instructors, Allot TAs, Course Timetable. </p>
                    </div>

                    <div class="callout callout-danger">
                        <h4>Thesis</h4>
                        <p>Allot professors thesis project BTP, MTP students</p>
                    </div>

                    
		        </div><!-- /.box-body -->
	 		</div>
	 	</div>
	 </div>




<?php

include 'footer.php';
?>