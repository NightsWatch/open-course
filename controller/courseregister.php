<?php

require '../models/coursereg.php';

session_start();

if( $_GET['cid'] )
{
	$courseid = mysql_real_escape_string($_GET['cid']);
	$register = New coursereg();
	


	if($register->checkstudreg($_SESSION['id'],$courseid)==1)
		{
			//echo 'in';
				if($register->deRegisterStudent($_SESSION['id'],$courseid)==1)
				{
					//echo 'revoed;';
					header('Location: ../views/allcourses.php?removed='.$courseid.'');
				}
			
		}

	//if( $register->registerStudent($_SESSION['id'],$courseid)==2)
	//	header('Location: ../views/allcourses.php?cant=1');
	else{ 

		if( ($register->checkCreditsTotal($_SESSION['id'],$courseid))==1 )
			{
			
				if( $register->registerStudent($_SESSION['id'],$courseid)==1)
					{	header('Location: ../views/allcourses.php?done='.$courseid.'');
						//echo 'added';
					}
			}


			else
				//echo "limited";
				header('Location: ../views/allcourses.php?limit=1');
			
	}

}

?>