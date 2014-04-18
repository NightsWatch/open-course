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

<?php

include 'footer.php';

?>