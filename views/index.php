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
                                                <img src="http://placehold.it/900x500/39CCCC/ffffff&amp;text=I+Love+Bootstrap" alt="First slide">
                                                <div class="carousel-caption">
                                                    First Slide
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="http://placehold.it/900x500/3c8dbc/ffffff&amp;text=I+Love+Bootstrap" alt="Second slide">
                                                <div class="carousel-caption">
                                                    Second Slide
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="http://placehold.it/900x500/f39c12/ffffff&amp;text=I+Love+Bootstrap" alt="Third slide">
                                                <div class="carousel-caption">
                                                    Third Slide
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
		            <h3 class="box-title">Tips</h3>
		        </div><!-- /.box-header -->
		        <div class="box-body">
		            <div class="callout callout-danger">
		                <h4>Private Messaging</h4>
		                <p>You can private message the professor or other students. Go to Inbox page to get started.</p>
		            </div>
		            <div class="callout callout-info">
		                <h4>Assignment submission</h4>
		                <p>You can submit assignments on Open Class</p>
		            </div>
		        </div><!-- /.box-body -->
	 		</div>
	 	</div>
	 </div>
<?php

include 'footer.php';
?>