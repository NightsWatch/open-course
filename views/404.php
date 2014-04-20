<?php

session_start();


include 'header.php';

if(isset($_SESSION['status']))
{
    include 'sidebar.php';
}
?>


<section class="content-header">
<h1 style="text-align:center"><i class="fa fa-magic"></i> Search Results</h1>
</section>
 <section class="content" style="text-align:center">
                    <h1>
                    No results found                    
                    </h1>

                    <p>We could not find any results for your query.</p>
                    <p>Note that the fields used for searching are <br>
                    Name for students, faculty, courses, assignments</br> 
                    Email for all users.</p> <p>Kindly search using the above fields </p>
</section>
</section>
<?php

include 'footer.php';
?>