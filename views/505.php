<?php

session_start();


include 'header.php';

if(isset($_SESSION['status']))
{
    include 'sidebar.php';
}
?>


<section class="content-header">
<h1 style="text-align:center"><i class="fa fa-magic"></i> Error</h1>
</section>
 <section class="content" style="text-align:center">
                    <h1>
You don't have the necessary permissions to view this page</h1>

<?php
if(!isset($_SESSION['id']))
{
	echo '<div class="alert alert-info ">
                                        <i class="fa fa-info"></i>
                                        
                                        <b>Info!</b> Log in and try again.
                                    </div>';
}
?>
</section>
</section>
<?php

include 'footer.php';
?>