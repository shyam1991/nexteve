<?php
require_once('connection.php');
require_once('functions.php');


$search = $_POST['search-data'];	
$query = "SELECT *FROM `tb_event_titles` WHERE vchr_title LIKE '%$search%'";
//echo $query;
$result = mysqli_query($con,$query);
$event_id=array();
	if($result){
	while ($data=mysqli_fetch_assoc($result)) {
		 $id =  $data['Fk_ai_int_eid'];
		//$event_list	= eventdisplay($id);
		 array_push($event_id,"$id");
		
	};
		$event_list	= eventdisplay($event_id);	
		echo $event_list;
	}
	else
	{
		echo "fail";
	}

?>