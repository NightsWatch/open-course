<?php

session_start();


include 'header.php';

if(isset($_SESSION['status']))
{
	include 'sidebar.php';
}
?>


<?php

include 'footer.php';
?>