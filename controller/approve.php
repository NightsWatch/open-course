
<?

include_once '../models/dbs.php';
$db= New dbs();

			$db->connect();
if ($_GET['bool']==1)
{
	$query="update coursemgs.users set approved='yes' where userid='".$_GET['uid']."';";
	echo $query;	
	$result = mysql_query($query);
	if($result)
		{
			//echo mysql_error();
			header("Location: ../views/admin.php");
	}
	else
		echo mysql_error();

}	


if ($_GET['bool']==0)
{
	$query="update coursemgs.users set approved='no' where userid='".$_GET['uid']."';";
	$result = mysql_query($query);
	if($result)
		header("Location: ../views/admin.php");
	
}	
?>